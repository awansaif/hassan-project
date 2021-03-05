<?php

namespace App\Http\Controllers;

use App\Models\Federation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FederationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $federations = Federation::orderBy('id', 'DESC')->get();
        return view('pages.Federation.main', compact('federations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.Federation.add-federation');
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
            'image'       => 'required|image',
            'player_name' => 'required',
            'player_rank' => 'required',
            'FICB'  => 'required',
            'UISP' => 'required',
            'ITSF'            => 'required',
            'LICB'   => 'required',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)
                        ->withInput();
        }
        else{
            $destinationPath = 'federation-pics/';

            $image = $request->file('image');
            $image_name = time().$image->getClientOriginalName();
            $check = $image->move($destinationPath,$image_name);

            $data = new Federation;
            $data->image = env('APP_URL').$destinationPath.$image_name;
            $data->player_name = $request->player_name;
            $data->FICB = $request->FICB;
            $data->UISP = $request->UISP;
            $data->ITSF = $request->ITSF;
            $data->LICB = $request->LICB;
            $data->player_rank = $request->player_rank;
            $data->save();
            $request->session()->flash('message', 'Federation add successfully.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Http\Response
     */
    public function show(Federation $federation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Federation $federation)
    {
        //
        $data = Federation::where('id', $request->id)->first();
        return view('pages.Federation.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Federation $federation)
    {
        //
        $validator = Validator::make($request->all(), [
            'player_name' => 'required',
            'player_rank' => 'required',
            'FICB'  => 'required',
            'UISP' => 'required',
            'ITSF'            => 'required',
            'LICB'   => 'required',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)
                        ->withInput();
        }
        else{
            if($request->hasFile('image'))
            {
                $destinationPath = 'federation-pics/';

                $image = $request->file('image');
                $image_name = time().$image->getClientOriginalName();
                $check = $image->move($destinationPath,$image_name);

                $upadte = Federation::where('id', $request->federation_id)->update([
                    'image'       => env('APP_URL').$destinationPath.$image_name,
                    'player_name' => $request->player_name,
                    'FICB'            => $request->FICB,
                    'UISP'            => $request->UISP,
                    'ITSF'            => $request->ITSF,
                    'LICB'            => $request->LICB,
                    'player_rank'     =>  $request->player_rank,
                ]);
                $request->session()->flash('message', 'Federation update successfully.');
                return redirect()->back();
            }
            else
            {
                $upadte = Federation::where('id', $request->federation_id)->update([
                    'player_name' => $request->player_name,
                    'FICB'            => $request->FICB,
                    'UISP'            => $request->UISP,
                    'ITSF'            => $request->ITSF,
                    'LICB'            => $request->LICB,
                    'player_rank'            =>  $request->player_rank,
                ]);
                $request->session()->flash('message', 'Federation update successfully.');
                return redirect()->back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Federation $federation)
    {
        //
        $check = Federation::where('id', $request->id)->delete();
        if($check)
        {
            $request->session()->flash('message', 'Federation data remove successfully.');
            return redirect()->back();
        }
    }
}
