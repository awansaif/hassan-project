<?php

namespace App\Http\Controllers;

use App\Models\Cassifiche;
use App\Models\FederationMovement;
use Illuminate\Http\Request;

class CassificheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cassifiches = Cassifiche::with('federations')->get();
        return view('pages.FederationCassifiche.main', compact('cassifiches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $federations = FederationMovement::orderBy('id', 'DESC')->get();
        return view('pages.FederationCassifiche.create', compact('federations'));
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
        $file = $request->file('image');
        $destinationPath = 'cassifiche-img/';
        $file_name = time().$file->getClientOriginalName();
        $check = $file->move($destinationPath,$file_name);

        $data = new Cassifiche();
        $data->federation_id = $request->federation;
        $data->leaderboard_name = $request->name;
        $data->image = env('APP_URL'). $destinationPath.$file_name;
        $data->save();
        $request->session()->flash('message', 'Cassifiche add successfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cassifiche  $cassifiche
     * @return \Illuminate\Http\Response
     */
    public function show(Cassifiche $cassifiche)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cassifiche  $cassifiche
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = Cassifiche::where('id', $request->id)->first();
        return view('pages.FederationCassifiche.edit', compact('data'))->with([
            'federations' => FederationMovement::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cassifiche  $cassifiche
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->except(['_token']);

        if($request->file('image')){
            $destinationPath = 'cassifiche-img/';
            $image = $request->file('image');
            $file_name = time().$image->getClientOriginalName();
            $check = $image->move($destinationPath,$file_name);

            $update = Cassifiche::where('id', $request->id)->update([
                'image' => env('APP_URL'). $destinationPath . $file_name
            ]);
        }

        $update = Cassifiche::where('id', $request->id)->update([
            'federation_id' => $request->federation,
            'leaderboard_name' => $request->name
        ]);

        return redirect()->back()->with(['message' => 'Cassifache Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cassifiche  $cassifiche
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $check = Cassifiche::where('id', $request->id)->delete();
        if ($check) {
            $request->session()->flash('message', 'Product remove successfully.');
            return redirect()->back();
        }
    }
}
