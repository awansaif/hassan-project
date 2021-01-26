<?php

namespace App\Http\Controllers;

use App\Models\FlashNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FlashNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $news = FlashNews::orderBY('id', 'DESC')->get();
        return view('pages.FlashNews.main',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.FlashNews.create');
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
            $data = new FlashNews;
            $data->title = $request->title;
            $data->date_and_time = $request->datetime;
            $data->featured_image = env('APP_URL'). $destinationPath.$file_name;
            $data->detail = $request->details;
            $data->save();
            $request->session()->flash('message', 'Flash News add successfully.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FlashNews  $flashNews
     * @return \Illuminate\Http\Response
     */
    public function show(FlashNews $flashNews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FlashNews  $flashNews
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, FlashNews $flashNews)
    {
        //
        $data = FlashNews::where('id', $request->id)->first();
        return view('pages.FlashNews.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FlashNews  $flashNews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FlashNews $flashNews)
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

                $update = FlashNews::where('id', $request->news_id)->update([
                    'featured_image'    => env('APP_URL'). $destinationPath . $file_name
                ]);
            }

            $update = FlashNews::where('id', $request->news_id)->update([
                'title' => $request->title,
                'date_and_time' => $request->datetime,
                'detail' => $request->details,
            ]);

            $request->session()->flash('message', 'Flash News updated successfully.');
            return redirect()->back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FlashNews  $flashNews
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $check = FlashNews::where('id', $request->id)->delete();
        if($check)
        {
            $request->session()->flash('message', 'Flash News data remove successfully.');
            return redirect()->back();
        }
    }
}
