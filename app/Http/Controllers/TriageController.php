<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Triage;
use Illuminate\Http\Request;
use App\Patients;
use App\User;
use Illuminate\Support\Facades\DB;

class TriageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        
        return view('patient.triage.search');
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
        DB::transaction(function() use ($request) {
            $triage = new Triage();
        
            $triage->patient_id = $request->patient_id;
            $triage->weight = $request->weight;
            $triage->temp = $request->temp;
            $triage->blood_pressure = $request->blood_pressure;
            $triage->history = $request->history;
            
            
            $triage->save();

            $appointment = Appointment::find($request->app_id);
            
            $appointment->department = $request->department;
            $appointment->doctor_id = $request->docname;
            $appointment->update();
     
        });
        
        return redirect()->back();
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Triage  $triage
     * @return \Illuminate\Http\Response
     */
    public function show(Triage $triage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Triage  $triage
     * @return \Illuminate\Http\Response
     */
    public function edit(Triage $triage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Triage  $triage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Triage $triage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Triage  $triage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Triage $triage)
    {
        //
    }
    
    
    public function search(Request $request)
    {
        
        if ($request->cat == "name") {
        
            $result = Patients::withTrashed()->where('name', 'LIKE', '%' . $request->keyword . '%')->get();

            if($result == null) {
                return redirect()->back()->withError('Enter Valid Name');    
            }
            
            $triage = Triage::where('patient_id', '=', $result[0]->id)->get();
            $appointment = Appointment::where('patient_id', '=', $result[0]->id)->get()->last();

        
            
        }
        if ($request->cat == "nic") {
            $result = Patients::withTrashed()->where('nic', 'LIKE', '%' . $request->keyword . '%')->get();
            $triage = Triage::where('patient_id', '=', $result[0]->id)->get();
            $appointment = Appointment::where('patient_id', '=', $result[0]->id)->get()->last();

        }
        if ($request->cat == "telephone") {
            $result = Patients::withTrashed()->where('telephone', 'LIKE', '%' . $request->keyword . '%')->get();
            
            
            $triage = Triage::where('patient_id', '=', $result[0]->id)->get();

            $appointment = Appointment::where('patient_id', '=', $result[0]->id)->get()->last();
        }

        if ($request->cat == 'patient_id') {
            $result = Patients::withTrashed()->where('id', '=', $request->keyword)->get();
            
            if(count($result) == 0) {
                return redirect()->back()->withError('Enter Valid Patient Number');    
            }

            $triage = Triage::where('patient_id', '=', $result[0]->id)->get();

            $appointment = Appointment::where('patient_id', '=', $result[0]->id)->get()->last();

            
        }

        $docs = User::where('user_type', 'LIKE', '%' . 'doctor' . '%')->get();
        $docname = User::where('id', '=', $appointment->doctor_id)->first();
        return view('patient.triage.search-result', ["title" => "Search Results", "old_keyword" => $request->keyword, "search_result" => $result, 'triage' => $triage, 'docs'=>$docs, 'doctor'=>$docname, 'appointment'=>$appointment]);
    }
}