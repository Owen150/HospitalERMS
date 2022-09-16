@extends('template.main')

@section('title', $title)

@section('content_title',"Pharamacy")
@section('content_description',"Issue Medicines here.")
@section('breadcrumbs')

<ol class="breadcrumb">
    <li><a href="{{route('dash')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
    <li class="active">Here</li>
</ol>
@endsection
@php
use App\Medicine;
use App\Prescription_Medicine;

@endphp
@section('main_content')
{{--  issue medicine  --}}




<div class="col-xs-12" id="issuemedicine3">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Prescription</h3>
        </div>
        <div class="box-body">
            <table class="table table-striped table-bordered table-active">
                <thead>
                    <tr>
                        
                        <th scope="col" colspan="3" style="text-align:center;font-size:18px">Medicine</th>
                        <th scope="col" style="text-align:center;vertical-align:middle;font-size:18px" rowspan="2">Note
                        </th>
                        <th scope="col" style="text-align:center;vertical-align:middle;font-size:18px" rowspan="2">Quantity
                        </th>
                        <th scope="col" style="text-align:center;vertical-align:middle;font-size:18px" rowspan="2">
                            Issued or Not</th>
                    </tr>
                
                    <tr>
                        <th>Medicine ID</th>
                        <th style="text-align:center;font-size:18px">English</th>
                        <th style="text-align:center;font-size:18px"></th>
                    </tr>
                </thead>
                <tbody id="bodyData">
                    @foreach ($pmedicines as $med)
                    <tr>
                        <td>
                            {{$med->medicine_id}}
                        </td>
                        <input type="hidden" value="{{ Medicine::find($med->medicine_id)->qty }}" name="amount" id="amt{{$med->id}}" />
                        <input type="hidden" value="{{ Medicine::find($med->medicine_id)->name_english }}" name="billing_for" id="name{{$med->id}}" />

                        <td style="text-align:center;font-size:15px;">
                            {{ ucwords(Medicine::find($med->medicine_id)->name_english) }}</td>
                        <td style="text-align:center;font-size:15px;">
                            {{ Medicine::find($med->medicine_id)->name_sinhala }}</td>
                        <td style="text-align:center;font-size:15px;">{{ $med->note }}</td>
                        <td style="text-align:center;font-size:15px;">
                            <label for="">Please Enter Quantity</label><br>
                            <input type="number" id="qty{{$med->id}}" class="qtyclass">
                        </td>
                        <td id="td-issue-{{$med->id}}" style="text-align:center;">
                            @if ($med->issued=="YES")
                            <span style="font-size:14px" class="badge bg-green"><i class="fas fa-check"></i> Issued
                            </span>
                            @else
                            <button style="font-size:18px;" id="btn-issue-{{$med->id}}"
                                onclick="issueMedicine('{{$med->id}}')" class='btn bg-navy btn-lg'>Issue</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

<div class="box box-info">
    <div class="box-header with-border">
    <div class="form-group">
        <h3>Number of Medicine Types Issued Now</h3>
        <input type="text" id="medCount" readonly class="col-sm-2 form-control" value="{{Prescription_Medicine::where('prescription_id',$presid)->select('medicine_id')->count('medicine_id')}}">
    </div>

    
</div>
</div>

            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <form action="{{route('medIssueSave')}}" method="get">
                        <input type="hidden" name="presid" id="presid" value="{{$presid}}">
                        <input type="hidden" value="{{ $appointment->id }}" id="appointment_id" name="appointment_id" />
                        @if ($prescription->medicine_issued=="YES")
                       
                        <input type="submit" id="btn-print" value="Print Receipt"
                        class="btn pull-right mt-5 mb-2 btn-lg btn-primary">
                        <p class="pull-left mt-5 pt-4">Note: This Prescription Is Already Marked As Issued</p>
                        
                        @else
                        <input type="submit" id="btn-print" value="Save & Print"
                        class="btn pull-right mt-5 mb-2 btn-lg btn-success">
                        @endif
                        
                    </form>
                </div>

            </div>
        </div>


    </div>
</div>


<div style="display: none;">
   
    <input type="hidden" value="{{ $appointment->id }}" id="appointment_id" name="appointment_id" />
    <input type="hidden" value="{{ $patient->id }}" id="patient_id" name="patient_id" />
    <input type="hidden" value="YES" name="completed" id="completed" />
    <input type="hidden" value="{{ $appointment->mode_of_payment }}" name="payment_method" id="payment_method" />
</div>

<script>
    function savePrint(presid){
        var appointment = document.getElementById("appointment_id").value;
        var data=new FormData;
       
        data.append('medid',presid);
        data.append('appointment_id', appointment);
        data.append('_token','{{csrf_token()}}');
        
        

        $.ajax({
                type: "post",
                url: "{{route('medIssueSave')}}",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                error: function(data){
                    console.log(data);
                },
                success: function (response) {
                  if(response.code==200){
                   $("#btn-print").attr("disabled", "disabled");

                  }
                }
        });
    }
    

    
    
    

    function issueMedicine(med_id){
        var ele = "qty" + med_id;
        var amt = "amt" + med_id;
        var name = "name" + med_id;
        var qty = document.getElementById(ele).value;
        var amount = document.getElementById(amt).value;
        var medname = document.getElementById(name).value;
        var appointment = document.getElementById("appointment_id").value;
        var completed = document.getElementById("completed").value;
        var paymentmethod = document.getElementById("payment_method").value;
        var patient_id = document.getElementById("patient_id").value;
        var data=new FormData;
        data.append('medid',med_id);
        data.append('_token','{{csrf_token()}}');
        data.append('qty', qty);
        data.append('amount', amount);
        data.append('billing_for', medname);
        data.append('completed', completed);
        data.append('paymentmethod', completed);
        data.append('patient_id', patient_id);
        data.append('appointment_id', appointment);


        $.ajax({
                type: "post",
                url: "{{route('markIssued')}}",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                error: function(data){
                    console.log(data);
                },
                success: function (response) {
                  if(response.code==200){
                      $("#td-issue-"+med_id).html('<span style="font-size:14px" class="badge bg-green"><i class="fas fa-check"></i> Issued </span>');
                      $(qty).hide();
                  }
                }
        });

        location.reload();
    }
</script>

@endsection