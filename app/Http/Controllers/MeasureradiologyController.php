<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Measureradiology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MeasureradiologyController extends Controller
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
        DB::transaction(function () use ($request) {
            $measure = new Measureradiology();
            $measure->patient_id = $request->patient_id;
            $measure->appointment_id = $request->app_id;
            $measure->measrure_1 = $request->ct_scan;
            $measure->measrure_2 = $request->x_ray;
            $measure->measrure_3 = $request->ultra_sound;
            $measure->measrure_4 = $request->mri;
            $measure->measrure_5 = $request->pet_scan;
            


            $measure->department = 'radiology and imaging';
            
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
     * @param  \App\Measureradiology  $measureradiology
     * @return \Illuminate\Http\Response
     */
    public function show(Measureradiology $measureradiology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Measureradiology  $measureradiology
     * @return \Illuminate\Http\Response
     */
    public function edit(Measureradiology $measureradiology)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Measureradiology  $measureradiology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Measureradiology $measureradiology)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Measureradiology  $measureradiology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Measureradiology $measureradiology)
    {
        //
    }
}
