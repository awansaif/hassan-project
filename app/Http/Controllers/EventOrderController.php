<?php

namespace App\Http\Controllers;

use App\Models\EventOrder;
use Illuminate\Http\Request;

class EventOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = EventOrder::with('events', 'users')
                                ->orderBy('id', 'DESC')
                                ->get();
        return view('pages.EventOrder.main', compact('orders'));
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
     * @param  \App\Models\EventOrder  $eventOrder
     * @return \Illuminate\Http\Response
     */
    public function show(EventOrder $eventOrder,Request $request)
    {
        //
        $order = EventOrder::with('events', 'users')
                                ->where('id', $request->order)
                                ->first();
        return view('pages.EventOrder.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventOrder  $eventOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(EventOrder $eventOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventOrder  $eventOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventOrder $eventOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventOrder  $eventOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventOrder $eventOrder)
    {
        //
    }
}
