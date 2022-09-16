<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Billing;
use App\Patients;
use App\physiotherapy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhysiotherapyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('physiotherapy.search');
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
            $physiotherapy = new physiotherapy();

            $physiotherapy->findings = $request->findings;
            $physiotherapy->recommendation = $request->recommendation;
            $physiotherapy->patient_id = $request->patient_id;
    
            $physiotherapy->save();

            $billing = new Billing();
            $billing->patient_id = $request->patient_id;
            $billing->appointment_id = $request->appointment_id;
            $billing->billing_for = $request->billing_for;
            $billing->amount = $request->amount;
            $billing->completed = $request->completed;
            $billing->payment_method = $request->payment_method;
            $billing->save();


        });
        

        return redirect()->route('searchphysiotherapy');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\physiotherapy  $physiotherapy
     * @return \Illuminate\Http\Response
     */
    public function show(physiotherapy $physiotherapy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\physiotherapy  $physiotherapy
     * @return \Illuminate\Http\Response
     */
    public function edit(physiotherapy $physiotherapy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\physiotherapy  $physiotherapy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, physiotherapy $physiotherapy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\physiotherapy  $physiotherapy
     * @return \Illuminate\Http\Response
     */
    public function destroy(physiotherapy $physiotherapy)
    {
        //
    }

    public function search(Request $request)
    {
        
        if ($request->cat == "name") {
            $result = Patients::withTrashed()->where('name', 'LIKE', '%' . $request->keyword . '%')->get();

            
            $physiotherapy = physiotherapy::where('patient_id', '=', $result[0]->id)->get();

            $appointment = Appointment::where('patient_id', '=', $result[0]->id)->get()->last();
        }
        if ($request->cat == "nic") {
            $result = Patients::withTrashed()->where('nic', 'LIKE', '%' . $request->keyword . '%')->get();
            $physiotherapy =physiotherapy::where('patient_id', '=', $result[0]->id)->get();

            $appointment = Appointment::where('patient_id', '=', $result[0]->id)->get()->last();

        }
        if ($request->cat == "telephone") {
            $result = Patients::withTrashed()->where('telephone', 'LIKE', '%' . $request->keyword . '%')->get();
            
            
            $physiotherapy = physiotherapy::where('patient_id', '=', $result[0]->id)->get();

            $appointment = Appointment::where('patient_id', '=', $result[0]->id)->get()->last();
        }
        return view('physiotherapy.physiotherapyview', ["title" => "Search Results", "search_result" => $result, 'physiotherapy' => $physiotherapy, 'appointment' => $appointment]);
    }
}
