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
        return view('pages.Federation.create');
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
        $request->validate([
            'image'       => 'required|image',
            'player_name' => 'required',
            'player_rank' => 'required',
            'ficb'   => 'required',
            'uisp'   => 'required',
            'itsf'   => 'required',
            'licb'   => 'required',
            'fpicb'  => 'required',
            'p4p'    => 'required',
        ]);

        $destinationPath = 'federation-pics/';

        $image = $request->file('image');
        $image_name = time() . $image->getClientOriginalName();
        $check = $image->move($destinationPath, $image_name);

        $data = new Federation;
        $data->image = env('APP_URL') . $destinationPath . $image_name;
        $data->player_name = $request->player_name;

        $data->FICB = $request->ficb;
        $data->UISP = $request->uisp;
        $data->ITSF = $request->itsf;
        $data->LICB = $request->licb;
        $data->fpicb = $request->fpicb;
        $data->p4p = $request->p4p;
        $data->player_rank = $request->player_rank;
        $data->save();

        $request->session()->flash('message', 'Federation add successfully.');
        return redirect()->back();
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
    public function edit(Federation $federation)
    {
        return view('pages.Federation.edit', [
            'data' => $federation
        ]);
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
        $request->validate([
            'image'       => 'nullable|image',
            'player_name' => 'required',
            'player_rank' => 'required',
            'ficb'  => 'required',
            'uisp'  => 'required',
            'itsf'  => 'required',
            'licb'  => 'required',
        ]);

        if ($request->hasFile('image')) {
            $destinationPath = 'federation-pics/';

            $image = $request->file('image');
            $image_name = time() . $image->getClientOriginalName();
            $image->move($destinationPath, $image_name);

            Federation::where('id', $federation->id)->update([
                'image'       => env('APP_URL') . $destinationPath . $image_name,
                'player_name' => $request->player_name,
                'FICB'            => $request->ficb,
                'UISP'            => $request->uisp,
                'ITSF'            => $request->itsf,
                'LICB'            => $request->licb,
                'fpicb'           => $request->fpicb,
                'p4p'             => $request->p4p,
                'player_rank'     =>  $request->player_rank,
            ]);
        } else {
            $upadte = Federation::where('id', $federation->id)->update([
                'player_name' => $request->player_name,
                'FICB'            => $request->ficb,
                'UISP'            => $request->uisp,
                'ITSF'            => $request->itsf,
                'LICB'            => $request->licb,
                'fpicb'           => $request->fpicb,
                'p4p'             => $request->p4p,
                'player_rank'     =>  $request->player_rank,
            ]);
        }

        $request->session()->flash('message', 'Federation update successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Federation $federation)
    {
        $federation->delete();
        $request->session()->flash('message', 'Federation data remove successfully.');
        return back();
    }
}
