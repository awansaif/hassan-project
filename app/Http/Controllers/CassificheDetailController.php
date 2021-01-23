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
        $data = CassificheDetail::with('cassifiches')->where('cassifiche_id', $request->id)->get();
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
    public function edit(CassificheDetail $cassificheDetail)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CassificheDetail  $cassificheDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(CassificheDetail $cassificheDetail)
    {
        //
    }
}
