<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\ProductOrderController;
use App\Http\Controllers\Api\EventOrderController;
use App\Http\Controllers\Api\FedEventOrderController;
use App\Http\Controllers\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\News;
use App\Models\RecentNews;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:api'],function(){
    Route::get('user', [ApiController::class, 'user']);
    Route::post('update-user', [ApiController::class, 'update_user']);
    Route::get('logout', [ApiController::class, 'logout']);
});

//users api
Route::post('login', [ApiController::class, 'login']);
Route::post('signup', [ApiController::class, 'register']);
Route::post('password-reset', [ApiController::class, 'password_reset']);


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
Route::get('/main-clubs', [ApiController::class, 'main_clubs']);
Route::get('/clubs/{id}', [ApiController::class, 'clubs']);
Route::get('/club-detail/{id}', [ApiController::class, 'club_detail']);
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
Route::get('/latest_news', function(){
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

