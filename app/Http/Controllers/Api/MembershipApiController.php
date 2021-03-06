<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\MembershipMail;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MembershipApiController extends Controller
{
    public function member(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required|unique:memberships,email',
            'resident' => 'required',
            'street'   => 'required',
            'postal_code' => 'required',
            'fiscal_code' => 'required',
            'club_of_belonging' => 'required',
            'gender'      => 'required',
            'dob'         => 'required',
            'tel_number'  => 'required',
            'total_payment' => 'required',
        ]);
        if($validator->fails())
        {
            $data = [
                'response' => false,
                'errors'   => $validator->errors()->all(),
            ];
            return response()->json($data);
        }
        else
        {
            $data = new Membership();
            $data->name = $req->name;
            $data->email = $req->email;
            $data->resident = $req->resident;
            $data->street = $req->street;
            $data->postal_code = $req->postal_code;
            $data->fiscal_code = $req->fiscal_code;
            $data->club_of_belonging = $req->club_of_belonging;
            $data->gender = $req->gender;
            $data->dob = $req->dob;
            $data->tel_number = $req->tel_number;
            $data->men = $req->men;
            $data->women = $req->women;
            $data->special = $req->special;
            $data->veterans = $req->veterans;
            $data->mental_health_center = $req->mental_health_center;
            $data->agree = $req->agree;
            $data->total_payment = $req->total_payment;
            $data->save();
            Mail::to($req->email)->send(new MembershipMail($data));
            $data = [
                'response' => true,
                'message'   => 'Data save successfully.',
            ];
            return response()->json($data);
        }
    }
}
