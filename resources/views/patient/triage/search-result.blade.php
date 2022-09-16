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

<div class="row" style="justify-content: center; align-items:center;" id="createchannel4">
    <div class="col-md-8 mb-5">
        <div class="card mt-3">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-6 d-flex align-items-center mt-3">
                      <h5 class="card-title font-weight-bolder ml-2">{{__('Patient Details')}}</h5>
                    </div>
                    <div class="col-6 text-end">
                      <img src="./images/WKMHLogo.png" style="width: 20%;">
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body ml-4">
                <p>Patient ID: <span style="font-weight: bold">{{ $search_result[0]->id }}</span></p>
                <p>Patient Name: <span style="font-weight: bold">{{ $search_result[0]->name }}</span></p>
                <p>Patient Telephone: <span style="font-weight: bold">{{ $search_result[0]->telephone }}</span></p>
                <p>DOB: <span style="font-weight: bold">{{ $search_result[0]->bod }}</span></p>
                <p>Current Doctor: <span style="font-weight: bold">{{ $doctor->name }}</span></p>
                <div class="div text-center">
                    <button class="btn bg-gradient-dark mt-3 text-center" id="addTriageResults">Add Triage</button>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-xs-1"></div>
    <!-- /.col -->
</div>

<div class="row justify-content-center align-items-center" id="myhiddenrowtriage">
    <div class="col-md-5">
        <div class="box mt-3 justify-content-center">
            <div class="box-header text-center pb-0">
                <h4 class="box-title font-weight-bolder">{{__('Add Triage')}}</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form class="form-horizontal" action="{{route('addTriage')}}" method="POST">
                    @csrf
                    <input class="form-control" type="hidden" name="patient_id" value="{{ $search_result[0]->id }}">

                    <label class="control-label" for="" >Weight</label>
                    <input class="form-control" type="text" placeholder="Enter Weight" name="weight" required><br>
                    <label class="control-label" for="" >Temperature</label>

                    <input class="form-control" type="text" placeholder="Enter Temperature" name="temp" required> <br>
                    <label class="control-label" for="" >Blood Pressure</label>

                    <input class="form-control" type="text" placeholder="Enter Blood Pressure" name="blood_pressure" required><br> 
                    <label class="control-label" for="" >Brief History</label>
                    <input class="form-control" type="text" placeholder="Enter Brief History" name="history" required><br> 
                    
                    <label class="control-label" for="" >Send To:</label>
                    <div >
                        <select class="form-control mb-4" id="selectDept" name="department" required>
                            <option selected>consultation</option>
                            <option>dentist</option>
                            
                            
                        </select>
                    </div>

                    
                        <label class="control-label" for="">Select Doctor:</label>
                        <div>
                            <select class="form-control mb-3" id="selectdoc" name="docname" required>
                                @foreach ($docs as $doc)
                                
                                    <option @if($doctor->id == $doc->id) selected  @endif value="{{ $doc->id }}">{{ $doc->name }} - {{ substr($doc->user_type, 7) }}</option>
                                    
                                @endforeach
                                
                                
                                
                            </select>
                        </div>
                    
                
                    <br>
                    <input type="hidden" name="app_id" value="{{ $appointment->id }}">

                    <div class="div text-center mb-5">
                        <button type="submit" class="btn btn-success">Submit Results</button>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-xs-1"></div>
    <!-- /.col -->
</div>

<div class="row" id="createchannel4">
    <div class="col-xs-1"></div>
    <div class="col-xs-10">
        <div class="card p-3">
            <div class="card-header pb-0">
                <h5 class="card-title text-center font-weight-bolder">{{__('Triage History')}}</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body px-0 pt-2 pb-4">
                <table id="example2" class="table table-responsive align-items-center mb-2">
                    <thead>
                        <tr>
                            <th class="font-weight-bolder text-secondary text-center">Date / Time</th>
                            <th class="font-weight-bolder text-secondary text-center">Blood Pressure</th>
                            <th class="font-weight-bolder text-secondary text-center">Weight</th>
                            <th class="font-weight-bolder text-secondary text-center">Temp</th>
                            <th class="font-weight-bolder text-secondary text-center">History</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($triage as $app)
                        <tr>
                            <td class="text-center">{{$app->created_at}}</td>
                            <td class="text-center">{{$app->blood_pressure}}</td>
                            <td class="text-center">{{$app->weight}}</td>
                            <td class="text-center">{{$app->temp}}</td>
                            <td class="text-center">{{$app->history}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    

                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-xs-1"></div>
    <!-- /.col -->
</div>







<script>
$('#myhiddenrowtriage').hide();

$('#addTriageResults').on('click', function() {
    $('#myhiddenrowtriage').slideToggle();
});
</script>

@endsection