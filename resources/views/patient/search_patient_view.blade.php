@extends('template.main')

@section('title', $title)

@section('content_title',__("Search Patient"))
@section('content_description',__("Search,View & Update Patient Details"))
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
        <form action={{route('searchData')}} method="GET" role="search">
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
                <div class="card mt-3 mb-3">
                    <div class="card-header">
                      <div class="row">
                        <div class="col-6 d-flex align-items-center mt-1">
                            <h4 class="font-weight-bolder">{{__('Search Patient')}}</h4>
                        </div>
                        <div class="col-6 text-end">
                          <img src="./images/WKMHLogo.png" style="width: 20%;">
                      </div>
                    </div>
  
                    <div class="card-body">
                      <div>
                          <h4 class="text-center font-weight-bold mb-2">{{__('Search for a Patient Using ...')}}</h4>
                          <div class="row ml-2 mb-3 justify-content-center align-items-center">
                            <div class="col-md-1"></div>
                            <div class="col-md-5 justify-content-center align-items-center">
        
                                <label>
                                    <input onchange="changeFunc('Name');" style="display:inline-block" checked type="radio"
                                        name="cat" id="cat" value="name">
                                    {{__('Name')}}
                                </label>
        
        
                                <label>
                                    <input onchange="changeFunc('Telephone Number');" style="display:inline-block" type="radio"
                                        name="cat" id="cat" value="telephone">
                                    {{__('Telephone')}}
                                </label>
        
        
                                <label>
                                    <input onchange="changeFunc('ID Number');" style="display:inline-block" type="radio"
                                        name="cat" id="cat" value="nic">
                                    {{__('ID Number')}}
                                </label>
                            </div>
                            <div class="col-md-1"></div>
                            </div>
                          
                            <script>
                                function changeFunc(txt){
                                    document.getElementById("keyword").placeholder ="Enter Patient " +txt;
                                }
                            </script>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input required type="text" value="{{$old_keyword}}" class="form-control" id="keyword" name="keyword"
                                            placeholder="Enter Patient Name">
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
                      <div class="col-md-1"></div>
                    </div>
                </div>
            </div>

            <!--
            <div class="callout callout-info">
                <label class="h4">{{__('Search Patient With ...')}}</label>
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-2"></div>
                    <div class="col-md-5 justify-content-center align-items-center">

                        <label>
                            <input onchange="changeFunc('Name');" style="display:inline-block" checked type="radio"
                                name="cat" id="cat" value="name">
                            {{__('Name')}}
                        </label>


                        <label>
                            <input onchange="changeFunc('Telephone Number');" style="display:inline-block" type="radio"
                                name="cat" id="cat" value="telephone">
                            {{__('Telephone')}}
                        </label>


                        <label>
                            <input onchange="changeFunc('ID Number');" style="display:inline-block" type="radio"
                                name="cat" id="cat" value="nic">
                            {{__('ID Number')}}
                        </label>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <script>
                    function changeFunc(txt){
                        document.getElementById("keyword").placeholder ="Enter Patient " +txt;
                    }
                </script>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="input-group">
                            <input required type="text" value="{{$old_keyword}}" class="form-control" id="keyword" name="keyword"
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
        -->
    </div>
</div>

</form>

@if($search_result)
@if(!$search_result->isEmpty())

@foreach($search_result as $patient)
{{-- Search Results --}}
<div class="row mt-5">
    <!-- right column -->
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <!-- Horizontal Form -->
        <div class="box box-info justify-content-center align-items-center">
            <div class="box-header with-border">
                <h3 class="box-title text-center">{{__('Search Results')}}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form class="form-horizontal" action="{{route('editpatient')}}" method="POST">
                @csrf
                <div class="box-body ml-5 pl-2 justify-content-center align-items-center">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{__('Patient NO')}}</label>
                        <div class="col-sm-10">
                            <input readonly value="{{$patient->id}}" type="text" required class="form-control"
                                name="reg_pname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{__('Full Name')}}</label>
                        <div class="col-sm-10">
                            <input readonly value="{{$patient->name}}" type="text" required class="form-control"
                                name="reg_pname" placeholder="Enter Patient Full Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">{{__('ID/PP/Military No')}}</label>
                        <div class="col-sm-10">
                            <input readonly value="{{$patient->nic}}" type="text" required class="form-control"
                                name="reg_pnic" placeholder="National Identity Card Number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">{{__('Address')}}</label>
                        <div class="col-sm-10">
                            <input readonly type="text" value="{{$patient->address}}" required class="form-control"
                                name="reg_paddress" placeholder="Enter Patient Address ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">{{__('Telephone')}}</label>
                        <div class="col-sm-10">
                            <input readonly value="{{$patient->telephone}}" type="tel" class="form-control"
                                name="reg_ptel" placeholder="Patient Telephone Number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">{{__('Occupation')}}</label>
                        <div class="col-sm-10">
                            <input readonly value="{{$patient->occupation}}" type="text" required class="form-control"
                                name="reg_poccupation" placeholder="Enter Patient Occupation ">
                        </div>
                    </div>
                    <!-- select -->
                    <div class="form-group">

                        <label class="col-sm-2 control-label">{{__('Sex')}}</label>
                        <div class="col-sm-10 mr-0 pr-0">
                            <input readonly value="{{$patient->sex}}" type="text" required class="form-control"
                                name="reg_poccupation" placeholder="Enter Patient Occupation ">
                        </div>

                        <label class="col-sm-2 control-label">{{__('DOB')}}</label>
                        <div class="col-sm-10">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input readonly value="{{$patient->bod}}" type="text" class="form-control pull-right"
                                    name="reg_pbd" placeholder="Birthday">
                                <input readonly value="{{$patient->id}}" type="text" class="form-control pull-right"
                                    name="reg_pid" style="display:none">

                            </div>
                        </div>

                        <div class="row justify-content-center align-items-center">
                            <div class="col-sm-6 mt-5 justify-content-center align-items-center">
                                <div class="btn-group text-center" role="group" aria-label="Button group">
                                    <button type="button" onclick="go('{{$patient->id}}')" class="btn bg-navy"><i class="far fa-id-card"></i> {{__('Profile')}}</button>
                                <button @if($patient->trashed()) type="button" disabled @endif class="btn btn-warning"><i class="fas fa-edit"></i> {{__('Edit')}}</button>
                                </div>    
                            </div>
                        </div>
                        

                        

                    </div>
                </div>

            </form>
        </div>
    </div>
    
    <div class="col-md-1"></div>
</div>
@endforeach
<script>
    function go(pid){
        window.location.href = "/patient/"+pid;
    }
</script>
@else
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <h4>{{__('No results found...')}}</h4>
    </div>
    <div class="col-md-1"></div>
</div>

@endif
@endif

@endsection