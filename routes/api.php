<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => ['cors']], function($route)
{
    $route->post('/caregiver/register', 'Api\ApiAuthController@Caregiverregister');

});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user()->details();
});


/* Registration and Login */


Route::post('/login', 'Api\ApiAuthController@login');

Route::post('/transporter/register', 'Api\ApiAuthController@Transporterregister');

Route::post('/securityprovider/register', 'Api\ApiAuthController@Securityproviderregister');

Route::post('/pharmacy/register', 'Api\ApiAuthController@Pharmacyregister');
Route::post('/password/email', 'Api\ForgotPasswordController@sendResetLinkEmail');
Route::post('/password/reset', 'Api\ResetPasswordController@reset');




Route::get('/email/resend', 'Api\VerificationController@resend')->name('verification.resend');
Route::get('/email/verify/{id}/{hash}', 'Api\VerificationController@verify')->name('verification.verify');

/* Caregiver Controller Routes*/


Route::post('caregivers', 'CaregiverProfileController@store')->middleware('role:caregiver');

Route::get('caregivers', 'CaregiverProfileController@index')->middleware('role:caregiver');
Route::get('caregivers/{id}', 'CaregiverProfileController@show')->middleware('role:caregiver');
Route::post('caregivers/{id}', 'CaregiverProfileController@update')->middleware('role:caregiver');
Route::delete('caregivers/{id}', 'CaregiverProfileController@destroy')->middleware('role:caregiver');

/*Transporter Controller Routes */


Route::post('transporters', 'TransporterProfileController@store');

Route::get('transporters', 'TransporterProfileController@index');
Route::get('transporters/{id}', 'TransporterProfileController@show');
Route::post('transporters/{id}', 'TransporterProfileController@update');
Route::delete('transporters/{id}', 'TransporterProfileController@destroy');

/*Training session Controller Routes */


Route::post('trainingsessions', 'TrainingsessionsController@store');

Route::get('trainingsessions', 'TrainingsessionsController@index');
Route::get('trainingsessions/{id}', 'TrainingsessionsController@show');
Route::post('trainingsessions/{id}', 'TrainingsessionsController@update');
Route::delete('trainingsessions/{id}', 'TrainingsessionsController@destroy');


