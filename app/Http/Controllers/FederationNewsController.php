<?php

namespace App\Http\Controllers;

use App\Models\FederationMovement;
use App\Models\FederationNews;
use App\Models\RecentNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FederationNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $federationNews = FederationNews::with('federations')->get();
        return view('pages.FederationNews.main',compact('federationNews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $federations = FederationMovement::orderBY('id', 'DESC')->get();
        return view('pages.FederationNews.create', compact('federations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'federation' => 'required',
            'title' => 'required',
            'datetime'  => 'required',
            'details'             => 'required',
            'file'            => 'required|image',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)
                        ->withInput();
        }
        else{
            $file = $request->file('file');
            $destinationPath = 'federation-news-pics/';
            $file_name = time().$file->getClientOriginalName();
            $check = $file->move($destinationPath,$file_name);

            $data = new FederationNews();
            $data->federation_id = $request->federation;
            $data->title = $request->title;
            $data->date_and_time = $request->datetime;
            $data->featured_image = env('APP_URL'). $destinationPath.$file_name;
            $data->detail = $request->details;
            $data->save();

            $data_recent = new RecentNews();
            $data_recent->federation_news_id = $data->id;
            $data_recent->title = $request->title;
            $data_recent->date_and_time = $request->datetime;
            $data_recent->featured_image = env('APP_URL'). $destinationPath.$file_name;
            $data_recent->detail = $request->details;
            $data_recent->save();

            $request->session()->flash('message', 'Federation News add successfully.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FederationNews  $federationNews
     * @return \Illuminate\Http\Response
     */
    public function show(FederationNews $federationNews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FederationNews  $federationNews
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = FederationNews::where('id', $request->id)->first();

        return view('pages.FederationNews.edit')
            ->with('federations', FederationMovement::all())
            ->with('data', $data)
            ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FederationNews  $federationNews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FederationNews $federationNews)
    {
        $validator = Validator::make($request->all(), [
            'federation' => 'required',
            'title' => 'required',
            'datetime'  => 'required',
            'details'             => 'required',
            'file'            => 'required|image',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)
                        ->withInput();
        }
        else{


            if($request->file('file'))
            {
                $file = $request->file('file');
                $destinationPath = 'federation-news-pics/';
                $file_name = time().$file->getClientOriginalName();
                $check = $file->move($destinationPath,$file_name);

                $update = FederationNews::where('id', $request->id)->update([
                    'featured_image'    => env('APP_URL'). $destinationPath . $file_name
                ]);
                $update = FederationNews::find($request->id)->recent_news->update([
                    'featured_image'    => env('APP_URL'). $destinationPath . $file_name
                ]);
                // $request->session()->flash('message', 'Event data save successfully.');
                // return redirect()->back();
            }

            FederationNews::where('id', $request->id)->update([
                'federation_id' => $request->federation,
                'title' => $request->title,
                'date_and_time' => $request->datetime,
                'detail' => $request->details,
            ]);
            FederationNews::find($request->id)->recent_news->update([
                'title' => $request->title,
                'date_and_time' => $request->datetime,
                'detail' => $request->details,
            ]);

            $request->session()->flash('message', 'Federation News updated successfully.');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FederationNews  $federationNews
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $check = FederationNews::where('id', $request->id)->delete();
        if($check)
        {
            $request->session()->flash('message', 'Federation data remove successfully.');
            return redirect()->back();
        }

    }
}
