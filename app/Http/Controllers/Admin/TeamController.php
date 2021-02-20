<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{


    public function index()
    {
        return view('admin.team.main', [
            'members' => Admin::where('role', 2)->get()
        ]);
    }

    public function create()
    {

        return view('admin.team.create');
    }
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:8'
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            $check = Admin::create([
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'v_password' => $req->password,
            ]);
            if($check)
            {
                $req->session()->flash('message', $req->name.' Team Member add successfully.');
                return redirect()->route('team-members');
            }
        }
    }

    public function edit($id)
    {
        return view('admin.team.edit',[
            'member' => Admin::find($id),
        ]);
    }

    public function update(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            $check = Admin::where('email', '=', $req->email)
                            ->where('id', '!=', $id)
                            ->first();
            if($check)
            {
                $req->session()->flash('message', $req->email.' email already registered.');
                return redirect()->back();
            }
            else
            {
                $member = Admin::where('id', $id)->update([
                    'name' => $req->name,
                    'email' => $req->email,
                    'password' => Hash::make($req->password),
                    'v_password' => $req->password
                ]);
                $req->session()->flash('message', $req->name.' Member update successfully.');
                return redirect()->route('team-members');
            }

        }
    }

    public function destroy(Request $req, $id)
    {
        $member = Admin::find($id);
        $member->delete();
        $req->session()->flash('message', $member->name.' Member remove successfully.');
        return redirect()->route('team-members');
    }
}
