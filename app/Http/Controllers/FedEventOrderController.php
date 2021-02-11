<?php

namespace App\Http\Controllers;

use App\Models\FedEventOrder;
use Illuminate\Http\Request;

class FedEventOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = FedEventOrder::with('events', 'users')
                                ->orderBy('id', 'DESC')
                                ->get();
        return view('pages.FedEventOrder.main', compact('orders'));
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
     * @param  \App\Models\FedEventOrder  $fedEventOrder
     * @return \Illuminate\Http\Response
     */
    public function show(FedEventOrder $fedEventOrder, Request $req)
    {
        //
        $order  =   FedEventOrder::with('events', 'users')
                                ->first();
        return view('pages.FedEventORder.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FedEventOrder  $fedEventOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(FedEventOrder $fedEventOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FedEventOrder  $fedEventOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FedEventOrder $fedEventOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FedEventOrder  $fedEventOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(FedEventOrder $fedEventOrder)
    {
        //
    }
}
