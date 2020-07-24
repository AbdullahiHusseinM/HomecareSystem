<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all();

        return response()->json([
            'data' => $payments
        ], 200);

        dd($payments);
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
        $rules = [
            'date_paid' => 'required',
            'service_offered' => 'required',
            'amount_paid' => 'required',
            'payment_ref_number' => 'required',
            'client_name' => 'required',
            'client_ref_number' => 'required'
        ];

        

        $this->validate($request, $rules);


        $data = $request->all();
       

        $payment = Payment::create($data);

        return response()->json([
            'data' => $payment
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Payment::findOrFail($id);

        return response()->json([
            'data' => $payment
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        $updated = $payment->fill($request->all())
        ->save();
        if ($updated) {
            return response()->json([
                'message' => 'Payment Updated Successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, Payment could not be updated'
            ], 500);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);

        $payment -> delete();

        return response()->json([
            'message' => 'Payment deleted succssfully'
        ], 200);
    }
}
