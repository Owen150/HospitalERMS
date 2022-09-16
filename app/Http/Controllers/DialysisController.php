<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Billing;
use App\Dialysis;
use App\Patients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DialysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dialysis.search');
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
            $dialysis = new Dialysis();

            $dialysis->findings = $request->findings;
            $dialysis->recommendation = $request->recommendation;
            $dialysis->patient_id = $request->patient_id;
    
            $dialysis->save();

            $billing = new Billing();
            $billing->patient_id = $request->patient_id;
            $billing->appointment_id = $request->appointment_id;
            $billing->billing_for = $request->billing_for;
            $billing->amount = $request->amount;
            $billing->completed = $request->completed;
            $billing->payment_method = $request->payment_method;
            $billing->save();


        });
        

        return redirect()->route('searchDialysis');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dialysis  $dialysis
     * @return \Illuminate\Http\Response
     */
    public function show(Dialysis $dialysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dialysis  $dialysis
     * @return \Illuminate\Http\Response
     */
    public function edit(Dialysis $dialysis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dialysis  $dialysis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dialysis $dialysis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dialysis  $dialysis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dialysis $dialysis)
    {
        //
    }

    public function search(Request $request)
    {
        
        if ($request->cat == "name") {
            $result = Patients::withTrashed()->where('name', 'LIKE', '%' . $request->keyword . '%')->get();
            $dialysis = Dialysis::where('patient_id', '=', $result[0]->id)->get();
            $appointment = Appointment::where('patient_id', '=', $result[0]->id)->get()->last();
        }
        if ($request->cat == "nic") {
            $result = Patients::withTrashed()->where('nic', 'LIKE', '%' . $request->keyword . '%')->get();
            $dialysis = Dialysis::where('patient_id', '=', $result[0]->id)->get();
            $appointment = Appointment::where('patient_id', '=', $result[0]->id)->get()->last();

        }
        if ($request->cat == "telephone") {
            $result = Patients::withTrashed()->where('telephone', 'LIKE', '%' . $request->keyword . '%')->get();
            
            
            $dialysis = Dialysis::where('patient_id', '=', $result[0]->id)->get();
            $appointment = Appointment::where('patient_id', '=', $result[0]->id)->get()->last();
        }

        if ($request->cat == 'patient_id') {
            $result = Patients::withTrashed()->where('id', '=', $request->keyword)->get();

            $dialysis = Dialysis::where('patient_id', '=', $result[0]->id)->get();

            $appointment = Appointment::where('patient_id', '=', $result[0]->id)->get()->last();
        }
        return view('dialysis.dislysisview', ["title" => "Search Results", "search_result" => $result, 'dialysis' => $dialysis, 'appointment' => $appointment]);
    }
}
