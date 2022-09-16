@extends('template.main')

@section('title', $title)

@section('content_title',__('Discharge Patient'))
@section('content_description',__('Discharge In-Patients Here.'))
@section('breadcrumbs')

<ol class="breadcrumb">
    <li><a href="{{route('dash')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
    <li class="active">Here</li>
</ol>
@endsection

@section('main_content')
{{--  discharge patient  --}}

<div @if (session()->has('regpsuccess') || session()->has('regpfail')) style="margin-bottom:0;margin-top:3vh" @else
    style="margin-bottom:0;margin-top:8vh" @endif class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        @if (session()->has('regpsuccess'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            {{session()->get('regpsuccess')}}
        </div>
        @endif
        @if (session()->has('regpfail'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Error!</h4>
            {{session()->get('regpfail')}}
        </div>
        @endif

    </div>
    <div class="col-md-1"></div>

</div>







<div class="box box-info" id="disinpatient2" style="display:none">

    <div class="box-header with-border">
        <h3 class="box-title">{{__('Medical Officer - Abstract of Case')}}</h3>
    </div>

    <form method="post" action="{{ route('save_disinpatient') }}" class="form-horizontal">
        {{csrf_field()}}
        <div class="box-body">

            <div class="form-group">
                <label for="patient_id" class="col-sm-2 control-label">{{__('Registration No')}}</label>
                <div class="col-sm-2">
                    <input type="text" required readonly class="form-control" name="reg_pid" id="patient_id">
                </div>
            </div>

            <div class="form-group">
                <label for="patient_name" class="col-sm-2 control-label">{{__('Name')}}</label>
                <div class="col-sm-10">
                    <input type="text" required readonly class="form-control" name="reg_pname" id="patient_name"
                        placeholder="Enter Patient Full Name">
                </div>
            </div>

            <div class="form-group">
                <label for="patient_address" class="col-sm-2 control-label">{{__('Address')}}</label>
                <div class="col-sm-10">
                    <input type="text" required readonly class="form-control" name="reg_paddress" id="patient_address"
                        placeholder="Enter Patient Address ">
                </div>
            </div>

            <div class="form-group">
                <label for="patient_telephone" class="col-sm-2 control-label">{{__('Telephone')}}</label>
                <div class="col-sm-10">
                    <input type="tel" readonly class="form-control" name="reg_ptel" id="patient_telephone"
                        placeholder="Patient Telephone Number">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">{{__('Description:')}}</label>
                <div class="col-sm-10">
                    <textarea required class="form-control" name="reg_medicalofficer1" rows="3" cols="100"
                        placeholder="Enter abstract condition of patient here"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">{{__('Discharge Status')}}<span style="color:red">*</span></label>
                <div class="col-sm-2">
                    <select required class="form-control" name="discharge_status" id="dichargeStatus">
                        <option  value="to_attend_clinic">To Attend Clinic</option>
                        <option value="referral">Referral</option>
                        <option value="diseased">Diseased</option>
                        <option selected value="to_go_home">To Go Home</option>
                        
                    </select>
                </div>
            </div>

            <div class="form-group" id="referred_to">
                <label for="patient_name" class="col-sm-2 control-label">{{__('Referred To')}}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="referred_to" id="referred_to"
                        placeholder="Enter Where Patient Is Referred To">
                </div>
            </div>

            <div class="form-group" id="diseasedTime">
                <label for="patient_name" class="col-sm-2 control-label">{{__('Date and Time')}}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="datatime_diseased" id="datatime_diseased"
                        placeholder="Enter Date and Time of Diseased Patient">
                </div>
            </div>

            <div class="form-group" id="toattendClinic">
                <label for="patient_name" class="col-sm-2 control-label">{{__('Date and Time')}}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="datatime_toattend" id="datatime_toattend"
                        placeholder="Enter Date To Attend Clinic">
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-2 control-label">{{__('Dischage Date')}}<span style="color:red">*</span></label>
                <div class="col-sm-10">
                    <input type="datetime-local" required  class="form-control pull-right"
                            name="discharged_date" placeholder="Dischage Date">
                </div>
            </div>
            
        



            <div class="form-group">
                <label for="medofs2" class="col-sm-2 control-label">{{__('Certified by')}}</label>
                <div class="col-sm-10" id="al-box">
                    <input type="text" readonly value="{{Auth::user()->id}} ({{ucWords(Auth::user()->name)}})" required class="form-control" id="medofs2" name="reg_medicalofficer2"
                        placeholder="Select Your ID here" />
                </div>
            </div>

            <input type="hidden" name="app_id" id="appointment_id">

            <div class="box-footer">
                <input type="submit" class="btn pull-right mt-5 mb-2 btn-lg btn-success" value="Submit & Print">
                <input type="reset" class="btn pull-left mt-5 mb-2 btn-lg btn-info" value="Cancel">
            </div>

        </div>

    </form>
</div>

<div class="row mt-5 pt-5">
    <div class="col-md-1"></div>
    <div class="col-md-10">
<div class="box box-info" id="disinpatient1">
    <div class="box-header with-border">
        <h3 class="box-title">{{__('Enter Registration No')}}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="form-group">
            <label for="pid" class="control-label" style="font-size:18px">{{__('Registration No:')}}</label>
            <input type="number" required class="form-control" onchange="dischargeinpatientfunction()" id="pid"
                    placeholder="Enter Registration No" />
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-info" onclick="dischargeinpatientfunction()">{{__('Enter')}}</button>
        </div>
    </div>
</div>
 </div>
    <!-- /.box-footer -->
</div>
    </div>
</div>



<script>

    $('#referred_to').hide();
    $('#diseasedTime').hide();
    $('#toattendClinic').hide();

    $('#dichargeStatus').change(function(){

        if ($(this).val() == "referral") {
            $('#referred_to').show(800);
        }

        if ($(this).val() == "diseased") {
            $('#diseasedTime').show(800);
        }

        if ($(this).val() == "to_attend_clinic") {
            $('#toattendClinic').show(800);
        }
        
    });

    function dischargeinpatientfunction() {
        
        var x, text;
        x = document.getElementById("pid").value;
        patientid=x;
        if (x > 0)
        {
            var data=new FormData;
            data.append('pNum',x);
            data.append('_token','{{csrf_token()}}');


            $.ajax({
                type: "post",
                url: "{{route('disInPatient')}}",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                error: function(data){
                    console.log(data);
                },
                success: function (dp) {
                    if(dp.exist){
                        console.log(dp.name);
                        $("#patient_name").val(dp.name);
                        $("#patient_telephone").val(dp.telephone);
                        $("#patient_address").val(dp.address);
                        $("#patient_id").val(dp.id);
                        $('#appointment_id').val(dp.app_id);

                        $("#disinpatient2").slideDown(1000);
                        $("#disinpatient1").slideUp(1000);
                        console.log('whyyyyy');
                    }else{
                        console.log('not found');
                        alert("Please Enter a Valid In Patient Registration Number!");
                    }
                }
            });
            }else{
                alert("Please Enter a Valid Registration Number!");
            }    
    }

</script>

@endsection