
@extends('template.main')

@section('title', 'Inventory')

@section('content_title',"Inventory")
@section('content_description',"medicine table")
@section('breadcrumbs')

<ol class="breadcrumb">
    <li><a href="{{route('dash')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
    <li class="active">Here</li>
</ol>
@endsection

<style>
    .edit:hover {
        cursor: pointer;
    }
</style>

@section('main_content')
{{--  issue medicine  --}}


<section class="content">
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"></h3>
            </div>
            
            <div class="box-body">
                <table id="medTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            
                            
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        
                    
                        <tr>
                            <td>{{$med->name_english}}</td>
                            <td>{{$med->price}}</td>
                            
                            <td>{{$med->qty}}</td>

                            
                        </tr>
                    
                    @endforeach
                
                </tbody>
                
                </table>
            </div>
        
        </div>
    
    </div>
    
</div>
    
</section>


<script>

    $(document).ready( function () {
        $('#medTable').DataTable();

        
    } );
    function savePrint(presid){

        var data=new FormData;
        data.append('medid',presid);
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

    /*
    function editMedicine(med_id){
        var qty = $('#qty').text();

        console.log(qty);
        
        var data=new FormData;
        data.append('medid',med_id);
        data.append('_token','{{csrf_token()}}');
        data.append('qty', qty);

        $.ajax({
                type: "post",
                url: "",
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
                  }
                }
        });
        
        
    }
    */
</script>

@endsection

{{--
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
        <form action={{route('searchTriagePost')}} method="GET" role="search">
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
            <div class="box box-successbox box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__('Triage')}} <small class="ml-2" style="font-weight: bold">(Check queue for patient number)</small></h3>
                </div>
                <div class="box-body">
                    <div class="pl-5 pr-5 pb-5">
                        <h3>{{__('Enter Patient Number To Begin Triage Test')}}</h3>
                        <label class="mr-2" style="display: none">
                            <input onchange="changeFunc('Patient Number');" checked style="display:inline-block" type="radio"
                                name="cat" id="cat" value="patient_id">
                            {{__('Patient Number')}} <span class="ml-4" style="font-size: 14px; color: rgb(100, 100, 100);"> (Check Queue for Patient Number)</span>
                        </label>
                        <input required type="text"  class="form-control" id="keyword" name="keyword"
                        placeholder="Enter Patient" style="margin-top: 2px">
                        <button type="submit" class="btn btn-primary btn-lg mt-3 text-center">Check</button>
                    </div>
                </div>
                --}}
                {{--
                <div class="row mt-5">
                    <div class="col-md-1"></div>
                    <div class="col-md-8">
                        

                        
                        <label class="mr-5">
                            <input onchange="changeFunc('Name');" style="display:inline-block"  type="radio"
                                name="cat" id="cat" value="name">
                            {{__('Name')}}
                        </label>

                        

                        <label class="ml-2 mr-5">
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

--}}