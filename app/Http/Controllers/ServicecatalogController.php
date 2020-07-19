<?php

namespace App\Http\Controllers;

use App\Servicecatalog;
use Illuminate\Http\Request;

class ServicecatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicecatalogs = ServiceCatalog::all();

        return response()->json([
            'data' => $servicecatalogs
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'service_name' => 'required',
            'service_description' => 'required',
            'specific_service_name' => 'required',
            'specific_service_description'  => 'required',
            'pharmaceutical_product_name'  => 'required',
            'pharmaceutical_product_use'  => 'required',
            'pharmaceutical_product_priority'  => 'required',
            'equipment_name'  => 'required',
            'equipment_use'  => 'required',
            'equipment_priority'  => 'required',
        ];

        $this -> validate($request, $rules);

        $data = $request->all();


        $servicecatalog  = ServiceCatalog::create($data);

        return response()->json([
            'data' => $servicecatalog
        ], 201);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servicecatalog  $servicecatalog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicecatalog = ServiceCatalog::findorFail($id);

        return response()->json([
            'data' => $servicecatalog
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servicecatalog  $servicecatalog
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicecatalog $servicecatalog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servicecatalog  $servicecatalog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicecatalog $servicecatalog)
    {
        $servicecatalog = ServiceCatalog::findorFail($id);

        $updated = $servicecatalog->fill($request->all())
        ->save();
        if ($updated) {
            return response()->json([
                'message' => 'Service Catalog Updated Successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, Service catalog could not be updated'
            ], 500);
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servicecatalog  $servicecatalog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicecatalog $servicecatalog)
    {
        $servicecatalog = ServiceCatalog::findOrFail($id);

        $servicecatalog->delete();

        return response([
            "message" => "Service catalog Deleted Successfully"
        ]);
    }
}
