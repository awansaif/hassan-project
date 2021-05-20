<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'           => 'required',
            'email'          => 'required|email|unique:users',
            'password'       => 'required|min:8',
            'date_of_birth'  => 'required',
            'gender'         => 'required',
            'phone_number'   => 'required',
            'city'           => 'required',
            'zip_code'       => 'required',
        ]);
        if ($validator->fails()) {
            $data = [
                'success' => false,
                'errors'  => $validator->errors()->all(),
            ];
            return response($data);
        } else {
            $user = new User([
                'name'          => $request->name,
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
                'date_of_birth' => $request->date_of_birth,
                'gender'        => $request->gender,
                'phone_number'  => $request->phone_number,
                'city'          => $request->city,
                'avatar'        => "https://ui-avatars.com/api/?background=303030&color=f1f1f1&name=$request->name",
                'zip_code'      => $request->zip_code,
                'token'         => $request->token
            ]);
            if ($user->save()) {
                $token = $user->createToken('laravel')->accessToken;
                Mail::to($user->email)->send(new WelcomeMail);
                $data = [
                    'success' => true,
                    'token'  => $token,
                    'message' => 'User is registered succcessfully',
                    'data' => $user,

                ];
                return response($data, 200);
            }
        }
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()) {
            $data = [
                'success' => false,
                'errors'  => $validator->errors()->all(),
            ];
            return response()->json($data);
        } else {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

                if ($request->token != null) {
                    User::find(Auth::user()->id)->update([
                        'token' => $request->token,
                    ]);
                }

                $token =  Auth::user()->createToken('laravel')->accessToken;
                $response = [
                    'success' => true,
                    'token' => $token,
                    'data' => User::find(Auth::user()->id),
                ];
                return response($response, 200);
            } else {
                $data = [
                    'success' => false,
                    'errors'  => ['Please try again'],
                ];
                return response($data);
            }
        }
    }


    public function user(Request $request)
    {
        return response($request->user(), 200);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'avatar' => 'nullable|image',
            'address' => 'nullable|max:255',
            'phone_number'  => 'required',
            'city'      => 'required',
            'zip_code'  => 'required'
        ]);
        if ($validator->fails()) {
            $data = [
                'success' => false,
                'errors'  => $validator->errors()->all(),
            ];
            return response($data, 200);
        } else {
            if ($request->file('avatar')) {
                $destination = 'images/';
                $file = $request->file('avatar');
                $file_name = time() . $file->getClientOriginalName();
                $file->move($destination, $file_name);

                User::where('id', Auth::user()->id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'avatar' => env('APP_URL') . $destination . $file_name,
                    'address' => $request->address,
                    'phone_number' => $request->phone_number,
                    'city'     => $request->city,
                    'zip_code' => $request->zip_code,
                ]);
            } else {
                User::where('id', Auth::user()->id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'address' => $request->address,
                    'phone_number' => $request->phone_number,
                    'city'     => $request->city,
                    'zip_code' => $request->zip_code,
                ]);
            }
            $data = [
                'success' => true,
                'message' => 'User updated successfully.'
            ];
            return response()->json($data);
        }
    }
    public function logout(Request $request)
    {
        User::find($request->user()->id)->update([
            'token' => null
        ]);
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function password_reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
        ]);
        if ($validator->fails()) {
            $data = [
                'success' => false,
                'response' => $validator->errors()->all()
            ];
            return response()->json($data);
        } else {
            $user = User::where('email', $request->email)->first();
            Mail::to($request->email)->send(new ResetPassword($user));

            $data = [
                'success' => true,
                'response' => 'Please check your email',
            ];
            return response()->json($data);
        }
    }
    public function broker()
    {
        return Password::broker();
    }
    protected function credentials(Request $request)
    {
        return $request->only('email');
    }
}
