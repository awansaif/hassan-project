<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AlbodroCategory;
use App\Models\AlbodroItem;
use App\Models\Cassifiche;
use App\Models\CassificheDetail;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Stream;
use App\Models\Event;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Country;
use App\Models\Player;
use App\Models\Collection;
use App\Models\CollectionDetail;
use App\Models\FederaationSponsor;
use App\Models\Federation;
use App\Models\FederationEvent;
use App\Models\FederationMovement;
use App\Models\FederationNews;
use App\Models\FlashNews;
use App\Models\LatestEvent;
use App\Models\Sponsor;
use App\Models\Team;
use App\Models\Video;

class ApiController extends Controller
{

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
        $products = Product::with('shops')
            ->where('stock', 1)
            ->orderby('id', 'DESC')
            ->get();
        return response()->json($products);
    }

    public function product(Request $request)
    {
        $products = Product::with('shops')
            ->where('shop_id', $request->id)
            ->get();
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
        $data = CassificheDetail::with('cassifiches')
            ->where('cassifiche_id', $request->id)
            ->orderBy('player_rank', 'ASC')
            ->get();
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

    public function latest_events()
    {
        $data = LatestEvent::orderBY('id', 'DESC')->take(5)->get();
        return response()->json($data);
    }

    public function teams()
    {
        $data = Team::orderBY('id', 'DESC')->select('id', 'team_one_image', 'team_one_name', 'team_two_image', 'team_two_name', 'current_set_score')->get();
        return response()->json($data);
    }

    public function team_Score($id)
    {
        $data = Team::with('scores')->where('id', $id)->get();
        return response()->json($data);
    }
}
