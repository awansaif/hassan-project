<?php

use Illuminate\Http\Request;
use App\Models\User;
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
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\CassificheController;
use App\Http\Controllers\ClubDetailController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\FederationController;
use App\Http\Controllers\AlbodroItemController;
use App\Http\Controllers\FederationNewsController;
use App\Http\Controllers\AlbodroCategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\FederationEventController;
use App\Http\Controllers\CassificheDetailController;
use App\Http\Controllers\ClubClassificationController;
use App\Http\Controllers\CollectionDetailController;
use App\Http\Controllers\FederaationSponsorController;
use App\Http\Controllers\FederationMovementController;
use App\Http\Controllers\FlashNewsController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductOrderController;
use App\Http\Controllers\EventOrderController;
use App\Http\Controllers\FedEventOrderController;
use App\Http\Controllers\LinkOrderController;
use App\Http\Controllers\LiveScoreController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PlayerController as ControllersPlayerController;
use App\Http\Controllers\Team\ClubController as TeamClubController;
use App\Http\Controllers\Team\HomeController as TeamHome;
use App\Http\Controllers\Team\PlayerController;
use App\Http\Controllers\TeamController as ControllersTeamController;
use Illuminate\Support\Facades\Auth as FacadesAuth;

Route::group(['middleware' => 'guest:admin'], function () {

    Route::get('/', [AuthController::class, 'create'])->name('login');
    Route::post('/', [AuthController::class, 'login']);
});



Route::post('/reset-password', [LoginController::class, 'change_password']);
Route::group(['middleware' => 'auth:admin'], function () {


    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //link routers
    Route::resource('links', LinkController::class);
    Route::get('link-order', [LinkOrderController::class, 'show'])->name('linkOrder');

    Route::resource('countries', CountryController::class);

    Route::get('/news', [App\Http\Controllers\NewsController::class, 'index']);
    Route::get('/add-news', [App\Http\Controllers\NewsController::class, 'create']);
    Route::post('/add-news', [App\Http\Controllers\NewsController::class, 'store']);
    Route::get('/edit-news', [App\Http\Controllers\NewsController::class, 'edit']);
    Route::post('/edit-news', [App\Http\Controllers\NewsController::class, 'update']);
    Route::delete('/remove-news', [App\Http\Controllers\NewsController::class, 'destroy']);

    // event routes
    Route::resource('event', EventController::class);

    // stream Routes
    Route::resource('streams', StreamController::class);

    // shops routes
    Route::resource('shops', ShopController::class);

    // product routes
    Route::get('/update-stock', [ProductController::class, 'update_stock']);
    Route::resource('products', ProductController::class);

    // player routes
    Route::resource('player', ControllersPlayerController::class);


    Route::resource('playercareer', CareerController::class);
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

    Route::resource('federations', FederationController::class);

    Route::get('/sponsor', [SponsorController::class, 'index']);
    Route::get('/add-sponsor', [SponsorController::class, 'create']);
    Route::post('/add-sponsor', [SponsorController::class, 'store']);
    Route::get('/edit-sponsor', [SponsorController::class, 'edit']);
    Route::post('/edit-sponsor', [SponsorController::class, 'update']);
    Route::get('/remove-sponsor', [SponsorController::class, 'destroy']);

    // main club routers
    Route::resource('mainclub', MainClubController::class);

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

    Route::resource('club-classification', ClubClassificationController::class);

    Route::resource('federationmovement', FederationMovementController::class);

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

    //Flash news routers
    Route::get('/flash-news', [FlashNewsController::class, 'index']);
    Route::get('/add-flash-news', [FlashNewsController::class, 'create']);
    Route::post('/add-flash-news', [FlashNewsController::class, 'store']);
    Route::get('/edit-flash-news', [FlashNewsController::class, 'edit']);
    Route::post('/edit-flash-news', [FlashNewsController::class, 'update']);
    Route::get('/remove-flash-news', [FlashNewsController::class, 'destroy']);

    // product orders
    Route::get('product-orders', [ProductOrderController::class, 'index']);
    Route::get('product-order-detail', [ProductOrderController::class, 'show']);

    // event orders
    Route::get('event-orders', [EventOrderController::class, 'index']);
    Route::get('event-order-detail', [EventOrderController::class, 'show']);

    // federation event orders
    Route::get('federation-event-orders', [FedEventOrderController::class, 'index']);
    Route::get('federation-event-order-detail', [FedEventOrderController::class, 'show']);

    // user routers
    Route::post('/admin/change-password', [AuthController::class, 'change_password']);
    Route::view('/registered', 'pages.users.index');


    // memberships routes
    Route::resource('membership', MembershipController::class);
    Route::get('membership/delete/{id}', [MembershipController::class, 'destroy']);

    // Team members routes
    Route::get('/team-members', [TeamController::class, 'index'])->name('team-members');
    Route::get('/add-team-member', [TeamController::class, 'create']);
    Route::post('/add-team-member', [TeamController::class, 'store']);
    Route::get('/edit-team-member/{id}', [TeamController::class, 'edit']);
    Route::post('/edit-team-member/{id}', [TeamController::class, 'update']);
    Route::get('/remove-team-member/{id}', [TeamController::class, 'destroy']);

    // team router
    Route::get('/scores', [ControllersTeamController::class, 'index'])->name('teams');
    Route::get('/team-scores/{id}', [ControllersTeamController::class, 'show'])->name('liveScore');
    Route::get('/add-team', [ControllersTeamController::class, 'create']);
    Route::post('/add-team', [ControllersTeamController::class, 'store']);
    Route::get('/edit-team/{id}', [ControllersTeamController::class, 'edit']);
    Route::post('/edit-team/{id}', [ControllersTeamController::class, 'update']);
    Route::get('/remove-team/{id}', [ControllersTeamController::class, 'destroy']);

    Route::get('/team-match_start/{id}', [ControllersTeamController::class, 'match_start']);
    Route::get('/team-match_stop/{id}', [ControllersTeamController::class, 'match_stop']);
    Route::get('/team-set-score/{id}', [ControllersTeamController::class, 'team_set_score']);
    Route::post('/team-set-score/{id}', [ControllersTeamController::class, 'team_set_score_save']);

    // team score router
    Route::get('/add-team-score/{id}', [LiveScoreController::class, 'create']);
    Route::post('/add-team-score/{id}', [LiveScoreController::class, 'store']);
    Route::get('/edit-team-score/{id}', [LiveScoreController::class, 'edit']);
    Route::post('/edit-team-score/{id}', [LiveScoreController::class, 'update']);
    Route::get('/remove-team-score/{id}', [LiveScoreController::class, 'destroy']);
});



Route::group(['prefix' => 'team'], function () {
    Route::get('/dashboard', [TeamHome::class, 'dashboard'])->name('team.dashboard');
    Route::get('/logout', [TeamHome::class, 'logout'])->name('team.logout');

    //club router
    Route::get('/main-club', [TeamClubController::class, 'index'])->name('team.club');
    Route::get('/add-main-club', [TeamClubController::class, 'create']);
    Route::post('/add-main-club', [TeamClubController::class, 'store']);
    Route::get('/edit-main-club/{id}', [TeamClubController::class, 'edit']);
    Route::post('/edit-main-club/{id}', [TeamClubController::class, 'update']);
    Route::get('/remove-main-club/{id}', [TeamClubController::class, 'destroy']);

    // more club router
    Route::get('/show-club/{id}', [TeamClubController::class, 'show'])->name('team.show.club');
    Route::get('/add-club/{id}', [TeamClubController::class, 'create_club']);
    Route::post('/add-club/{id}', [TeamClubController::class, 'save_club']);
    Route::get('/edit-club/{id}', [TeamClubController::class, 'edit_club']);
    Route::post('/edit-club/{id}', [TeamClubController::class, 'update_club']);
    Route::get('/remove-club/{id}', [TeamClubController::class, 'destroy_club']);

    // detail club router
    Route::get('/detail-club/{id}', [TeamClubController::class, 'detail_club'])->name('team.detail.club');
    Route::get('add-club-detail/{id}', [TeamClubController::class, 'detail_Create']);
    Route::post('add-club-detail/{id}', [TeamClubController::class, 'detail_store']);
    Route::get('/remove-club-detail/{id}', [TeamClubController::class, 'detail_destroy']);

    // player router
    Route::get('/players', [PlayerController::class, 'index'])->name('team.player');
    Route::get('/add-player', [PlayerController::class, 'create']);
    Route::post('/add-player', [PlayerController::class, 'store']);
    Route::get('/edit-player/{id}', [PlayerController::class, 'edit']);
    Route::post('/edit-player/{id}', [PlayerController::class, 'update']);
    Route::get('/remove-player/{id}', [PlayerController::class, 'destroy']);

    // player career router
    Route::get('/player-career/{id}', [PlayerController::class, 'career'])->name('team.player.career');
    Route::get('/add-player-career/{id}', [PlayerController::class, 'create_career']);
    Route::post('/add-player-career/{id}', [PlayerController::class, 'store_career']);
    Route::get('/edit-career/{id}', [PlayerController::class, 'edit_career']);
    Route::post('/edit-career/{id}', [PlayerController::class, 'update_career']);
    Route::get('/remove-career/{id}', [PlayerController::class, 'destroy_career']);
});


Route::get('/show-stream', [StreamController::class, 'show_stream']);


Route::get('reset-password', function (Request $request) {
    if (!$request->hasValidSignature()) {
        abort(401);
    } else {
        return view('auth.passwords.reset');
    }
})->name('reset-password');


Route::get('notification-test/', function () {
    $server_key = 'AAAAcSDZJio:APA91bHu8_DuPYeZ9FliemNRJqNbMD9SYhAqVCKoWPRx9Vp2l1wQyT3Z1goJkRzddP10tMIUtKdUQOupTJq88Vv3ilBtj58Je-82PWRZmJQ4qCJSG_ZZjD9OeKOlQs3cNCGU05AqYwRA';
    $data = [
        'registration_ids' => [
            'Eefuf44jf4S3qTwMckNvyAZg:APA91bFj2rYcxTZrmpqD5f8uWA_DeWbtA91745hPUuMCr1PYcrDh7tPsRRc_7S2Pdm7I5AwPxgP9sezPvMGqJdY22D_mBrKJfjasjt8Pj3-s-JY1QgNradczuxBs3fFxoxqPqmGBHAIg',
            'cPynblXTRFyQomtcVYVQQ3:APA91bHx47B5GU1TFbMVYca7XBbI3xTaz8qY8JGANOpPedOvBdzsjGPrSa5NA5ZCTmbfHKN-hk9POJ8oD95Uo2NQgdo2rxh9vt91TNcP1NWvki8NPplpznDlKmgeulQXB_TpHj0l1EBa',
            'eGtOdN4xR7iJUlWQ8Oyds8:APA91bF6tFM8ABSWDk4wFga5SMJgF4QMsxsGB207B_U0W0mBE8ntdkiY6mZ_OmP0af7iE1gHxdLRXr91kpFWOBxHlo0ws8fEz_q2jVd28JFo9MS_7BwMyiOtyCj1Zxcibb5gpUVzm1wz',
            'dar-J-bCTWiKxnhOUP86Hm:APA91bE5omdjdppjPFR0Q8TYn-EYOmE292kDs6knhicAVm5RXzaJyPWoIV-SwbLfPyf8vk89FmRTnX_wNn554Jx_eOCjHk_DbluCFvO-dwCbeHuwooTjqV81soIpoGOUXAZYV2avDUh0',
        ],
        'notification' => [
            'image' => 'image',
            'body' => 'sent to multiple users send device test',
            'place' => '$request->event_place',
        ]

    ];
    $dataString = json_encode($data);

    $headers = [
        'Authorization: key=' . $server_key,
        'Content-Type: application/json',
    ];
    $url = 'https://fcm.googleapis.com/fcm/send';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

    curl_exec($ch);
    echo "sent";
});
