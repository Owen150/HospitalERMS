<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Billing;
use App\Patients;
use App\Theatre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TheatreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theatre.search');
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
        DB::transaction(function() use($request){
            $theatre = new Theatre();

            $theatre->findings = $request->findings;
            $theatre->recommendation = $request->recommendation;
            $theatre->patient_id = $request->patient_id;

            $theatre->save();

            $billing = new Billing();
            $billing->patient_id = $request->patient_id;
            $billing->appointment_id = $request->appointment_id;
            $billing->billing_for = $request->billing_for;
            $billing->amount = $request->amount;
            $billing->completed = $request->completed;
            $billing->payment_method = $request->payment_method;
            $billing->save();

        });

        return redirect()->route('searchtheatre');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Theatre  $theatre
     * @return \Illuminate\Http\Response
     */
    public function show(Theatre $theatre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Theatre  $theatre
     * @return \Illuminate\Http\Response
     */
    public function edit(Theatre $theatre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Theatre  $theatre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theatre $theatre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Theatre  $theatre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theatre $theatre)
    {
        //
    }

    public function search(Request $request)
    {
        
        if ($request->cat == "name") {
            $result = Patients::withTrashed()->where('name', 'LIKE', '%' . $request->keyword . '%')->get();

            
            $theatre = Theatre::where('patient_id', '=', $result[0]->id)->get();

            $appointment = Appointment::where('patient_id', '=', $result[0]->id)->get()->last();
        }
        if ($request->cat == "nic") {
            $result = Patients::withTrashed()->where('nic', 'LIKE', '%' . $request->keyword . '%')->get();
            $theatre = Theatre::where('patient_id', '=', $result[0]->id)->get();

            $appointment = Appointment::where('patient_id', '=', $result[0]->id)->get()->last();

        }
        if ($request->cat == "telephone") {
            $result = Patients::withTrashed()->where('telephone', 'LIKE', '%' . $request->keyword . '%')->get();
            
            
            $theatre = Theatre::where('patient_id', '=', $result[0]->id)->get();

            $appointment = Appointment::where('patient_id', '=', $result[0]->id)->get()->last();
        }
        return view('theatre.theatreview', ["title" => "Search Results", "search_result" => $result, 'theatre' => $theatre, 'appointment' => $appointment]);
    }
}
