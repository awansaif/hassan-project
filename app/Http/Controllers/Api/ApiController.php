<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Mail\WelcomeMail;
use App\Models\AlbodroCategory;
use App\Models\AlbodroItem;
use App\Models\Cassifiche;
use App\Models\CassificheDetail;
use App\Models\Club;
use App\Models\ClubDetail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Stream;
use App\Models\Event;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Country;
use App\Models\Player;
use App\Models\User;
use App\Models\Collection;
use App\Models\CollectionDetail;
use App\Models\FederaationSponsor;
use App\Models\Federation;
use App\Models\FederationEvent;
use App\Models\FederationMovement;
use App\Models\FederationNews;
use App\Models\FlashNews;
use App\Models\MainClub;
use App\Models\Sponsor;
use App\Models\Video;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'date_of_birth' => 'required',
            'gender'  => 'required',
            'phone_number' => 'required',
            'city'         => 'required',
        ]);
        if ($validator->fails()) {
            $data = [
                'success' => false,
                'errors'  => $validator->errors()->all(),
            ];
            return response()->json($data);
        } else {
            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => hash::make($request->password),
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'phone_number' => $request->phone_number,
                'city' => $request->city,
                'avatar' => "''",
            ]);
            if ($user->save()) {
                $token = $user->createToken('laravel')->accessToken;
                Mail::to($user->email)->send(new WelcomeMail);
                $data = [
                    'success' => true,
                    'token'  => $token,
                    'message' => 'Account is registered succcessfully',
                    'data' => $user,

                ];
                return response()->json($data);
            }
        }
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            $data = [
                'success' => false,
                'errors'  => $validator->errors()->all(),
            ];
            return response()->json($data);
        } else {
            if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 1])) {

                $token =  Auth::guard('web')->user()->createToken('laravel')->accessToken;
                $response = [
                    'success' => true,
                    'token' => $token,
                    'data' => User::where('id', Auth::guard('web')->user()->id)->first(),
                ];
                return response($response, 200);
            } else {
                $data = [
                    'success' => false,
                    'errors'  => ['Please try again'],
                ];
                return response()->json($data);
            }
        }
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
    public function update_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'avatar' => 'nullable|image',
            'address' => 'nullable|max:255',
            'phone_number'  => 'required',
            'city'      => 'required',
            'zip_code'  => 'nullable'
        ]);

        $validator->after(function ($validator) {
            if (User::where('id', '!=', Auth::user()->id)->where('email', request('email'))->first()) {
                $validator->errors()->add('email', 'Email already exists in record!');
            }
        });
        if ($validator->fails()) {
            $data = [
                'success' => false,
                'errors'  => $validator->errors()->all(),
            ];
            return response()->json($data);
        } else {
            if ($request->file('avatar')) {
                $destination = 'User-avatars/';
                $file = $request->file('avatar');
                $file_name = time() . $file->getClientOriginalName();
                $check = $file->move($destination, $file_name);

                $update = User::where('id', Auth::user()->id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'avatar' => env('APP_URL') . $destination . $file_name,
                    'address' => $request->address,
                    'phone_number' => $request->phone_number,
                    'city'     => $request->city,
                    'zip_code' => $request->zip_code,
                ]);
                if ($update) {
                    $data = [
                        'success' => true,
                        'message' => 'User updated successfully.'
                    ];
                    return response()->json($data);
                }
            } else {
                $update = User::where('id', Auth::user()->id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'address' => $request->address,
                    'phone_number' => $request->phone_number,
                    'city'     => $request->city,
                    'zip_code' => $request->zip_code,
                ]);
                if ($update) {
                    $data = [
                        'success' => true,
                        'message' => 'User updated successfully.'
                    ];
                    return response()->json($data);
                }
            }
        }
    }
    public function logout(Request $request)
    {
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
        }
        else {
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










    public function all_news()
    {
        //
        $news = News::orderBY('id', 'DESC')->get();
        return response()->json($news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all_events()
    {
        //
        $events = Event::orderBY('id', 'DESC')->get();
        return response()->json($events);
    }

    public function all_streams()
    {
        $streams = Stream::orderBy('id', 'DESC')->get();
        return response()->json($streams);
    }

    public function all_shops()
    {
        $shops = Shop::orderby('id', 'DESC')->get();
        return response()->json($shops);
    }

    public function all_products()
    {
        $products = Product::with('shops')->orderby('id', 'DESC')->get();
        return response()->json($products);
    }

    public function product(Request $request)
    {
        $products = Product::with('shops')->where('shop_id', $request->id)->get();
        return response()->json($products);
    }

    public function all_countries()
    {
        $countries = Country::with('players')->get();
        return response()->json($countries);
    }

    public function players(Request $request)
    {
        $players = Player::with('countries')->where('country_id', $request->id)->select('id', 'country_id', 'player_name', 'player_picture', 'player_role')->orderBy('id', 'DESC')->get();
        return response()->json($players);
    }

    public function player_detail(Request $request)
    {
        $player = Player::with('countries', 'career')->where('id', $request->id)->first();
        return response()->json($player);
    }

    public function collection()
    {
        $collection = Collection::orderBy('id', 'DESC')->get();
        return response()->json($collection);
    }

    public function collectionDetail(Request $request)
    {
        $collection = CollectionDetail::where('collection_id', $request->id)->orderBy('id', 'DESC')->get();
        return response()->json($collection);
    }

    public function sponsors()
    {
        $sponsors = Sponsor::get();
        return response()->json($sponsors);
    }

    public function federations()
    {
        $federations = Federation::get();
        return response()->json($federations);
    }

    public function main_clubs()
    {
        $data = MainClub::with('clubs')->orderBy('id', 'DESC')->get();
        return response()->json($data);
    }
    public function clubs(Request $request)
    {
        $clubs = Club::with('clubs')->where('club_id', $request->id)->orderBy('id', 'DESC')->get();
        return response()->json($clubs);
    }

    public function club_detail(Request $request)
    {
        // dd($request->id);
        $clubDetail = ClubDetail::with('clubs')->where('club_id', $request->id)->first();
        return response()->json($clubDetail);
    }

    public function federation_movements()
    {
        $data = FederationMovement::orderBY('id', 'DESC')->get();
        return response()->json($data);
    }

    public function federation_events(Request $request)
    {
        $data = FederationEvent::with('federations')->where('federation_id', $request->id)->get();
        return response()->json($data);
    }
    public function federation_news(Request $request)
    {
        $data = FederationNews::with('federations')->orderBY('id', 'DESC')->where('federation_id', $request->id)->get();
        return response()->json($data);
    }
    public function federation_sponsors(Request $request)
    {
        $data = FederaationSponsor::with('federations')->where('federation_id', $request->id)->get();
        return response()->json($data);
    }

    // All Abrodor Categories
    public function albrodoro_categories()
    {
        $data = AlbodroCategory::with('federations')->get();
        return response()->json($data);
    }
    // Abrodor category by id
    public function albrodoro_category(Request $request)
    {
        $data = AlbodroCategory::with('federations')->where('federation_id', $request->id)->get();
        return response()->json($data);
    }
    public function albrodro_items(Request $request)
    {
        $data = AlbodroItem::where('albodro_id', $request->id)->get();
        return response()->json($data);
    }


    public function cassifiches(Request $request)
    {
        $data = Cassifiche::with('federations')->where('federation_id', $request->id)->get();
        return response()->json($data);
    }

    public function detail_cassifiche(Request $request)
    {
        $data = CassificheDetail::with('cassifiches')->where('cassifiche_id', $request->id)->get();
        return response()->json($data);
    }

    public function all_videos()
    {
        $data = Video::orderBy('id', 'DESC')->get();
        return response()->json($data);
    }

    public function flash_news()
    {
        $data = FlashNews::orderBy('id', 'DESC')->get();
        return response()->json($data);
    }
}
