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

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <form action={{route('searchDialysisPost')}} method="GET" role="search">
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
            <div class="callout callout-info">
                <label class="h4">{{__('Search Patient With ...')}}</label>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">

                        <label class="mr-2">
                            <input onchange="changeFunc('Name');" style="display:inline-block" checked type="radio"
                                name="cat" id="cat" value="name">
                            {{__('Name')}}
                        </label>
                        
                        <label class="mr-2">
                            <input onchange="changeFunc('Patient Number');" style="display:inline-block" type="radio"
                                name="cat" id="cat" value="patient_id">
                            {{__('Patient Number')}}
                        </label>


                        <label class="ml-2 mr-4">
                            <input onchange="changeFunc('Telephone Number');" style="display:inline-block" type="radio"
                                name="cat" id="cat" value="telephone">
                            {{__('Telephone')}}
                        </label>


                        <label>
                            <input onchange="changeFunc('NIC Number');" style="display:inline-block" type="radio"
                                name="cat" id="cat" value="nic">
                            {{__('id Number')}}
                        </label>
                    </div>
                    <div class="col-md-1"></div>
                </div>
               
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="input-group">
                            <input required type="text"  class="form-control" id="keyword" name="keyword"
                                placeholder="Enter Patient">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>

            </div>
    </div>
    <div class="col-md-1"></div>
</div>

</form>

<script>
    document.getElementById("keyword").placeholder ="Enter Patient Name";

    function changeFunc(txt){
        document.getElementById("keyword").placeholder ="Enter Patient " +txt;
    }
</script>

@endsection