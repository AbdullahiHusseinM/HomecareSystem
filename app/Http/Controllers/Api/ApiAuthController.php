<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\User;
use App\Caregiver;
use App\Securityprovider;
use App\Transporter;
use Illuminate\Http\Request;

class ApiAuthController extends Controller
{

    public function login(Request $request)

    {
        $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!auth()->attempt($loginData))
        {

            
            abort(401, 'Invalid Credentials');
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user'=> auth()->user(), 'accessToken'=>$accessToken]);
    }


    public function Caregiverregister(Request $request)
    {

        
        
        $validatedData = $request->validate([
            'first_name' => 'required|max:55',
            'last_name' => 'required|max:55',
            'surname' => 'required|max:55',
            'gender' => 'required',
            'identification_number' => 'required|max:10',
            'phone_number' => 'required|max:10',
            'job_title' => 'required',
            'physical_location' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
            
        ]);

        $caregiver = Caregiver::create($request->all());
    
        $user = $caregiver->user()->create([
            'role' => 'caregiver',
            'email' => $validatedData['email'],
            'password' => bcrypt($request->password)
        ]);

      

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['caregiver'=> $caregiver, 'accessToken'=>$accessToken]);
    }


   

public function Transporterregister(Request $request)
{
    $validatedData = $request->validate([
        'first_name' => 'required|max:20',
        'surname' => 'required|max:20',
        'last_name' => 'required|max:20',
        'identification_number'=> 'required|max:10',
        'location' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required'
    ]);

    $transporter = Transporter::create($request->all());

    $user = $transporter->user()->create([
        'role' => 'transporter',
        'email' => $validatedData['email'],
        'password' => bcrypt($request->password)
    ]);


    $accessToken = $user->createToken('authToken')->accessToken;

    return response(['transporter'=> $transporter, 'accessToken'=>$accessToken]);
}

    public function Securityproviderregister(Request $request)
    {
    $validatedData = $request->validate([
        'name' => 'required|max:20',
        'registration_number' => 'required|max:20',
        'contact_first_name' => 'required|max:20',
        'contact_last_name' => 'required|max:20',
        'contact_phone_number' => 'required|max:20',
        'location' => 'required',
        'email' => 'required|email|unique:securityproviders',
        'password' => 'required'
    ]);

    $securityprovider = Securityprovider::create($request->all());

    $user = $securityprovider->user()->create([
        'role' => 'securityprovider',
        'email' => $validatedData['email'],
        'password' => bcrypt($request->password)
    ]);


    $accessToken = $user->createToken('authToken')->accessToken;

    return response(['securityprovider'=> $securityprovider, 'accessToken'=>$accessToken]);
    }

    }