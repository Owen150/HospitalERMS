@extends('template.main')

@section('title', $title)

@section('content_title',__('Check Patient'))
@section('content_description',__('Check Patient here and update history from here !'))
@section('breadcrumbs')

<ol class="breadcrumb">
    <li><a href="{{route('dash')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
    <li class="active">Here</li>
</ol>
@endsection
@section('main_content')


<script>
    $(document).ready(function () {
  $("#appNum").focus();
});

function validateNum(appNum){
    
    $("#validation").text("");

    var data=new FormData;
    data.append('number',appNum);
    data.append('_token','{{csrf_token()}}');
    

    $.ajax({
    type: "POST",
    url: "{{route('validateAppNum')}}",
    processData: false,
    contentType: false,
    cache: false,
    data:data,
    error: function(data){
        console.log(data);
    },
    success: function (appointment) {
        if(appointment.exist){
            console.log(appointment);
            $("#btn_submit").removeAttr("disabled");
            $("#btn_submit").focus();
            $("#details").fadeIn();
            $("#p_name").text(appointment.name);
            $("#pnum").val(appointment.pNum);
            $("#finger").text(appointment.finger);
            $("#appt_num").text(appointment.appNum);
            $("#appt_num_1").val(appointment.appNum);
            $("#appNum").focus();
        }else{
            $("#details").fadeOut();
            $("#btn-submit").attr("disabled","disabled");
            $("#validation").text("Invalid Patient Number. Check Again...");
            $("#appNum").focus();
        }
    }
});
}

</script>

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="card mt-3">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-6 d-flex align-items-center mt-3">
                      <h5 class="box-title">{{__('Check Patient')}} <p class="" style="font-weight: bold; font-size: 14px; color: rgb(12, 71, 148);">(Check queue for patient number)</p></h5>
                    </div>
                    <div class="col-6 text-end">
                      <img src="./images/WKMHLogo.png" style="width: 20%;">
                </div>
            </div>
            <div class="card-body p-3">
                <form class="pl-5 pr-5 pb-5" method="post" action="{{route('checkPatient')}}">
                    @csrf
                    
                    <h3>{{__('Enter Patient Number To Begin')}}</h3>
                    <input id="appNum" class="form-control input-lg" type="number" oninput="validateNum(this.value)"
                        placeholder="Patient Number">

                    <input disabled id="btn_submit" type="submit" class="btn btn bg-gradient-dark btn-lg mt-3 text-center"
                        value={{__("Check Patient")}}>

                    <input name="pid" type="hidden" id="pnum">
                    <input name="appNum" type="hidden" id="appt_num_1">

                    <p id="validation" class="mt-2 text-danger"></p>

                    <div style="display:none" id="details">
                        <h4>Patient Name : <span id="p_name"></span></h4>
                        
                    </div>

                </form>
            </div>
        </div>
        @if (session()->has('fail'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Already Attended To</h4>

            {{session()->get('fail')}}
        </div>
        @endif
    </div>
    <div class="col-md-1"></div>

</div>

@endsection