<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email|exists:admins|min:5|max:191',
         'password' => 'required|string|min:4|max:255',
        ]);
        if($validator->fails())
        {
             return redirect()->back()->withErrors($validator)
                     ->withInput();
        }
        else
        {
            if(Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember')))
            {
                return redirect('/home');
            }
            else{
                return redirect()
             ->back()
             ->withInput()
             ->with('error','Incorrect email/password, please try again!');
            }
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');

    }

    public function change_password(Request $request)
    {

        $data = Admin::where('id', 1)->first();
        if(Hash::check($request->current_pass, $data->password))
        {
            $update = Admin::where('id', $data->id)->update([
                'password' => Hash::make($request->new_pass),
            ]);
            if($update)
            {
                $data = [
                    'response' => 1,
                    'message'  => 'Password change successfully'
                ];
                return response()->json($data);
            }
        }
        else{
            $data = [
                'response' => 0,
                'message'  => 'Your current password is incorrect',
            ];
            return response()->json($data);
        }
    }


}
