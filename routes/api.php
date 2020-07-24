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


Route::post('caregivers', 'CaregiverProfileController@store')->name('store-caregiver-profile');

Route::get('caregivers', 'CaregiverProfileController@index')->name('list-caregiver-profile');
Route::get('caregivers/{id}', 'CaregiverProfileController@show')->name('show-caregiver-profile');
Route::post('caregivers/{id}', 'CaregiverProfileController@update')->name('update-caregiver-profile');
Route::delete('caregivers/{id}', 'CaregiverProfileController@destroy')->name('delete-caregiver-profile');

/*Transporter Controller Routes */


Route::post('transporters', 'TransporterProfileController@store')->name('store-transporter-profile');

Route::get('transporters', 'TransporterProfileController@index')->name('list-transporter-profile');
Route::get('transporters/{id}', 'TransporterProfileController@show')->name('show-transporter-profile');
Route::post('transporters/{id}', 'TransporterProfileController@update')->name('update-transporter-profile');
Route::delete('transporters/{id}', 'TransporterProfileController@destroy')->name('delete-transporter-profile');

/*Training session Controller Routes */


Route::post('trainingsessions', 'TrainingsessionsController@store');

Route::get('trainingsessions', 'TrainingsessionsController@index');
Route::get('trainingsessions/{id}', 'TrainingsessionsController@show');
Route::post('trainingsessions/{id}', 'TrainingsessionsController@update');
Route::delete('trainingsessions/{id}', 'TrainingsessionsController@destroy');



Route::post('invoices', 'InvoiceController@store');
Route::get('invoices', 'InvoiceController@index');
Route::get('invoices/{id}', 'InvoiceController@show');
Route::post('invoices/{id}', 'InvoiceController@update');
Route::delete('invoices/{id}', 'InvoiceController@destroy');


Route::post('servicecatalogs','ServicecatalogController@store');
Route::get('servicecatalogs', 'ServicecatalogController@index');
Route::get('servicecatalogs/{id}', 'ServiceCatalogController@show');
Route::post('servicecatalogs/{id}', 'ServicecatalogController@update');
Route::delete('servicecatalogs/{id}', 'ServicecatalogController@destroy');


Route::post('payments', 'PaymentController@store');
Route::get('payments', 'PaymentController@index');
Route::get('payments/{id}', 'PaymentController@show');
Route::post('payments/{id}', 'PaymentController@update');
Route::delete('payments/{id}', 'PaymentController@destroy');


Route::get('/v1/initialize', 'InitController@init');