<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Measure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //dd($request);
        DB::transaction(function () use ($request) {
            $measure = new Measure();
            $measure->patient_id = $request->patient_id;
            $measure->appointment_id = $request->app_id;
            $measure->measrure_1 = $request->whitebooldcells;
            $measure->measrure_2 = $request->redbooldcells;
            $measure->measrure_3 = $request->prothrombintime;
            $measure->measrure_4 = $request->activatedpartialthromboplastin;
            $measure->measrure_5 = $request->aspartateaminotransferase;
            $measure->measrure_6 = $request->alanineaminotransferase;
            $measure->measrure_7 = $request->mlactatedehydrogenase;
            $measure->measrure_8 = $request->bloodureanitrogen;
            $measure->measrure_9 = $request->WBCcountWdifferential;
            $measure->measrure_10 = $request->Quantitativeimmunoglobulin;
            $measure->measrure_11 = $request->Erythrocytesedimentationrate;
            $measure->measrure_12 = $request->alpha_antitrypsin;
            $measure->measrure_13 = $request->Reticcount;
            $measure->measrure_14 = $request->arterialbloodgasses;


            $measure->department = 'lab';
            
            $measure->save();


            $appointment = Appointment::find($request->app_id);
            $appointment->department = $request->sendto;

            $appointment->update();
        });

        return redirect()->route('create_channel_view');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Measure  $measure
     * @return \Illuminate\Http\Response
     */
    public function show(Measure $measure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Measure  $measure
     * @return \Illuminate\Http\Response
     */
    public function edit(Measure $measure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Measure  $measure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Measure $measure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Measure  $measure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Measure $measure)
    {
        //
    }
}
