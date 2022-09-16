<?php

namespace App\Http\Controllers;

use App\Account;
use App\Appointment;
use App\Billing;
use App\Lab;
use App\Measure;
use App\Patients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lab.search');
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
        //dd($request->activatedpartialthromboplastin);
        DB::transaction(function() use($request){
            $lab = new Lab();

            if ($request->whitebooldcells !== null) {
                $lab->whitebooldcells = $request->whitebooldcells;
            }
            
            if ($request->redbooldcells !== null) {
                $lab->redbooldcells = $request->redbooldcells;
            }

            if ($request->prothrombintime !== null) {
                $lab->prothrombintime = $request->prothrombintime;
                
            }

            if ($request->activatedpartialthromboplastin !== null) {
                $lab->activatedpartialthromboplastin = $request->activatedpartialthromboplastin;
            }

            if ($request->aspartateaminotransferase !== null) {
                $lab->aspartateaminotransferase = $request->aspartateaminotransferase;
            }

           if ($request->alanineaminotransferase !== null) {
            $lab->alanineaminotransferase = $request->alanineaminotransferase;
           }

           if($request->mlactatedehydrogenase !== null) {
            $lab->mlactatedehydrogenase = $request->mlactatedehydrogenase;
           }

           if ($request->bloodureanitrogen !== null) {
            $lab->bloodureanitrogen = $request->bloodureanitrogen;
           }

           if ($request->WBCcountWdifferential !== null) {
            $lab->WBCcountWdifferential = $request->WBCcountWdifferential;
           }

           if ($request->Quantitativeimmunoglobulin !== null) {
            $lab->Quantitativeimmunoglobulin = $request->Quantitativeimmunoglobulin;
           }

           if ($request->Erythrocytesedimentationrate !== null) {
            $lab->Erythrocytesedimentationrate = $request->Erythrocytesedimentationrate;
           }
            
           if ($request->alpha_antitrypsin !== null) {
            $lab->alpha_antitrypsin = $request->alpha_antitrypsin;
           }
            
           if ($request->Reticcount !== null) {
            $lab->Reticcount = $request->Reticcount;
           }

           if ($request->arterialbloodgasses !== null) {
            $lab->arterialbloodgasses = $request->arterialbloodgasses;
           }

           
            
            
            $lab->appointment_id = $request->appointment_id;
            $lab->patient_id = $request->patient_id;


            $lab->save();


            $billing = new Billing();
            $billing->patient_id = $request->patient_id;
            $billing->appointment_id = $request->appointment_id;
            $billing->billing_for = $request->billing_for;
            $billing->amount = $request->amount;
            $billing->completed = $request->completed;
            $billing->payment_method = $request->payment_method;
            $billing->save();

            $account = new Account();
            $account->patient_id = $request->patient_id;
            $account->appointment_id = $request->appointment_id;
            $account->description = $request->billing_for;
            $account->title = $request->billing_for;
            $account->amount = $request->amount;


            $appointment = Appointment::find($request->appointment_id);
            
            $appointment->department = 'consultation';

            //$appointment->doctor_id = $request->docname;
            $appointment->update();

        });
        

        return redirect()->route('searchLab');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function show(Lab $lab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function edit(Lab $lab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lab $lab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lab $lab)
    {
        //
    }

    public function search(Request $request)
    {
        
        if ($request->cat == "name") {
            $result = Patients::withTrashed()->where('name', 'LIKE', '%' . $request->keyword . '%')->get();
            $triage = Lab::where('patient_id', '=', $result[0]->id)->get();
            $appointment = Appointment::where('patient_id', '=', $result[0]->id)->get()->last();

            
        }
        if ($request->cat == "nic") {
            $result = Patients::withTrashed()->where('nic', 'LIKE', '%' . $request->keyword . '%')->get();
            $triage = Lab::where('patient_id', '=', $result[0]->id)->get();
            $appointment = Appointment::where('patient_id', '=', $result[0]->id)->get()->last();

            $measure = Measure::where('appointment_id', '=', $appointment->id)->where('patient_id','=',$result[0]->id)->get();

        }
        if ($request->cat == "telephone") {
            $result = Patients::withTrashed()->where('telephone', 'LIKE', '%' . $request->keyword . '%')->get();
            
            
            $triage = Lab::where('patient_id', '=', $result[0]->id)->get();

            $appointment = Appointment::where('patient_id', '=', $result[0]->id)->get()->last();

            $measure = Measure::where('appointment_id', '=', $appointment->id)->where('patient_id','=',$result[0]->id)->get();
        }

        if ($request->cat == 'patient_id') {
            $result = Patients::withTrashed()->where('id', '=', $request->keyword)->get();
            if(count($result) == 0) {
                return redirect()->back()->withError('Enter Valid Patient Number');    
            }
            
            $triage = Lab::where('patient_id', '=', $result[0]->id)->get();

            $appointment = Appointment::where('patient_id', '=', $result[0]->id)->get()->last();

            $measure = Measure::where('appointment_id', '=', $appointment->id)->where('patient_id','=',$result[0]->id)->get()->last();

            //dd($measure);
        }
        return view('lab.labview', ["title" => "Search Results", "search_result" => $result, 'triage' => $triage, 'appointment' => $appointment, 'measure' => $measure]);
    }
}
