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
        return view('pages.country.main',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.country.add-country');
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
            'country_name' => 'required',
            'flag'         => 'required|image',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            $destinationPath = 'flag-pics/';

            $flag_pic = $request->file('flag');
            $flag_file_name = time().$flag_pic->getClientOriginalName();
            $check = $flag_pic->move($destinationPath,$flag_file_name);

            $data = new Country;
            $data->country = $request->country_name;
            $data->flag  = env('APP_URL'). $destinationPath . $flag_file_name;
            $data->save();
            $request->session()->flash('message', 'Country data save successfully.');
            return redirect()->back();
        }
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
    public function edit(Request $request, Country $country)
    {
        //
        $data = Country::where('id', $request->id)->first();
        return view('pages.country.edit-country',compact('data'));
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
        //
        $validator = Validator::make($request->all(), [
            'country_name' => 'required',
            'flag'         => 'nullable|image',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            if($request->file('flag'))
            {
                $destinationPath = 'flag-pics/';

                $flag_pic = $request->file('flag');
                $flag_file_name = time().$flag_pic->getClientOriginalName();
                $check = $flag_pic->move($destinationPath,$flag_file_name);

                $update = Country::where('id', $request->country_id)->update([
                    'flag'    => env('APP_URL'). $destinationPath . $flag_file_name,
                    'country' => $request->country_name,
                ]);
                $request->session()->flash('message', 'Country data save successfully.');
                return redirect()->back();
            }
            else
            {
                $update = Country::where('id', $request->country_id)->update([
                    'country' => $request->country_name,
                ]);
                $request->session()->flash('message', 'Country data update successfully.');
                return redirect()->back();
            }

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Country $country)
    {
        //
        $check = Country::where('id', $request->id)->delete();
        if($check)
        {
            $request->session()->flash('message', 'Country data remove successfully.');
            return redirect()->back();
        }
    }
}
