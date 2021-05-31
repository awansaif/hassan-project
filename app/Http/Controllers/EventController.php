<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Models\Event;
use App\Models\LatestEvent;
use App\Models\User;
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
        $events = Event::orderBy('id', 'DESC')->get();
        return view('pages.Events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.Events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventStoreRequest $request)
    {

        $eventImage = $this->fileUpload('images/', $request->file('event_image'));
        $secondaryImage = $this->fileUpload('images/', $request->file('secondary_image'));
        $authorImage = $this->fileUpload('images/', $request->file('author_image'));

        $data = new Event;
        $data->event_image = $eventImage;
        $data->secondary_image = $secondaryImage;
        $data->short_description = $request->event_short_description;
        $data->long_decription = $request->event_long_description;
        $data->even_price = $request->event_price;
        $data->event_place = $request->event_place;
        $data->event_timing = $request->event_timing;
        $data->author_name = $request->aurthor_name;
        $data->federation_name = $request->federation_name;
        $data->author_image = $authorImage;
        $data->further_detail = $request->further_detail;
        $data->zip_code = $request->zip_code;
        $data->location_map_link = $request->location_map_link;
        $data->save();

        $data = new LatestEvent();
        $data->event_image = $eventImage;
        $data->secondary_image = $secondaryImage;
        $data->short_description = $request->event_short_description;
        $data->long_decription = $request->event_long_description;
        $data->even_price = $request->event_price;
        $data->event_place = $request->event_place;
        $data->event_timing = $request->event_timing;
        $data->author_name = $request->aurthor_name;
        $data->federation_name = $request->federation_name;
        $data->author_image = $authorImage;
        $data->further_detail = $request->further_detail;
        $data->location_map_link = $request->location_map_link;
        $data->save();

        $tokens = User::select('token')->where('zip_code', $request->zip_code)->where('token', '!=', null)->get();
        foreach ($tokens as $token) {
            $tok[] = $token->token;
        }
        $server_key = 'AAAAcSDZJio:APA91bHu8_DuPYeZ9FliemNRJqNbMD9SYhAqVCKoWPRx9Vp2l1wQyT3Z1goJkRzddP10tMIUtKdUQOupTJq88Vv3ilBtj58Je-82PWRZmJQ4qCJSG_ZZjD9OeKOlQs3cNCGU05AqYwRA';
        $data = [
            'registration_ids' => $tok,
            'notification' => [
                'image' => $eventImage,
                'body' => $request->event_short_description,
                'place' => $request->event_place,
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
        $request->session()->flash('message', 'Event saved successfully.');
        return back();
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
        return view('pages.Events.update', [
            'event' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventUpdateRequest $request, Event $event)
    {

        $event->update([
            'event_image'        => $request->file('event_image') ? $this->fileUpload('images/', $request->file('event_image')) : $event->event_image,
            'secondary_image'    => $request->file('secondary_image') ? $this->fileUpload('images/', $request->file('secondary_image')) : $event->secondary_image,
            'short_description'  => $request->event_short_description,
            'long_decription'    => $request->event_long_description,
            'even_price'         => $request->event_price,
            'event_place'   => $request->event_place,
            'event_timing'  => $request->event_timing,
            'author_name'   => $request->aurthor_name,
            'federation_name'   => $request->federation_name,
            'further_detail'    => $request->further_detail,
            'location_map_link' => $request->location_map_link,
            'author_image' => $request->file('author_image') ? $this->fileUpload('images/', $request->file('author_image')) : $event->author_image,
            'zip_code'     => $request->zip_code,
        ]);

        $request->session()->flash('message', 'Event updated successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return back()->with(['message', 'Event deleted successfully']);
    }


    protected function fileUpload($destination, $file)
    {
        $file_name = time() . $file->getClientOriginalName();
        $file->move($destination, $file_name);
        return env('APP_URL') . $destination . $file_name;
    }
}
