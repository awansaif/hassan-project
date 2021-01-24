<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sponsors = Sponsor::orderBy('id', 'DESC')->get();
        return view('pages.Sponsor.main', compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.Sponsor.add-sponsor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'image'         => 'required|image',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            $destinationPath = 'sponsor-pics/';

            $sponsor_pic = $request->file('image');
            $sponsor_file_name = time().$sponsor_pic->getClientOriginalName();
            $check = $sponsor_pic->move($destinationPath,$sponsor_file_name);

            $data = new Sponsor;
            $data->sponsor_description = $request->description;
            $data->sponser_image  = env('APP_URL'). $destinationPath . $sponsor_file_name;
            $data->save();
            $request->session()->flash('message', 'Sponsor data save successfully.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsor $sponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Sponsor $sponsor)
    {
        //
        $data = Sponsor::where('id', $request->id)->first();
        return view('pages.Sponsor.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsor $sponsor)
    {
        //
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'image'         => 'nullable|image',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            if($request->file('image'))
            {
                $destinationPath = 'sponsor-pics/';

                $sponsor_pic = $request->file('image');
                $sponsor_file_name = time().$sponsor_pic->getClientOriginalName();
                $check = $sponsor_pic->move($destinationPath,$sponsor_file_name);

                $update = Sponsor::where('id', $request->sponsor_id)->update([
                    'sponsor_description' => $request->description,
                    'sponser_image'       => env('APP_URL'). $destinationPath . $sponsor_file_name,
                ]);
                $request->session()->flash('message', 'Sponsor data update successfully.');
                return redirect()->back();
            }
            else{
                $update = Sponsor::where('id', $request->sponsor_id)->update([
                    'sponsor_description' => $request->description
                ]);
                $request->session()->flash('message', 'Sponsor data update successfully.');
                return redirect()->back();
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Sponsor $sponsor)
    {
        //
        $check = Sponsor::where('id', $request->id)->delete();
        if($check)
        {
            $request->session()->flash('message', 'Sponsor data remove successfully.');
            return redirect()->back();
        }

    }
}
