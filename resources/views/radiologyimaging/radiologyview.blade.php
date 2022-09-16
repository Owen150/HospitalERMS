@extends('template.main')

@section('title', $title)

@section('content_title',__("Patient Results"))
@section('content_description',__("Search,View & Update Patient Details"))
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
                <h3 class="box-title">{{__('Patient Details:')}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <p>Patient Name: <span style="font-weight: bold">{{ $search_result[0]->name }}</span></p>
                <p>Patient Telephone: <span style="font-weight: bold">{{ $search_result[0]->telephone }}</span></p>
                
                <hr>

                <h4>Test for:</h4>

                @if ($measure->measrure_1 !== null)
                <p style="font-weight: bold">{{$measure->measrure_1 }}</p>
                @endif

                @if ($measure->measrure_2 !== null)
                <p style="font-weight: bold">{{$measure->measrure_2 }}</p>
                @endif

                @if ($measure->measrure_3 !== null)
                <p style="font-weight: bold">{{$measure->measrure_3 }}</p>
                @endif

                @if ($measure->measrure_4 !== null)
                <p style="font-weight: bold">{{$measure->measrure_4 }}</p>
                @endif

                @if ($measure->measrure_5 !== null)
                <p style="font-weight: bold">{{$measure->measrure_5 }}</p>
                @endif
                <hr>
                <br>
                
                <button class="btn btn-primary" id="addLabResults">Add Lab Results</button>
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
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">{{__('Radiology and Imaging Form')}}</h3>
            </div>
            <div class="box-body">

                <form class="form-horizontal" action="{{route('addRadiology')}}" method="POST">
                    @csrf
                    <div class="row">
                        @if ($measure->measrure_1 !== null)
                        <div class="col-md-6">
                            <label for="">CT Scan</label>
                            <input class="form-control" type="text" placeholder="Enter CT Scan Results" name="ct_Scan"><br>
                        </div>

                        @endif
                        @if ($measure->measrure_2 !== null)
                        <div class="col-md-6">
                            <label for="">X-Ray</label>
                            <input class="form-control" type="text" placeholder="Enter X-Ray Results" name="x_ray" ><br>
                        </div>

                        @endif
                    </div>


                    <div class="row">
                        @if ($measure->measrure_3 !== null)
                        <div class="col-md-6">
                            <label for="">Ultra Sound</label>
                            <input class="form-control" type="text" placeholder="Enter Ultra Sound Results" name="ultra_sound" ><br>
                        </div>

                        @endif
                        @if ($measure->measrure_4 !== null)
                        <div class="col-md-6">
                            <label for="">MRI</label>
                            <input class="form-control" type="text" placeholder="Enter MRI Results" name="mri" ><br>
                        </div>

                        @endif
                    </div>


                    <div class="row">
                        @if ($measure->measrure_5 !== null)
                        <div class="col-md-6">
                            <label for="">PET Scan</label>
                            <input class="form-control" type="text" placeholder="Enter PET Scan Results" name="pet_scan" ><br>
                        </div>

                        @endif
                    </div>

                    
                    

                    
                    



                    

                    

                    
                    
                    <input type="hidden" value="2000" name="amount" />
                    <input type="hidden" value="{{ $appointment->id }}" name="appointment_id" />
                    <input type="hidden" value="{{ $appointment->patient_id }}" name="patient_id" />
                    <input type="hidden" value="radiology and imaging" name="billing_for" />
                    <input type="hidden" value="no" name="completed" />
                    <input type="hidden" value="{{ $appointment->mode_of_payment }}" name="payment_method" />
                    <button type="submit" class="btn btn-success">Submit Results</button>
                    
                    
                </form>

            </div>

        </div>
    </div>
    
    

    <div class="col-xs-1"></div>
</div>



<script>
    $('#myhiddenrow').hide();

    $('#addLabResults').on('click', function() {
        $('#myhiddenrow').slideToggle();
    });
</script>

@endsection