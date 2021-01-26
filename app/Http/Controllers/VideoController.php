<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

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
        $destination = 'videos/';
        $file = $request->file('video');
        $file_name = time().$file->getClientOriginalName();
        $check = $file->move($destination,$file_name);
        
        $thumb = $request->file('thumbnail');
        $thumb_name = time().$thumb->getClientOriginalName();
        $check = $thumb->move($destination,$thumb_name);

        $data = new Video();
        $data->video_title = $request->title;
        $data->thumbnail = env('APP_URL').$destination.$thumb_name;
        $data->video_path = env('APP_URL').$destination.$file_name;
        $data->save();
        $request->session()->flash('message', 'Video Uploaded successfully.');
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
        $destination = 'videos/';
        if($request->file('video') && $request->file('thumbnail'))
        {
            $file = $request->file('video');
            $file_name = time().$file->getClientOriginalName();
            $check = $file->move($destination,$file_name);
            
            $thumb = $request->file('thumbnail');
            $thumb_name = time().$thumb->getClientOriginalName();
            $check = $thumb->move($destination,$thumb_name);

            $update = Video::where('id', $request->id)->update([
                'video_title' => $request->title,
                'thumbnail'   => env('APP_URL').$destination.$thumb_name,
                'video_path'  => env('APP_URL').$destination.$file_name
            ]);
            $request->session()->flash('message', 'Video Updated successfully.');
            return redirect()->back();
        }
        elseif($request->file('thumbnail'))
        {
            $thumb = $request->file('thumbnail');
            $thumb_name = time().$thumb->getClientOriginalName();
            $check = $thumb->move($destination,$thumb_name);

            $update = Video::where('id', $request->id)->update([
                'video_title' => $request->title,
                'thumbnail'   => env('APP_URL').$destination.$thumb_name,
            ]);
            $request->session()->flash('message', 'Video Updated successfully.');
            return redirect()->back();
        }
        elseif($request->file('video'))
        {
            $file = $request->file('video');
            $file_name = time().$file->getClientOriginalName();
            $check = $file->move($destination,$file_name);

            $update = Video::where('id', $request->id)->update([
                'video_title' => $request->title,
                'video_path'  => env('APP_URL').$destination.$file_name
            ]);
            $request->session()->flash('message', 'Video Updated successfully.');
            return redirect()->back();
        }
        else{
            $update = Video::where('id', $request->id)->update([
                'video_title' => $request->title,
            ]);
            $request->session()->flash('message', 'Video Updated successfully.');
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
