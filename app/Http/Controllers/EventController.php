<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::orderBy('id', 'DESC')->get();
        return view('pages.Events.main', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.Events.add-event');
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
            'event_image' => 'required|image',
            'secondary_event_mage' => 'required|image',
            'event_short_description' => 'required',
            'event_long_description'  => 'required',
            'event_price'             => 'required',
            'event_place'             => 'required',
            'event_timing'            => 'required',
            'aurthor_name'            => 'required',
            'federation_name'         => 'required',
            'author_image'            => 'required',
            'further_detail'           => 'required',
            'latitude'                => 'required',
            'longtitude'              => 'required',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)
                        ->withInput();
        }
        else{
            $destinationPath = 'event-pics/';

            $event_pic = $request->file('event_image');
            $event_file_name = time().$event_pic->getClientOriginalName();
            $check = $event_pic->move($destinationPath,$event_file_name);

            $secondary_file = $request->file('secondary_event_mage');
            $secondary_file_name = time().$secondary_file->getClientOriginalName();
            $check = $secondary_file->move($destinationPath,$secondary_file_name);

            $author_file = $request->file('author_image');
            $author_file_name = time().$author_file->getClientOriginalName();
            $check = $author_file->move($destinationPath,$author_file_name);

            $data = new Event;
            $data->event_image = 'http://alviawan.tk/'. $destinationPath . $event_file_name;
            $data->secondary_image = 'http://alviawan.tk/'.$destinationPath . $secondary_file_name;
            $data->short_description = $request->event_short_description;
            $data->long_decription = $request->event_long_description;
            $data->even_price = $request->event_price;
            $data->event_place = $request->event_place;
            $data->event_timing = $request->event_timing;
            $data->author_name = $request->aurthor_name;
            $data->federation_name = $request->federation_name;
            $data->author_image = 'http://alviawan.tk/'. $destinationPath . $author_file_name;
            $data->further_detail = $request->further_detail;
            $data->longtitude = $request->longtitude;
            $data->latitude = $request->latitude;
            $data->save();
            $request->session()->flash('message', 'Event data save successfully.');
            return redirect()->back();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Event $event)
    {
        //
        $check = Event::where('id', $request->id)->delete();
        if($check)
        {
            $request->session()->flash('message', 'Event data save successfully.');
            return redirect()->back();
        }

    }
}
