<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Caregiver;
use App\CaregiverProfile;
use Illuminate\Http\Request;

class CaregiverProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caregiverprofiles = CaregiverProfile::all();

        return $caregiverprofiles;
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
    public function store(Request $request, Caregiver $caregiver)
    {
        $caregiverprofiles = new CaregiverProfile;

        $caregiverprofiles-> caregiver_id = $request->get('caregiver_id');
        $caregiverprofiles-> passport_photo = $request->file('passport_photo');
        $caregiverprofiles-> education = $request->get('education');
        $caregiverprofiles-> experience = $request->get('experience');
        $caregiverprofiles-> license_number = $request->get('license_number');
        $caregiverprofiles-> license_certificate = $request->file('license_certificate');
        $caregiverprofiles-> date_of_birth = $request->get('date_of_birth');
        
        

        $caregiverprofiles-> save();

        return response([
            "message" => "Profile Successfully Saved"
        ], 201);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CaregiverProfile  $caregiverProfile
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {

        $caregiverprofiles = CaregiverProfile::find($id);

        $caregiverprofiles = DB::table('caregiver_profiles')
            ->join('caregivers', 'caregivers.id', '=', 'caregiver_profiles.caregiver_id')
            ->get();

        return $caregiverprofiles;
        return response([
            "message" => "Profile retrieved successfully"
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CaregiverProfile  $caregiverProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $caregiverprofiles = CaregiverProfile::findOrFail($id);

        $updated = $caregiverprofiles->fill($request->all())
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CaregiverProfile  $caregiverProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CaregiverProfile $caregiverProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
    * @param  \App\CaregiverProfile  $caregiverProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $caregiverprofiles = CaregiverProfile::findOrFail($id);

        $caregiverprofiles->delete();

        return response([
            "message" => "Profile Deleted Successfully"
        ]);
    }
}
