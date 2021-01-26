<?php

use App\Models\User;
use App\Mail\WelcomeMail;
use App\Models\CollectionDetail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\StreamController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\MainClubController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\CassificheController;
use App\Http\Controllers\ClubDetailController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\FederationController;
use App\Http\Controllers\AlbodroItemController;
use App\Http\Controllers\FederationNewsController;
use App\Http\Controllers\AlbodroCategoryController;
use App\Http\Controllers\FederationEventController;
use App\Http\Controllers\CassificheDetailController;
use App\Http\Controllers\CollectionDetailController;
use App\Http\Controllers\FederaationSponsorController;
use App\Http\Controllers\FederationMovementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware', 'guest'],function(){
  Route::get('/', function () {
    return redirect('Adminlogin');
});
});


//Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware'=> ['auth']],function(){

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/countries', [App\Http\Controllers\CountryController::class, 'index']);
    Route::get('add-country', [\App\Http\Controllers\CountryController::class, 'create']);
    Route::post('add-country', [\App\Http\Controllers\CountryController::class, 'store']);
    Route::get('/remove-country', [CountryController::class, 'destroy']);
    Route::get('/edit-country', [CountryController::class, 'edit']);
    Route::post('/edit-country', [CountryController::class, 'update']);

    Route::get('/news', [App\Http\Controllers\NewsController::class, 'index']);
    Route::get('/add-news', [App\Http\Controllers\NewsController::class, 'create']);
    Route::post('/add-news', [App\Http\Controllers\NewsController::class, 'store']);
    Route::get('/edit-news', [App\Http\Controllers\NewsController::class, 'edit']);
    Route::post('/edit-news', [App\Http\Controllers\NewsController::class, 'update']);
    Route::delete('/remove-news', [App\Http\Controllers\NewsController::class, 'destroy']);

    Route::get('/events', [EventController::class, 'index']);
    Route::get('/add-event', [App\Http\Controllers\EventController::class, 'create']);
    Route::post('/add-event', [App\Http\Controllers\EventController::class, 'store']);
    Route::get('/remove-event', [EventController::class, 'destroy']);
    Route::get('/edit-event', [EventController::class, 'edit']);
    Route::post('/edit-event', [EventController::class, 'update']);

    // stream Routes
    Route::get('/start-stream', [StreamController::class, 'start_stream']);
    Route::get('/streams', [StreamController::class, 'index']);
    Route::get('/add-stream', [App\Http\Controllers\StreamController::class, 'create']);
    Route::post('/add-stream', [App\Http\Controllers\StreamController::class, 'store']);
    Route::get('/edit-stream', [StreamController::class, 'edit']);
    Route::post('/edit-stream', [StreamController::class, 'update']);
    route::get('/remove-stream', [StreamController::class, 'destroy']);

    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/add-product', [App\Http\Controllers\ProductController::class, 'create']);
    Route::post('/add-product', [App\Http\Controllers\ProductController::class, 'store']);
    Route::get('/edit-product', [ProductController::class, 'edit']);
    Route::post('/edit-product', [ProductController::class, 'update']);
    Route::get('/remove-product', [ProductController::class, 'destroy']);


    Route::get('/shops', [App\Http\Controllers\ShopController::class, 'index']);
    Route::get('/add-shop', [App\Http\Controllers\ShopController::class, 'create']);
    Route::post('/add-shop', [App\Http\Controllers\ShopController::class, 'store']);
    Route::get('/edit-shop', [ShopController::class, 'edit']);
    Route::post('/edit-shop', [ShopController::class, 'update']);
    Route::get('/remove-shop', [App\Http\Controllers\ShopController::class, 'destroy']);

    Route::get('/add-player', [App\Http\Controllers\PlayerController::class, 'create']);
    Route::get('/players', [App\Http\Controllers\PlayerController::class, 'index']);
    Route::post('/add-player', [App\Http\Controllers\PlayerController::class, 'store']);
    Route::get('/edit-player', [App\Http\Controllers\PlayerController::class, 'edit']);
    Route::post('/edit-player', [App\Http\Controllers\PlayerController::class, 'update']);
    Route::delete('/remove-player', [App\Http\Controllers\PlayerController::class, 'destroy']);


    Route::get('/add-player-career', [App\Http\Controllers\CareerController::class, 'create']);
    Route::post('/add-player-career', [App\Http\Controllers\CareerController::class, 'store']);
    Route::get('/player-career', [App\Http\Controllers\CareerController::class, 'index']);
    Route::delete('/remove-career', [App\Http\Controllers\CareerController::class, 'destroy']);
    Route::get('/edit-career', [App\Http\Controllers\CareerController::class, 'edit']);
    Route::put('/edit-career', [App\Http\Controllers\CareerController::class, 'update']);
    Route::delete('/remove-career', [App\Http\Controllers\CareerController::class, 'destroy']);

    Route::get('/collections', [App\Http\Controllers\CollectionController::class, 'index']);
    Route::get('/add-collection', [App\Http\Controllers\CollectionController::class, 'create']);
    Route::post('/add-collection', [App\Http\Controllers\CollectionController::class, 'store']);
    Route::get('/edit-collection', [CollectionController::class, 'edit']);
    Route::post('/edit-collection', [CollectionController::class, 'update']);
    Route::get('/collection-images', [CollectionDetailController::class, 'index']);
    Route::get('/add-collection-images', [App\Http\Controllers\CollectionDetailController::class, 'create']);
    Route::post('/add-collection-images', [App\Http\Controllers\CollectionDetailController::class, 'store']);
    Route::get('/remove-collection', [App\Http\Controllers\CollectionController::class, 'destroy']);
    Route::get('/remove-collection-image', [CollectionDetailController::class, 'destroy']);

    Route::get('federations', [FederationController::class, 'index']);
    Route::get('/add-player-federation', [FederationController::class, 'create']);
    Route::post('/add-player-federation', [FederationController::class, 'store']);
    Route::get('/edit-federation', [FederationController::class, 'edit']);
    Route::post('/edit-federation', [FederationController::class, 'update']);
    Route::delete('/remove-federation', [FederationController::class, 'destroy']);


    Route::get('/sponsor', [SponsorController::class, 'index']);
    Route::get('/add-sponsor', [SponsorController::class, 'create']);
    Route::post('/add-sponsor', [SponsorController::class, 'store']);
    Route::get('/edit-sponsor', [SponsorController::class, 'edit']);
    Route::post('/edit-sponsor', [SponsorController::class, 'update']);
    Route::get('/remove-sponsor', [SponsorController::class, 'destroy']);

    // main club routers
    Route::get('/main-club', [MainClubController::class, 'index']);
    Route::get('/add-main-club', [MainClubController::class, 'create']);
    Route::post('/add-main-club', [MainClubController::class, 'store']);
    Route::get('/edit-main-club', [MainClubController::class, 'edit']);
    Route::post('/edit-main-club', [MainClubController::class, 'update']);
    Route::get('/remove-main-club', [MainClubController::class, 'destroy']);

    Route::get('/club', [ClubController::class, 'index']);
    Route::get('/club-create', [ClubController::class, 'create']);
    Route::post('/club-create', [ClubController::class, 'store']);
    Route::get('/edit-club', [ClubController::class, 'edit']);
    Route::post('/edit-club', [ClubController::class, 'update']);
    Route::get('/remove-club', [ClubController::class, 'destroy']);

    Route::get('/club-detail', [ClubDetailController::class, 'index']);
    Route::get('/add-club-detail', [ClubDetailController::class, 'create']);
    Route::post('/add-club-detail', [ClubDetailController::class, 'store']);
    Route::get('/edit-club-detail', [ClubDetailController::class, 'edit']);
    Route::post('/edit-club-detail', [ClubDetailController::class, 'update']);
    Route::get('/remove-club-detail', [ClubDetailController::class, 'destroy']);

    Route::get('/federation-movement', [FederationMovementController::class, 'index']);
    Route::get('/add-federation-movement', [FederationMovementController::class, 'create']);
    Route::post('/add-federation-movement', [FederationMovementController::class, 'store']);
    Route::get('/edit-movement', [FederationMovementController::class, 'edit']);
    Route::post('/edit-movement', [FederationMovementController::class, 'update']);
    Route::delete('/remove-movement', [FederationMovementController::class, 'destroy']);

    Route::get('/federation-news', [FederationNewsController::class, 'index']);
    Route::get('/add-federation-news', [FederationNewsController::class, 'create']);
    Route::post('/add-federation-news', [FederationNewsController::class, 'store']);
    Route::get('/edit-federation-news', [FederationNewsController::class, 'edit']);
    Route::post('/edit-federation-news', [FederationNewsController::class, 'update']);
    Route::get('/remove-federation-news', [FederationNewsController::class, 'destroy']);

    Route::get('/federation-event', [FederationEventController::class, 'index']);
    Route::get('/add-federation-event', [FederationEventController::class, 'create']);
    Route::post('/add-federation-event', [FederationEventController::class, 'store']);
    Route::get('/edit-federation-event', [FederationEventController::class, 'edit']);
    Route::post('/edit-federation-event', [FederationEventController::class, 'update']);
    Route::get('/remove-federation-event', [FederationEventController::class, 'destroy']);

    Route::get('/federation-sponsor', [FederaationSponsorController::class, 'index']);
    Route::get('/add-federation-sponsor', [FederaationSponsorController::class, 'create']);
    Route::post('/add-federation-sponsor', [FederaationSponsorController::class, 'store']);
    Route::get('/edit-federation-sponsor', [FederaationSponsorController::class, 'edit']);
    Route::post('/edit-federation-sponsor', [FederaationSponsorController::class, 'update']);
    Route::get('/remove-federation-sponsor', [FederaationSponsorController::class, 'destroy']);

    // Albodro Category resource route
    Route::resource('/albodro-category', AlbodroCategoryController::class);

    //Albodro Items resource
    Route::resource('/albodro-items', AlbodroItemController::class);
    Route::get('/category/{id}/albodro-items', [AlbodroItemController::class, 'categoryItems']);

    // Federation Cassifiche routes
    Route::get('/federation-cassifiche', [CassificheController::class, 'index']);
    Route::get('/add-federation-cassifiche', [CassificheController::class, 'create']);
    Route::post('/add-federation-cassifiche', [CassificheController::class, 'store']);
    Route::get('/edit-federation-cassifiche', [CassificheController::class, 'edit']);
    Route::post('/edit-federation-cassifiche', [CassificheController::class, 'update']);
    Route::get('/remove-federation-cassifiche', [CassificheController::class, 'destroy']);

    // cassifiche detail rourtes
    Route::get('/detail-cassifiche', [CassificheDetailController::class, 'index']);
    Route::get('/add-cassifiche-detail', [CassificheDetailController::class, 'create']);
    Route::post('/add-cassifiche-detail', [CassificheDetailController::class, 'store']);
    Route::get('/remove-cassifiche-detail', [CassificheDetailController::class, 'destroy']);
    Route::get('/edit-detail-cassifiche', [CassificheDetailController::class, 'edit']);
    Route::post('/edit-detail-cassifiche', [CassificheDetailController::class, 'update']);


    //Router for videos
    Route::get('/video-list', [VideoController::class, 'index']);
    Route::get('/add-video', [VideoController::class, 'create']);
    Route::post('/add-video', [VideoController::class, 'store']);
    Route::get('/edit-video', [VideoController::class, 'edit']);
    Route::post('/edit-video', [VideoController::class, 'update']);
    Route::get('/remove-video', [VideoController::class, 'destroy']);

    Route::post('/admin/change-password', [AuthController::class, 'change_password']);
    Route::view('/registered', 'registered', ['users' => User::all()]);
  });

  Route::group(['prefix' => 'admin'], function () {
      Route::get('/login', [AuthController::class, 'create'])->name('login');
      Route::post('/login', [AuthController::class, 'login']);
      Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
  });


  Route::get('/show-stream', [StreamController::class,'show_stream']);
