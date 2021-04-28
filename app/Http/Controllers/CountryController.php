<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $countries = Country::orderBy('id', 'DESC')->get();
        return view('pages.country.main', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.country.create');
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
            'country_name' => 'required',
            'flag'         => 'required|image',
        ]);

        $destinationPath = 'flag-pics/';

        $flag_pic = $request->file('flag');
        $flag_file_name = time() . $flag_pic->getClientOriginalName();
        $flag_pic->move($destinationPath, $flag_file_name);

        Country::Create([
            'country' => $request->country_name,
            'flag'  => env('APP_URL') . $destinationPath . $flag_file_name,
        ]);

        $request->session()->flash('message', 'Country data save successfully.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('pages.country.edit', [
            'data' => $country
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $request->validate([
            'country_name' => 'required',
            'flag'         => 'nullable|image',
        ]);

        if ($request->file('flag')) {
            $destinationPath = 'flag-pics/';

            $flag_pic = $request->file('flag');
            $flag_file_name = time() . $flag_pic->getClientOriginalName();
            $flag_pic->move($destinationPath, $flag_file_name);

            $country->update([
                'flag'    => env('APP_URL') . $destinationPath . $flag_file_name,
                'country' => $request->country_name,
            ]);
        } else {
            $country->update([
                'country' => $request->country_name,
            ]);
        }
        $request->session()->flash('message', 'Country data update successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Country $country)
    {
        $country->delete();
        $request->session()->flash('message', 'Country data remove successfully.');
        return back();
    }
}
