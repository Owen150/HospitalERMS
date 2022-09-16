@extends('template.main')

@section('title', 'Cashier Search')

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
        <form action={{route('searchcashierpost')}} method="GET" role="search">
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
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__('Cashier')}} <small class="ml-2" style="font-weight: bold">(Check queue for patient number)</small></h3>
                </div>

                <div class="box-body">
                    <div class="pl-5 pr-5 pb-5">
                        <h3>{{__('Enter Patient Number To Begin Billing')}}</h3>
                        <label class="mr-2" style="display: none">
                            <input onchange="changeFunc('Patient Number');" style="display:inline-block" checked type="radio"
                                name="cat" id="cat" value="patient_id">
                            {{__('Patient Number')}} <span class="ml-4" style="font-size: 14px; color: rgb(100, 100, 100);"> (Check Queue for Patient Number)</span>
                        </label>

                        <input required type="text"  class="form-control" id="keyword" name="keyword"
                                placeholder="Enter Patient Number" style="margin-top: 2px">

                        <button type="submit" class="btn btn-primary btn-lg mt-3 text-center">Check</button>
                    </div>
                </div>
                {{--
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        
                    </div>
                    <div class="col-md-1"></div>
                </div>
               
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="input-group">
                            <input required type="text"  class="form-control" id="keyword" name="keyword"
                                placeholder="Enter Patient Number">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                --}}

            </div>
    </div>
    <div class="col-md-1"></div>
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
</script>

@endsection