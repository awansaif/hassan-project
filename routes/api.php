<?php

use App\Http\Controllers\Api\ClubApiControlller;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\ProductOrderController;
use App\Http\Controllers\Api\EventOrderController;
use App\Http\Controllers\Api\FedEventOrderController;
use App\Http\Controllers\Api\HomeApiController;
use App\Http\Controllers\Api\MembershipApiController;
use App\Http\Controllers\Api\LinkApiController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\RecentNews;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//users api
Route::post('login', [UserController::class, 'login']);
Route::post('signup', [UserController::class, 'register']);
Route::post('password-reset', [UserController::class, 'password_reset']);


Route::group(['middleware' => 'auth:api'], function () {
    Route::get('user', [UserController::class, 'user']);
    Route::post('update-user', [UserController::class, 'update']);
    Route::get('logout', [UserController::class, 'logout']);
});

//link apis
Route::get('links', [LinkApiController::class, 'show']);
Route::post('link-order', [LinkApiController::class, 'store']);



Route::get('news', [App\Http\Controllers\Api\ApiController::class, 'all_news']);
Route::get('events', [App\Http\Controllers\Api\ApiController::class, 'all_events']);
Route::get('shops', [App\Http\Controllers\Api\ApiController::class, 'all_shops']);
Route::get('products', [App\Http\Controllers\Api\ApiController::class, 'all_products']);
Route::get('product/{id}', [App\Http\Controllers\Api\ApiController::class, 'product']);
Route::get('streams', [App\Http\Controllers\Api\ApiController::class, 'all_streams']);
Route::get('playeries', [App\Http\Controllers\Api\ApiController::class, 'all_countries']);
Route::get('player/{id}', [App\Http\Controllers\Api\ApiController::class, 'player_detail']);
Route::get('collection', [App\Http\Controllers\Api\ApiController::class, 'collection']);
Route::get('collection/{id}', [App\Http\Controllers\Api\ApiController::class, 'collectionDetail']);
Route::get('sponsors', [ApiController::class, 'sponsors']);
Route::get('/federations', [ApiController::class, 'federations']);
Route::get('/main-clubs', [ClubApiControlller::class, 'main_clubs']);
Route::get('/clubs/{id}', [ClubApiControlller::class, 'clubs']);
Route::get('/club-detail/{id}', [ClubApiControlller::class, 'club_detail']);
Route::get('/federation-movements', [ApiController::class, 'federation_movements']);
Route::get('/federation-event/{id}', [ApiController::class, 'federation_events']);
Route::get('/federation-news/{id}', [ApiController::class, 'federation_news']);
Route::get('/federation-sponsor/{id}', [ApiController::class, 'federation_sponsors']);

// All Albrodoro Categories
Route::get('/federations/albrodoro-categories', [ApiController::class, 'albrodoro_categories']);
// Albrodoro Category by id
Route::get('/federations/albrodoro-category/{id}', [ApiController::class, 'albrodoro_category']);
// Getting items by category
Route::get('/federations/albrodoro-category/{id}/items', [ApiController::class, 'albrodro_items']);

//casifiche apis
Route::get('/cassifiches/{id}', [ApiController::class, 'cassifiches']);
Route::get('/cassifiche/{id}', [ApiController::class, 'detail_cassifiche']);

//flash news api
Route::get('/flash-news', [ApiController::class, 'flash_news']);

//video
Route::get('/all-videos', [ApiController::class, 'all_videos']);

//latst 5 news
Route::get('/latest_news', function () {
    return RecentNews::orderBy('id', 'DESC')->take(5)->get();
});

// latest events
Route::get('/latest_events', [ApiController::class, 'latest_events']);

// Product order api
Route::post('/place-product-order', [ProductOrderController::class, 'save_order']);
Route::get('/orders', [ProductOrderController::class, 'orders']);

// Event order api
Route::post('/place-event-order', [EventOrderController::class, 'save_order']);
Route::post('/place-fed-event-order', [FedEventOrderController::class, 'save_order']);
// Route::get('/event-orders', [EventOrderController::class, 'orders']);

// Team score api
Route::get('/teams', [ApiController::class, 'teams']);
Route::get('/team-score/{id}', [ApiController::class, 'team_score']);

// membership api
Route::post('membership', [MembershipApiController::class, 'member']);

// home page api
Route::get('/home', [HomeApiController::class, 'home']);


// club classification api

Route::get('club_classification', [ClubApiControlller::class, 'club_classification']);
