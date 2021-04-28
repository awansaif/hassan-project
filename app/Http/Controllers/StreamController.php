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
        return view('pages.Stream.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'featured_image' => 'required|image',
            'title' => 'required',
            'stream' => 'required|url',
        ]);

        $file1 = $request->file('featured_image');
        $destinationPath = 'stream-pics/';
        $featured_image = time() . $file1->getClientOriginalName();
        $file1->move($destinationPath, $featured_image);


        // $path = $request->stream;
        // parse_str( parse_url( $path, PHP_URL_QUERY ), $stream_path);

        Stream::create([
            'featured_image' => env('APP_URL') . $destinationPath . $featured_image,
            'title' => $request->title,
            'stream_path' => $request->stream,
        ]);

        $request->session()->flash('message', $request->title . ' stream add successfully.');
        return back();
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
    public function edit(Stream $stream)
    {
        return view('pages.Stream.edit', [
            'data' => $stream
        ]);
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
        $request->validate([
            'featured_image' => 'nullable|image',
            'title' => 'required',
            'stream' => 'required|url',
        ]);

        if ($request->file('featured_image')) {
            $file1 = $request->file('featured_image');
            $destinationPath = 'stream-pics/';
            $featured_image = time() . $file1->getClientOriginalName();
            $file1->move($destinationPath, $featured_image);

            $stream->update([
                'featured_image'  => env('APP_URL') . $destinationPath . $featured_image,
                'title'           => $request->title,
                'stream_path'     => $request->stream,
            ]);
        } else {
            $stream->update([
                'title'       => $request->title,
                'stream_path' =>  $request->stream
            ]);
        }
        $request->session()->flash('message', 'Stream update successfully.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Stream $stream)
    {
        $stream->delete();
        $request->session()->flash('message', 'Stream remove successfully.');
        return back();
    }

    public function start_stream()
    {
        return view('pages.Stream.start-stream');
    }

    public function show_stream()
    {
        return view('pages.Stream.show-stream');
    }
}
