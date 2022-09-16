<?php

namespace App\Http\Controllers;

use App\Medicine;
use App\Patients;
use App\Prescription;
use App\Appointment;
use App\Billing;
//use Illuminate\Support\Facades\Storage;
use App\Prescription_Medicine;
//use App\Appointment;
//use File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

//use stdClass;
//use Carbon\Carbon;
//use Auth;

class MedicineController extends Controller
{
    //

    public function markIssued(Request $request){

        DB::transaction(function () use ($request) {

        
        try {
            $pres_med=Prescription_Medicine::find($request->medid);
            $pres_med->issued="YES";
            $pres_med->save();
            $med=Medicine::find($pres_med->medicine_id);
            $med->qty = $med->qty - $request->qty;
            $med->save();


            $billing = new Billing();
            $billing->patient_id = $request->patient_id;
            $billing->appointment_id = $request->appointment_id;
            $billing->billing_for = $request->billing_for;
            $billing->amount = $request->amount * $request->price;
            $billing->completed = 'YES';
            $billing->payment_method = $request->paymentmethod;
            $billing->save();

            return response()->json([
                "code"=>200,
                "prescription"=>$request->medid,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "code"=>400,
                "prescription"=>$request->medid,
            ]);
        }

        });
        
    }

    public function medIssueSave(Request $request){
        //dd($request);
        try {
            $presc=Prescription::find($request->presid);
            $presc->medicine_issued="YES";
            $presc->save();
            $medicines=Prescription_Medicine::where('prescription_id',$request->presid)->get();

            $appointment = Appointment::find($request->appointment_id);

            //dd($appointment);
            
            $appointment->department = 'cashier';
            //$appointment->doctor_id = $request->docname;
            $appointment->update();
            return view('medicine.receipt',compact('presc','medicines'));
        } catch (\Throwable $th) {
           return redirect()->back()->with('error',"Unkown Error Occured");
        }
        
    }

    public function searchSuggestion(Request $request)
    {
        $keyword = $request->keyword;
        return response()->json([
            "sugestion" => ["shakthi", "sachinta", "blov"],
        ], 200);
    }

    public function getherbs()
    {
        $herbs = DB::table('medicines')->get();
        // dd($herbs);
        return response()->json($herbs);
    }

    public function issueMedicine($presid){
        $pmedicines=Prescription_Medicine::where('prescription_id',$presid)->get();
        $title="Issue Medicine ($presid)";
        $prescription=Prescription::find($presid);

        $appointment = Appointment::where('id', '=', $prescription->appointment_id)->get()->last();

        $patient = Patients::where('id', '=', $prescription->patient_id)->first();

        //$medupdate = Medicine::where('id', '=', $pmedicines[0]->medicine_id)->first();

        
        //dd($appointment->id);
        return view('patient.show',compact('pmedicines','title','presid','prescription', 'appointment', 'patient'));
    }

    public function issueMedicineView()
    {
        $user = Auth::user();
        return view('patient.issueMedicineView',
        ['title' => "Issue Medicine"]);
    }

    public function issueMedicineValid(Request $request)
    {
        //dd($request);
        $num = $request->pNum;
        $numlength = strlen((string) $num);
        
         //if patient registration number have been given
            $app=Appointment::whereRaw('date(created_at)=CURDATE()')
                            ->where('patient_id',$num)
                            ->orderBy('created_at','DESC')
                            ->first();

            if ($app) {

                $rec=Prescription::where('appointment_id',$app->id)->first();

                return response()->json([
                    "exist" => true,
                    "name" => $rec->patient->name,
                    "appNum" => $app->number,
                    "pNUM" => $rec->patient_id,
                    "pres_id"=>$rec->id,
                ]);
            } else {
                return response()->json([
                    "exist" => false,
                ]);
            }
        

        
    }

  
}

