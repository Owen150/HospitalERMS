<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Billing;
use App\Cashier;
use App\Patients;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cashier.search');

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cashier  $cashier
     * @return \Illuminate\Http\Response
     */
    public function show(Cashier $cashier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cashier  $cashier
     * @return \Illuminate\Http\Response
     */
    public function edit(Cashier $cashier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cashier  $cashier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cashier $cashier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cashier  $cashier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cashier $cashier)
    {
        
    }

    public function search(Request $request)
    {
        //dd($request);
        
        $result = Patients::withTrashed()->where('id', '=', $request->keyword)->get();

        if(count($result) == 0) {
            return redirect()->back()->withError('Enter Valid Patient Number');    
        }
        

        if ($result == null) {
            return redirect()->back();
        }
            //$triage = Lab::where('patient_id', '=', $result[0]->id)->get();
        $appointment = Appointment::where('patient_id', '=', $result[0]->id)->get()->last();

        $billing = Billing::where('appointment_id', '=', $appointment->id)->get();
            
        //dd($billing);
        
        return view('cashier.pos', ["title" => "Search Results", "search_result" => $result, 'billing' => $billing, 'appointment' => $appointment]);
    }


    public function print(Request $request)
    {
        $result = Patients::withTrashed()->where('id', '=', $request->keyword)->get();

        if ($result == null) {
            return redirect()->back();
        }
            //$triage = Lab::where('patient_id', '=', $result[0]->id)->get();
        $appointment = Appointment::where('patient_id', '=', $result[0]->id)->get()->last();

        $billing = Billing::where('appointment_id', '=', $appointment->id)->get();
        
        $appointments = Appointment::find($appointment->id);

            //dd($appointment);
            
        $appointments->department = 'done';
            //$appointment->doctor_id = $request->docname;
        $appointments->update();
       
        return view('cashier.printview', ["title" => "Search Results", "search_result" => $result, 'billing' => $billing, 'appointment' => $appointment]);
        //return view('cashier.printview', ["title" => "Search Results", "search_result" => $result, 'billing' => $billing, 'appointment' => $appointment]);
    }
}
