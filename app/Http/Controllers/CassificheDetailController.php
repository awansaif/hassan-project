<?php

namespace App\Http\Controllers;

use App\Models\CassificheDetail;
use Illuminate\Http\Request;

class CassificheDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data = CassificheDetail::with('cassifiches')
                                    ->where('cassifiche_id', $request->id)
                                    ->orderBy('player_rank','ASC')
                                    ->get();
        return view('pages.FederationCassifiche.detail', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.FederationCassifiche.add-detail');
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
        if($request->file('image'))
        {
            $destinationPath = 'cassifiche-img/';
            $file = $request->file('image');
            $file_name = time().$file->getClientOriginalName();
            $file->move($destinationPath,$file_name);
        }
        $data = new CassificheDetail();
        $data->cassifiche_id = $request->cassifiche;
        $data->name = $request->name;
        $data->image = env('APP_URL').$destinationPath.$file_name;
        $data->player_rank = $request->rank;
        $data->ciita = $request->ciita;
        $data->region = $request->region;
        $data->pr = $request->pr;
        $data->pn = $request->pn;
        $data->save();
        $request->session()->flash('message', 'Cassifiche detail add successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CassificheDetail  $cassificheDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CassificheDetail $cassificheDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CassificheDetail  $cassificheDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CassificheDetail $cassificheDetail)
    {
        //
        $data = CassificheDetail::where('id', $request->id)->first();
        return view('pages.FederationCassifiche.edit-detail', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CassificheDetail  $cassificheDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CassificheDetail $cassificheDetail)
    {
        //
        if($request->file('image'))
        {
            $destinationPath = 'cassifiche-img/';
            $file = $request->file('image');
            $file_name = time().$file->getClientOriginalName();
            $file->move($destinationPath,$file_name);
            $update = CassificheDetail::where('id', $request->detail_id)->update([
                'name' => $request->name,
                'image' => env('APP_URL').$destinationPath.$file_name,
                'player_rank' => $request->rank,
                'ciita' => $request->ciita,
                'region' => $request->region,
                'pr' => $request->pr,
                'pn' => $request->pn,
            ]);
            $request->session()->flash('message', 'Cassifiche detail update successfully');
            return redirect()->back();
        }
        else
        {
            $update = CassificheDetail::where('id', $request->detail_id)->update([
                'name' => $request->name,
                'player_rank' => $request->rank,
                'ciita' => $request->ciita,
                'region' => $request->region,
                'pr' => $request->pr,
                'pn' => $request->pn,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CassificheDetail  $cassificheDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CassificheDetail $cassificheDetail)
    {
        //
        $data = CassificheDetail::where('id', $request->id)->delete();
        $request->session()->flash('message', 'Cassifiche detail remove successfully');
        return redirect()->back();
    }
}
