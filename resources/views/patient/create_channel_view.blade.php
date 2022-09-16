@extends('template.main')

@section('title', $title)

@section('content_title',__("Create Appoinments"))
@section('content_description',__("Create an appointment for the patient from here !"))
@section('breadcrumbs')

<ol class="breadcrumb">
    <li><a href="{{route('dash')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
    <li class="active">Here</li>
</ol>
@endsection
@section('main_content')
<div class="d-flex justify-content-center mb-3">
    <h5><?php echo date("l jS \of F Y") ?></h5>
</div>
<!-- Main content -->

{{--  <div class="col-md-3 col-md-offset-4"  >
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <p>Channel No:</p>
                        <h3>44</h3>
                    </div>
                    <a href="#" class="icon"><i class="ion ion-person-add"></i></a>
                    <a href="#" class="small-box-footer">Create Channel <i class="fas fa-plus-circle"></i></a>
                </div>
            </div>  --}}


<div style="display:none" id="createchannel2" class="row">
    <!-- right column -->
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <!-- Horizontal Form -->
        <div class="card mt-3 justify-content-center">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-6 d-flex align-items-center mt-3">
                        <h5 class="box-title">{{__('Enter Patient Details')}} <p class="" style="font-weight: bold; font-size: 14px; color: rgb(12, 71, 148);">(Check queue for patient number)</p></h5>
                    </div>
                    <div class="col-6 text-end">
                        <img src="./images/WKMHLogo.png" style="width: 20%;">
                    </div>
                </div>
            </div>
            
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal ml-5" method="POST" action="{{ route('makeappoint') }}">
                @csrf
               
                <div class="card-body ml-5 pl-2 align-items-center">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{__('Full Name')}}</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" name="reg_pname" id="patient_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{__('ID Number')}}</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" name="reg_pnic" id="patient_nic">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">{{__('Address')}}</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" name="reg_paddress" id="patient_address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">{{__('Telephone')}}</label>
                        <div class="col-sm-10">
                            <input type="tel" readonly class="form-control" id="patient_telephone" name="reg_ptel">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">{{__('Occupation')}}</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="patient_occupation"
                                name="reg_poccupation">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="" >Payment Method</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="select1" name="modeofpayment" required>
                                <option value="cash">Cash</option>
                                <option value="mpesa">Mpesa</option>
                                <option value="nhif">NHIF</option>
                                
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="">Select Doctor</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="selectdoc" name="docname" required>
                                @foreach ($docs as $doc)
                                    <option value="{{ $doc->id }}">{{ $doc->name }} - {{ substr($doc->user_type, 7) }}</option>
                                    
                                @endforeach
                                
                                
                                
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="" >Department</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="selectDept" name="department" required>
                                <option selected>triage</option>
                                <option>lab</option>
                                <option>physiotherapy</option>
                                <option>counselling</option>
                                
                                
                            </select>
                        </div>
                    </div>
                    <!-- select -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{__('Sex')}}</label>
                        <div class="col-sm-10">
                            <select id="patient_sex" readonly class="form-control" name="reg_psex">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        
                        <label for="inputEmail3" class="col-sm-2 control-label">{{__('Age')}}</label>
                        <div class="col-sm-10">
                            <input type="number" readonly id="patient_age" min="1" class="form-control" name="reg_page">
                        </div>
                        

                        {{--
                        <label for="inputEmail3" class="col-sm-1 control-label">{{__('Mode')}}</label>
                        <div class="col-sm-2">
                            <select id="patient_sex" readonly class="form-control" name="reg_psex">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        ---}}
                    </div>
                    <input type="hidden" name="patient_id" id="patient_id">
                    <div class="div text-center">
                        <button class="btn bg-gradient-dark btn-lg mr-5 mt-2 text-center" type="submit">Create</button>
                        {{-- <input type="reset" class="btn btn-default" value="{{__('Cancel')}}"> --}}
                    </div>
                    <!-- /.box-footer -->
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>

@if (Auth::user()->user_type == "reception" || Auth::user()->user_type == "admin")

<div class="row justify-content-center">
    <div class="col-md-10 mb-4">

        <div class="card mt-3 mb-3" id="createchannel3">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-6 d-flex align-items-center mt-3">
                      <h5 class="box-title">{{__('Enter Patient No')}} <p class="" style="font-weight: bold; font-size: 14px; color: rgb(12, 71, 148);">(Check queue for patient number)</p></h5>
                    </div>
                    <div class="col-6 text-end">
                      <img src="./images/WKMHLogo.png" style="width: 20%;">
                </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="form-horizontal">
                <div class="card-body justify-content-center">
                    <div class="form-group">
                        <label for="p_reg_num" class="control-label"><h4>{{__('Patient No:')}}</h4></label>
                            <input type="number" onchange="createChannelFunction()" required class="form-control"
                                id="p_reg_num" placeholder="Enter Patient Number">

                        <div class="col-sm-2 mt-3">
                            <button type="button" class="btn bg-gradient-dark btn-lg text-center" onclick="createChannelFunction()">Enter</button>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

            </div>
        </div>

    </div>
    <div class="col-md-1"></div>
</div>
@endif

<div class="row mt-5" id="createchannel4">
    <div class="col-xs-1"></div>
    <div class="col-xs-10">
        <div class="card p-3">
            <div class="card-header pb-0">
                <h5 class="card-title text-center">{{__('Patient Appointments Today')}}</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body px-0 pt-2 pb-4">
                <table id="example2" class="table table-responsive align-items-center mb-2">
                    <thead>
                        <tr>
                            <th class="font-weight-bolder text-secondary">{{__('Appointment No.')}}</th>
                            <th class="font-weight-bolder text-secondary">{{__('Name')}}</th>
                            <th class="font-weight-bolder text-secondary">{{__('Patient No.')}}</th>                            
                            <th class="font-weight-bolder text-secondary">{{__('Department')}}</th>
                            <th class="font-weight-bolder text-secondary">Doctor</th>
                            <th class="font-weight-bolder text-secondary">Payment Method</th>
                            
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $app)
                            @if ($app->department !== 'done')
                            
                                @if ($app->admit !== 'YES')
                                <tr>
                                    <td class="text-center">{{$app->number}}</td>
                                    <td class="text-center">{{$app->name}}</td>
                                    <td class="text-center">{{$app->patient_id}}</td>
                                    
                                    
                                    <td class="text-center">{{ $app->department }}</td>
                                    <td class="text-center">{{ App\User::where('id', '=', $app->doctor_id)->first()->name }}</td>
                                    <td class="text-center">{{ $app->mode_of_payment }}</td>
                                    
                                </tr>
                                @endif
                                
                            @endif
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

<script>
    var patientid;
    var conceptName = $('#select1').find(":selected").text();
    var doctor = $('#selectdoc').find(":selected").text();
    function makeChannel(){
        $("#makeBtn").hide();
        var data=new FormData;
        data.append('_token','{{csrf_token()}}');
        data.append('id',patientid);
        data.append('modeofpay', conceptName);
        data.append('docname', $docname);

        $.ajax({
            type: "post",
            url: "{{route('makeappoint')}}",
            processData: false,
            contentType: false,
            cache: false,
            data:data,
            success: function (response) {
                location.reload();
            }
        });
    }

    function createChannelFunction() {

        var x, text;
        x = document.getElementById("p_reg_num").value;
        patientid=x;
        if (x > 0)
        {
            var data=new FormData;
            data.append('regNum',x);
            data.append('_token','{{csrf_token()}}');


            $.ajax({
                type: "post",
                url: "{{route('makechannel')}}",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                error: function(data){
                    console.log(data);
                },
                success: function (patient) {
                    if(patient.exist){
                        console.log(patient.name);
                        $("#patient_name").val(patient.name);
                        $("#patient_age").val(patient.age);
                        $("#patient_sex").val(patient.sex);
                        $("#patient_telephone").val(patient.telephone);
                        $("#patient_nic").val(patient.nic);
                        $("#patient_address").val(patient.address);
                        $("#patient_occupation").val(patient.occupation);
                        $("#appt_num").text(patient.appNum);
                        $("#patient_id").val(patient.id);

                        $("#createchannel1").slideDown(1000);
                        $("#createchannel2").slideDown(1000);
                        $("#createchannel3").slideUp(1000);
                    }else{
                        console.log('not found');
                        alert("Please Enter a Valid Registration Number!");
                    }
                }
            });
            }else{
                alert("Please Enter a Valid Registration Number!");
            }


        }

</script>

@endsection

@section('optional_scripts')
<script>
    $(function () {

        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })

</script>

@endsection