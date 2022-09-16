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

<div class="row" >
    <div class="col-xs-1"></div>
    <div class="col-xs-10">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{__('Patients Appointments Today')}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="inpatientTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            
                            <th>{{__('Name')}}</th>
                            <th>{{__('Patient No.')}}</th>
                            
                            
                            <th>{{__('Ward')}}</th>
                            <th>{{__('Wing')}}</th>
                            <th>{{__('Payment Method')}}</th>

                            
                            
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inpatient_appointments as $app)
                            
                            
                                
                            
                                <tr>
                                    
                                    <td>{{App\Patients::where('id', '=', $app->patient_id)->first()->name}}</td>
                                    <td>{{$app->patient_id}}</td>
                                    
                                    
                                    <td>{{ App\Ward::where('id', '=', $app->ward_id)->first()->ward_title }}</td>
                                    <td>Wing {{ App\Ward::where('id', '=', $app->ward_id)->first()->wing }}</td>
                                    
                                    <td>{{ App\Appointment::where('id', '=', $app->appointment_id)->get()->last()->mode_of_payment}}</td>
                                    
                                </tr>
                            
                        @endforeach
                    </tbody>
                    

                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-xs-1"></div>
    <!-- /.col -->
</div>
<!-- /.row -->
<!-- /.content -->



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
    /*
    document.getElementById("keyword").placeholder ="Enter Patient Number";

    function changeFunc(txt){
        document.getElementById("keyword").placeholder ="Enter Patient " +txt;
    }

    if ("{{Session::has('error')}}") {
        setTimeout(() => {
            $('.myerror').fadeOut();
        }, 5000);
    }
    */

    $(function () {

        $('#inpatientTable').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>

@endsection