<?php

namespace App\Http\Controllers;

use App\Models\Stream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StreamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $streams = Stream::orderBy('id', 'DESC')->get();
        return view('pages.Stream.main', compact('streams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.Stream.add-stream');
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
            'stream_featured_image' => 'required|image',
            'match_detail' => 'required',
            'sports_club_image' => 'required|image',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)
                        ->withInput();
        }
        else{
            $file1 = $request->file('stream_featured_image');
            $destinationPath = 'stream-pics/';
            $file_name1 = time().$file1->getClientOriginalName();
            $check = $file1->move($destinationPath,$file_name1);

            $file = $request->file('sports_club_image');
            $file_name = time().$file->getClientOriginalName();
            $check = $file->move($destinationPath,$file_name);

            $data = new Stream;
            $data->stream_featured_image = 'http://alviawan.tk/'. $destinationPath.$file_name1;
            $data->match_details = $request->match_detail;
            $data->sports_club_image = 'http://alviawan.tk/'. $destinationPath.$file_name;
            $data->save();
            $request->session()->flash('message', 'stream add successfully.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function show(Stream $stream)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Stream $stream)
    {
        //
        $data = Stream::where('id', $request->id)->first();
        return view('pages.Stream.edit-stream', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stream $stream)
    {
        //
        $validator = Validator::make($request->all(), [
            'stream_featured_image' => 'nullable|image',
            'match_detail' => 'required',
            'sports_club_image' => 'nullable|image',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)
                        ->withInput();
        }
        else{
            if($request->file('stream_featured_image') && $request->file('sports_club_image'))
            {
                $file1 = $request->file('stream_featured_image');
                $destinationPath = 'stream-pics/';
                $file_name1 = time().$file1->getClientOriginalName();
                $check = $file1->move($destinationPath,$file_name1);

                $file = $request->file('sports_club_image');
                $file_name = time().$file->getClientOriginalName();
                $check = $file->move($destinationPath,$file_name);
                $update = Stream::where('id', $request->stream_id)->update([
                    'stream_featured_image' => 'http://alviawan.tk/'. $destinationPath.$file_name1,
                    'match_details' => $request->match_detail,
                    'sports_club_image' => 'http://alviawan.tk/'. $destinationPath.$file_name
                ]);
                $request->session()->flash('message', 'Stream update successfully.');
                return redirect()->back();
            }
            elseif($request->file('stream_featured_image'))
            {
                $file1 = $request->file('stream_featured_image');
                $destinationPath = 'stream-pics/';
                $file_name1 = time().$file1->getClientOriginalName();
                $check = $file1->move($destinationPath,$file_name1);
                $update = Stream::where('id', $request->stream_id)->update([
                    'stream_featured_image' => 'http://alviawan.tk/'. $destinationPath.$file_name1,
                    'match_details' => $request->match_detail,
                ]);
                $request->session()->flash('message', 'Stream update successfully.');
                return redirect()->back();
            }
            elseif($request->file('sports_club_image'))
            {
                $file = $request->file('sports_club_image');
                $destinationPath = 'stream-pics/';
                $file_name = time().$file->getClientOriginalName();
                $check = $file->move($destinationPath,$file_name);
                $update = Stream::where('id', $request->stream_id)->update([
                    'match_details' => $request->match_detail,
                    'sports_club_image' => 'http://alviawan.tk/'. $destinationPath.$file_name
                ]);
                $request->session()->flash('message', 'Stream update successfully.');
                return redirect()->back();
            }
            else
            {
                $update = Stream::where('id', $request->stream_id)->update([
                    'match_details' => $request->match_detail
                ]);
                $request->session()->flash('message', 'Stream update successfully.');
                return redirect()->back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Stream $stream)
    {
        //
        $check = Stream::where('id', $request->id)->delete();
        if($check)
        {
            $request->session()->flash('message', 'Stream remove successfully.');
            return redirect()->back();
        }
    }
}
