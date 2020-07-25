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
        $rules = [
        'caregiver_id' => 'required',
        'education' => 'required',
        'passport_photo' => 'required|mimes:jpeg,jpg,png,pdf',
        'experience' => 'required',
        'date_of_birth' => 'required',
        'license_number' => 'required',
        'license_certificate' => 'required|mimes:jpeg,jpg,png,pdf,doc,docx',
        'name_of_institution' => 'required',
        'acquired_qualification' => 'required',
        'qualification_start_date' => 'required',
        'qualification_end_date' => 'required',
        'copy_of_certificate' => 'required|mimes:jpeg,jpg,png,pdf,doc,docx',
        'name_of_organization' => 'required',
        'organization_unit' => 'required',
        'organization_job_title' => 'required',
        'organization_start_date' => 'required',
        'organization_end_date' => 'required',
        'radius_of_operation' => 'required'
        ];

        $this -> validate($request, $rules);

        $passport_photo = $request->file('passport_photo');

        $Pass = rand() . '.' . $passport_photo->getClientOriginalExtension();
        $passport_photo->move(public_path('images'), $Pass);

        $license_certificate = $request->file('license_certificate');

        $license_cert = rand() . '.' . $license_certificate->getClientOriginalExtension();
        $license_certificate->move(public_path('images'), $license_cert);


        $copy_of_certificate = $request->file('copy_of_certificate');

        $cert_copy = rand() . '.' . $copy_of_certificate->getClientOriginalExtension();
        $copy_of_certificate->move(public_path('images'), $cert_copy);


       

        $data = $request->all();

 
        $caregiverprofiles = CaregiverProfile::create($data);
        
        

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
