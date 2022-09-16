@extends('template.main')

@section('title', 'Triage Search')

@section('content_title',__("Search Patient"))
@section('content_description')
@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="#"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
    <li class="active">Here</li>
</ol>

@endsection

@section('main_content')

<style>
    .callout {
        height: 40vh;
    }

    #keyword {
        margin-top: 50px;
        height: 50px;
        font-size: 20px; 
    }

    .btn-default {
        margin-top: 50px;
        height: 50px;
    }

    label {
        font-size: 18px; 
    }
</style>

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <form action={{route('searchLabPost')}} method="GET" role="search">
            @csrf

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if (session('unsuccess'))
            <div class="alert alert-danger">
                {{ session('unsuccess') }}
            </div>
            @endif

            <div class="col-md-12 mb-lg-0 mb-4">
                <div class="card mt-3">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center mt-3">
                              <h5 class="box-title">{{__('Lab')}} <p class="" style="font-weight: bold; font-size: 14px; color: rgb(12, 71, 148);">(Check queue for patient number)</p></h5>
                            </div>
                            <div class="col-6 text-end">
                              <img src="./images/WKMHLogo.png" style="width: 20%;">
                        </div>
                    </div>
                    
                    <div class="card-body p-3">
                        <div class="pl-5 pr-5 pb-5">
                            <h4>{{__('Enter Patient Number To Begin Lab Test')}}</h4>
                            <label class="mr-2" style="display: none">
                                        <input onchange="changeFunc('Patient Number');" style="display:inline-block" checked type="radio"
                                            name="cat" id="cat" value="patient_id">
                                    {{__('Patient Number')}} <span class="ml-4" style="font-size: 14px; color: rgb(100, 100, 100);"> (Check Queue for Patient Number)</span>
                            </label>
                            
                                <input required type="number"  class="form-control" id="keyword" name="keyword"
                                    placeholder="Enter Patient" style="margin-top: 2px">
                                <button type="submit" class="btn btn bg-gradient-dark btn-lg mt-3 text-center">Check</button>
                            
                        </div>
                        
                        {{--
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                

                                
                                <label class="mr-2">
                                    <input onchange="changeFunc('Name');" style="display:inline-block"  type="radio"
                                        name="cat" id="cat" value="name">
                                    {{__('Name')}}
                                </label>


                                
                                
                                <label class="ml-2 mr-4">
                                    <input onchange="changeFunc('Telephone Number');" style="display:inline-block" type="radio"
                                        name="cat" id="cat" value="telephone">
                                    {{__('Telephone')}}
                                </label>


                                <label>
                                    <input onchange="changeFunc('NIC Number');" style="display:inline-block" type="radio"
                                        name="cat" id="cat" value="nic">
                                    {{__('ID Number')}}
                                </label>
                                
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                        --}}                        
                    </div>

                </div>
            </div>
            <div class="col-md-1"></div>
    </div>
    
</div>

</form>

@if(Session::has('error'))

<div class="row myerror">
    <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ Session::get('error') }}</h3>
                    <p>Sytem Warning</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </div>
    <div class="col-md-1"></div>
</div>

@endif

<script>
    document.getElementById("keyword").placeholder ="Enter Patient Number";

    function changeFunc(txt){
        document.getElementById("keyword").placeholder ="Enter Patient " +txt;
    }

    if ("{{Session::has('error')}}") {
        setTimeout(() => {
            $('.myerror').fadeOut();
        }, 5000);
    }
</script>

@endsection