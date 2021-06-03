<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClubClassificationStoreRequest;
use App\Models\Club;
use App\Models\ClubClassification;
use App\Models\MainClub;
use Illuminate\Http\Request;

class ClubClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.Club.classification.index', [
            'classification' => ClubClassification::with(['club' => function ($query) {
                $query->select('id', 'name');
            }])->orderBy('club_id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.Club.classification.create', [
            'clubs' => MainClub::with('clubs')->orderBy('club_name', 'ASC')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClubClassificationStoreRequest $request)
    {
        ClubClassification::Create($request->validated() + ['club_id' => $request->club]);

        return back()
            ->with(['message' => 'Club classification added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClubClassification  $clubClassification
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.Club.classification.show', [
            'classification' => ClubClassification::where('club_id', $id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClubClassification  $clubClassification
     * @return \Illuminate\Http\Response
     */
    public function edit(ClubClassification $clubClassification)
    {
        return view('pages.Club.classification.edit', [
            'clubs' => MainClub::with('clubs')->orderBy('club_name', 'ASC')->get(),
            'classification' => $clubClassification
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClubClassification  $clubClassification
     * @return \Illuminate\Http\Response
     */
    public function update(ClubClassificationStoreRequest $request, ClubClassification $clubClassification)
    {
        $clubClassification->update($request->validated() + ['club_id' => $request->club]);
        return back()
            ->with(['message' => 'Club classification updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClubClassification  $clubClassification
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClubClassification $clubClassification)
    {
        $clubClassification->delete();
        return back()
            ->with(['message' => 'Club classification removed successfully']);
    }
}
