<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $videos = Video::orderBY('id', 'DESC')->get();
        return view('pages.Video.main', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.Video.create');
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
        $path = $request->video;
        parse_str( parse_url( $path, PHP_URL_QUERY ), $video_path);

        $destination = 'videos/';

        $thumb = $request->file('thumbnail');
        $thumb_name = time().$thumb->getClientOriginalName();
        $thumb->move($destination,$thumb_name);

        $data = new Video();
        $data->video_title = $request->title;
        $data->thumbnail   = env('APP_URL').$destination.$thumb_name;
        $data->video_path  = $video_path['v'];
        $data->save();
        $request->session()->flash('message', $request->title . ' Video saved successfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Video $video)
    {
        //
        $data = Video::where('id', $request->id)->first();
        return view('pages.Video.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
        $path = $request->video;
        parse_str( parse_url( $path, PHP_URL_QUERY ), $video_path);
        $destination = 'videos/';
        if($request->file('thumbnail'))
        {

            $thumb = $request->file('thumbnail');
            $thumb_name = time().$thumb->getClientOriginalName();
            $thumb->move($destination,$thumb_name);

            $update = Video::where('id', $request->id)->update([
                'video_title' => $request->title,
                'thumbnail'   => env('APP_URL').$destination.$thumb_name,
                'video_path'  => $video_path['v']
            ]);
            $request->session()->flash('message', 'Video Updated successfully.');
            return redirect()->back();
        }
        else{
            $update = Video::where('id', $request->id)->update([
                'video_title' => $request->title,
                'video_path'  => $video_path['v'],
            ]);
            $request->session()->flash('message', $request->title . ' video Updated successfully.');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Video $video)
    {
        //
        $delete = Video::where('id', $request->id)->delete();
        $request->session()->flash('message', 'Video deleted successfully.');
        return redirect()->back();
    }
}
