<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Transporter;
use App\TransporterProfile;
use Illuminate\Http\Request;

class TransporterProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transporterprofiles = TransporterProfile::all();

        return $transporterprofiles;
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
        $transporterprofiles = new TransporterProfile;

        $transporterprofiles-> transporter_id = $request->get('transporter_id');
        $transporterprofiles-> drivers_license = $request->get('drivers_license');
        $transporterprofiles-> identification_card = $request->get('identification_card');
        $transporterprofiles-> phone_number = $request->get('phone_number');
        $transporterprofiles-> mode_of_transport = $request->get('mode_of_transport');
        $transporterprofiles-> passport_photo = $request->get('passport_photo');
        $transporterprofiles-> date_of_birth = $request->get('date_of_birth');
        $transporterprofiles-> model_mode_of_transport = $request->get('model_mode_of_transport');
        $transporterprofiles-> years_of_experience = $request->get('years_of_experience');


        $transporterprofiles -> save();

        return response([
            "message" => "Profile Successfully Saved"
        ], 201);
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransporterProfile  $transporterProfile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transporterprofiles = TransporterProfile::find($id);

        $transporterprofiles = DB::table('transporter_profiles')
            ->join('transporters', 'transporters.id', '=', 'transporter_profiles.transporter_id')
            ->get();

        return $transporterprofiles;
        return response([
            "message" => "Profile retrieved successfully"
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransporterProfile  $transporterProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(TransporterProfile $transporterProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransporterProfile  $transporterProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transporterprofiles = TransporterProfile::findOrFail($id);

        $updated = $transporterprofiles->fill($request->all())
        ->save();
        if ($updated) {
            return response()->json([
                'message' => 'Profile Updated Successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product could not be updated'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransporterProfile  $transporterProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transporterprofiles = TransporterProfile::findOrFail($id);

        $transporterprofiles->delete();

        return response([
            "message" => "Profile Deleted Successfully"
        ]);
    }
}
