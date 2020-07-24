<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Exports\InvoiceExport;
use App\Imports\InvoiceImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();

        return response()->json([
            'data' => $invoices
        ], 200);
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
            'name' => 'required',
            'date' => 'required',
            'service_offered' => 'required',
            'date_time_service_offered' => 'required',
            'client_name' => 'required',
            'status' => 'required',
            'amount' => 'required'
        ];

        $this -> validate($request, $rules);

        $data = $request -> all();

        $invoice = Invoice::create($data);

        return response()->json([
            'data' => $invoice
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        $invoice = Invoice::findOrFail($id);

        return response()->json([
            'data' => $invoice
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $invoice = Invoice::findOrFail($id);


        $updated = $payment->fill($request->all())
        ->save();
        if ($updated) {
            return response()->json([
                'message' => 'Invoice Updated Successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, Invoice could not be updated'
            ], 500);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);

        $invoice -> delete();

        return response()->json([
            'message' => 'Invoice deleted successfully'
        ], 200);
    
    }

    public function export()
    {
        return Excel::download(new InvoiceExport, 'invoice.xlsx');
    }
}
