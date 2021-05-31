<?php

namespace App\Http\Controllers;

use App\Models\AlbodroCategory;
use App\Models\Cassifiche;
use App\Models\FederaationSponsor;
use App\Models\FederationEvent;
use App\Models\FederationMovement;
use App\Models\FederationNews;
use App\Models\MainClub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FederationMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.FederationMovement.index', [
            'federations' => FederationMovement::with('club')->orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.FederationMovement.create', [
            'clubs' => MainClub::with('clubs')->get()
        ]);
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
            'club' => 'required|exists:clubs,id',
            'name' => 'required',
            'image' => 'required|image',
            'icon'  => 'required|image',
            'latest_event' => 'required|date|after:today'
        ]);
        FederationMovement::create([
            'name'  => $request->name,
            'image' => $this->fileUpload('images/', $request->file('image')),
            'icon'  => $this->fileUpload('images/', $request->file('icon')),
            'latest_event'  => $request->latest_event,
            'club_id'  => $request->club
        ]);
        return redirect()->back()->with([
            'message' => 'Federation movement add successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FederationMovement  $federationMovement
     * @return \Illuminate\Http\Response
     */
    public function show(FederationMovement $federationMovement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FederationMovement  $federationMovement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.FederationMovement.edit', [
            'federation' => FederationMovement::find($id),
            'clubs' => MainClub::with('clubs')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FederationMovement  $federationMovement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'club' => 'required|exists:clubs,id',
            'name' => 'required',
            'image' => 'nullable|image',
            'icon'  => 'nullable|image',
            'latest_event' => 'required|date|after:today'
        ]);

        $federation = FederationMovement::find($id);
        $federation->update([
            'club_id' => $request->club,
            'name' => $request->name,
            'image' => $request->file('image') ? $this->fileUpload('images/', $request->file('image')) : $federation->image,
            'icon'  => $request->file('icon') ? $this->fileUpload('images/', $request->file('icon')) : $federation->icon,
            'latest_event' => $request->latest_event
        ]);
        $request->session()->flash('message', 'Federation movement updated successfully.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FederationMovement  $federationMovement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $federation = FederationMovement::find($id);
        FederaationSponsor::where('federation_id', $id)->delete();
        FederationEvent::where('federation_id', $id)->delete();
        FederationNews::where('federation_id', $id)->delete();
        Cassifiche::where('federation_id', $id)->delete();
        AlbodroCategory::where('federation_id', $id)->delete();

        $federation->delete();
        return back()->with([
            'message' => 'Federation Movement removed successfully.'
        ]);
    }

    protected function fileUpload($destination, $file)
    {
        $file_name = date('Y-m-d') . 'T' . time() . '.' . $file->getClientOriginalName();
        $file->move($destination, $file_name);

        return env('APP_URL') . $destination . $file_name;
    }
}
