<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\RecentNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('id', 'DESC')->get();
        return view('pages.news.main', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.news.add-news');
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
            $destinationPath = 'news-pics/';
            $file_name = time().$file->getClientOriginalName();
            $check = $file->move($destinationPath,$file_name);

            $data = new News;
            $data->title = $request->title;
            $data->date_and_time = $request->datetime;
            $data->featured_image = env('APP_URL'). $destinationPath.$file_name;
            $data->detail = $request->details;
            $data->save();

            $data_recent = new RecentNews();
            $data_recent->news_id = $data->id;
            $data_recent->title = $request->title;
            $data_recent->date_and_time = $request->datetime;
            $data_recent->featured_image = env('APP_URL'). $destinationPath.$file_name;
            $data_recent->detail = $request->details;
            $data_recent->save();

            $request->session()->flash('message', 'News add successfully.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, News $news)
    {
        $data = News::where('id', $request->id)->first();
        return view('pages.news.edit-news',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'datetime'  => 'required',
            'details' => 'required',
            'file' => 'nullable|image'
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            if($request->file('file'))
            {
                $file = $request->file('file');
                $destinationPath = 'news-pics/';
                $file_name = time().$file->getClientOriginalName();
                $check = $file->move($destinationPath,$file_name);

                $update = News::where('id', $request->news_id)->update([
                    'featured_image'    => env('APP_URL'). $destinationPath . $file_name
                ]);
                $update = News::find($request->id)->recent_news->update([
                    'featured_image'    => env('APP_URL'). $destinationPath . $file_name
                ]);
                
            }

            $update = News::where('id', $request->news_id)->update([
                'title' => $request->title,
                'date_and_time' => $request->datetime,
                'detail' => $request->details,
            ]);
            $update = News::find($request->news_id)->recent_news->update([
                'title' => $request->title,
                'date_and_time' => $request->datetime,
                'detail' => $request->details,
            ]);

            $request->session()->flash('message', 'News updated successfully.');
            return redirect()->back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $check = News::where('id', $request->id)->delete();
        if($check)
        {
            $request->session()->flash('message', 'News data remove successfully.');
            return redirect()->back();
        }
    }
}
