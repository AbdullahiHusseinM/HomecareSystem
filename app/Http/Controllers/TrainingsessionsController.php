<?php

namespace App\Http\Controllers;
use App\Trainingsessions;
use Illuminate\Http\Request;

class TrainingsessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainingsessions = Trainingsessions::all();

        return $trainingsessions;
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
        $trainingsessions = new Trainingsessions;

        $trainingsessions -> name = $request->get('name');
        $trainingsessions -> date_to = $request->get('date_to');
        $trainingsessions -> date_from = $request->get('date_from');
        $trainingsessions -> time_from = $request->get('time_to');
        $trainingsessions -> time_to = $request->get('time_to');
        $trainingsessions -> venue = $request->get('venue');
        $trainingsessions -> training_facilitator = $request->get('training_facilitator');


        $trainingsessions -> save();

        return response([
            "message" => 'Session Succcessfully saved'
        ], 200);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trainingsessions  $trainingsessions
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trainingsession = Trainingsessions::find($id);

        return $trainingsession;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trainingsessions  $trainingsessions
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainingsessions $trainingsessions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trainingsessions  $trainingsessions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $trainingsessions = Trainingsessions::findOrFail($id);

        $updated = $trainingsessions->fill($request->all())
        ->save();
        if ($updated) {
            return response()->json([
                'message' => 'session Updated Successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, session could not be updated'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trainingsessions  $trainingsessions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trainingsessions = Trainingsessions::findOrFail($id);

        $trainingsessions->delete();

        return response([
            "message" => "Session Deleted Successfully"
        ]);
    }
    }
