<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\ClubDetail;
use App\Models\MainClub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $clubs = Club::with('clubs')->where('club_id', $req->id)->orderBy('id', 'DESC')->get();
        return view('pages.Club.index', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.Club.create');
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
            'club_name' => 'required',
            'club_image' => 'required|image|mimes:png,jpg',
            'country' => 'required',
            'description' => 'required',
            'location'  => 'required',
            'table_chara' => 'required',
            'sponsor.*' => 'required|image|mimes:png,jpg',
            'image' => 'required|image|mimes:png,jpg',
            'name'  => 'required',
        ]);
        $club = Club::create([
            'club_id'   => $request->id,
            'name'      => $request->club_name,
            'image'   => $this->fileUpload('images/', $request->file('club_image')),
            'country' => $request->country,
        ]);


        // save club detail
        ClubDetail::create([
            'club_id'        => $club->id,
            'sponsor_images' => $this->MultifileUpload('images/', $request->file('sponsor')),
            'image' => $this->fileUpload('images/', $request->file('image')),
            'name'  => $request->name,
            'description'   => $request->description,
            'location'      => $request->location,
            'table_chara'   => $request->table_chara,
        ]);

        $request->session()->flash('message', 'Club and its detail saved successfully.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Club $club)
    {
        return view('pages.Club.edit', [
            'club' => Club::where('id', $request->id)->first(),
            'detail' => ClubDetail::where('club_id', $request->id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Club $club)
    {
        $request->validate([
            'club_name' => 'required',
            'club_image' => 'nullable|image|mimes:png,jpg',
            'country' => 'required',
            'description' => 'required',
            'location'  => 'required',
            'table_chara' => 'required',
            'sponsor.*' => 'nullable|image|mimes:png,jpg',
            'image' => 'nullable|image|mimes:png,jpg',
            'name'  => 'required',
        ]);

        $club = Club::find($request->club_id);
        $club->update([
            'name' => $request->club_name,
            'image' => $request->file('club_image') ? $this->fileUpload('images/', $request->file('club_image')) : $club->image,
            'country' => $request->country
        ]);

        //update club detail
        $detail = ClubDetail::where('club_id', $club->id)->first();
        $sponsorImage = $detail->sponsor_images ?  $detail->sponsor_images : '';
        $Image = $detail->image ?  $detail->image : "";
        ClubDetail::updateOrCreate([
            'club_id' => $club->id
        ], [
            'club_id'        => $club->id,
            'sponsor_images' => $request->file('sponsor') ? $this->MultifileUpload('images/', $request->file('sponsor')) : $sponsorImage,
            'image' => $request->file('image') ? $this->fileUpload('images/', $request->file('image')) : $Image,
            'name'  => $request->name,
            'description'   => $request->description,
            'location'      => $request->location,
            'table_chara'   => $request->table_chara,
        ]);
        $request->session()->flash('message', 'Club data updated successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Club $club)
    {
        Club::where('id', $request->id)->delete();
        $request->session()->flash('message', 'Club data deleted successfully.');
        return back();
    }

    protected function fileUpload($destination, $file)
    {
        $file_name = date('Y-m-d') . 'T' . time() . '.' . $file->getClientOriginalExtension();
        $file->move($destination, $file_name);
        return env('APP_URL') . $destination . $file_name;
    }
    protected function MultifileUpload($destination, $files)
    {
        for ($i = 0; $i < count($files); $i++) {
            $file_name = date('Y-m-d') . 'T' . time() . '.' . $files[$i]->getClientOriginalExtension();
            $files[$i]->move($destination, $file_name);
            $file[] =  env('APP_URL') . $destination . $file_name;
        }
        return json_encode($file);
    }
}
