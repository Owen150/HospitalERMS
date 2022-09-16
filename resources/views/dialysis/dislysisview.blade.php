@extends('template.main')

@section('title', $title)

@section('content_title',__("Patient Results"))
@section('content_description',__("Patient Dialysis"))
@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="#"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
    <li class="active">Here</li>
</ol>

@endsection

@section('main_content')

<div class="row" id="createchannel4">
    <div class="col-xs-1"></div>
    <div class="col-xs-10">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">{{__('Patient Details')}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <p>Patient Name: <span style="font-weight: bold">{{ $search_result[0]->name }}</span></p>
                <p>Patient Telephone: <span style="font-weight: bold">{{ $search_result[0]->telephone }}</span></p>
                
                
                <button class="btn btn-primary" id="addLabResults">Add Dialysis Results</button>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-xs-1"></div>
    <!-- /.col -->
</div>

<div class="row" id="myhiddenrow">
    <div class="col-xs-1"></div>

    <div class="col-xs-10">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">{{__('Lab Results Form')}}</h3>
            </div>
            <div class="box-body">

                <form class="form-horizontal" action="{{route('addDialysis')}}" method="POST">
                    @csrf
                    <label for="">Findings</label>
                    <textarea class="form-control text-capitalize" name="findings" id="diagnosys" cols="73"
                                rows="10"></textarea>

                    <label for="">Recommendation</label>
                    <textarea class="form-control text-capitalize" name="recommendation" id="diagnosys" cols="73"
                                rows="10"></textarea>
                    <br>

                    <input type="hidden" name="patient_id" value="{{$search_result[0]->id}}">

                    <input type="hidden" value="500" name="amount" />
                    <input type="hidden" value="{{ $appointment->id }}" name="appointment_id" />
                    <input type="hidden" value="dialysis" name="billing_for" />
                    <input type="hidden" value="no" name="completed" />
                    <input type="hidden" value="cash" name="payment_method" />

                    <button type="submit" class="btn btn-success">Submit Results</button>
                    

                    
                </form>

            </div>

        </div>
    </div>
    
    

    <div class="col-xs-1"></div>
</div>


<div class="row" id="createchannel4">
    <div class="col-xs-1"></div>
    <div class="col-xs-10">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">{{__('Dialysis History')}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                       @foreach ($dialysis as $dialysi)
                           
                       
                        <div id="presc{{ $dialysi->id }}" class="box box-success collapsed-box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Visit On <span>({{ $dialysi->updated_at }})</span></h3>
                
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                    </button>
                                    
                                </div>
                            </div>
                            <div class="box-body" style="display:none">
                
                                
                
                                <h4 style="text-decoration: underline">Findings</h4>
                                <h5 class="text-primary" style="font-size:17px;font-weight:600">{{ $dialysi->findings }}</h5>
                                <br>
                                <h4 style="text-decoration: underline">Recommendation</h4>
                                <h5 class="text-primary" style="font-size:17px;font-weight:600">{{ $dialysi->Recommendation }}<small> 
                                    </small></h5>
                
                                
                            </div>
                
                        </div>
                       
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-xs-1"></div>
    <!-- /.col -->
</div>





<script>
    $('#myhiddenrow').hide();

    $('#addLabResults').on('click', function() {
        $('#myhiddenrow').slideToggle();
    });
</script>

@endsection