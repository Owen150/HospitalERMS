@extends('template.main')

@section('title', $title)

@section('content_title',__('In Patient Registration'))
@section('content_description',__('Register New In Patients Here.'))
@section('breadcrumbs')

<ol class="breadcrumb">
    <li><a href="{{route('dash')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
    <li class="active">Here</li>
</ol>
@endsection

@section('main_content')
{{--  patient registration  --}}

<div @if (session()->has('regpsuccess') || session()->has('regpfail')) style="margin-bottom:0;margin-top:3vh" @else
    style="margin-bottom:0;margin-top:8vh" @endif class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        @if (session()->has('regpsuccess'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            {{session()->get('regpsuccess')}}
        </div>
        @endif
        @if (session()->has('regpfail'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Error!</h4>
            {{session()->get('regpfail')}}
        </div>
        @endif

    </div>
    <div class="col-md-1"></div>

</div>



<div class="box box-info" id="reginpatient2" style="display:none">
    <div class="box-header with-border">
        <h3 class="box-title">{{__('Pre Registration Form')}}</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="post" action="{{ route('save_inpatient') }}" class="form-horizontal">
        {{csrf_field()}}
        <div class="box-body">

            <div class="form-group">
                <label for="patient_id" class="col-sm-2 control-label">{{__('Registration No')}}<span style="color:red">*</span></label></label></label>
                <div class="col-sm-2">
                    <input type="text" required readonly class="form-control" name="reg_pid" id="patient_id">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">{{__('Full Name')}}<span style="color:red">*</span></label>
                <div class="col-sm-10">
                    <input type="text" required readonly class="form-control" name="reg_pname" id="patient_name"
                        placeholder="Enter Patient Full Name">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">{{__('ID/PP/Military No')}}<span style="color:red">*</span></label>
                <div class="col-sm-10">
                    <input type="text" required readonly class="form-control" name="reg_pnic" id="patient_nic"
                        placeholder="National Identity Card Number">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">{{__('Address')}}<span style="color:red">*</span></label>
                <div class="col-sm-10">
                    <input type="text" required readonly class="form-control" name="reg_paddress" id="patient_address"
                        placeholder="Enter Patient Address ">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">{{__('Telephone')}}</label>
                <div class="col-sm-10">
                    <input type="tel" readonly class="form-control" name="reg_ptel" id="patient_telephone"
                        placeholder="Patient Telephone Number">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">{{__('Occupation')}}<span style="color:red">*</span></label>
                <div class="col-sm-10">
                    <input type="text" required readonly class="form-control" name="reg_poccupation"
                        id="patient_occupation" placeholder="Enter Patient Occupation ">
                </div>
            </div>

            <!-- select -->
            <div class="form-group">
                <label class="col-sm-2 control-label">{{__('Sex')}}<span style="color:red">*</span></label>
                <div class="col-sm-2">
                    <select required disabled class="form-control" name="reg_psex" id="patient_sex">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <label for="patient_age" class="col-sm-2 control-label">{{__('Age')}}</label>
                <div class="col-sm-2">
                    <input type="text" readonly class="form-control" name="reg_page" id="patient_age"
                        placeholder="Enter Age">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">{{__('Civil Condition')}}<span style="color:red">*</span></label>
                <div class="col-sm-2">
                    <select required class="form-control" name="reg_ipcondition">
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">{{__('Birth Place')}}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="reg_ipbirthplace" placeholder="Patient Birth place">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">{{__('Nationality')}}<span style="color:red">*</span></label>
                <div class="col-sm-2">
                    <select required class="form-control" name="reg_ipnation">
                        <option selected value="Kenyan">Kenyan</option>
                        <option value="Tamil">Ugandan</option>
                        <option value="Muslim">Tanzania</option>
                        <option value="Burgher">Rwanda</option>
                        <option value="Malay">Burundi</option>
                        <option value="other">other</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">{{__('Religion')}}<span style="color:red">*</span></label>
                <div class="col-sm-2">
                    <select required class="form-control" name="reg_ipreligion">
                        <option value="Islam">Islam</option>
                        <option value="Christianity" selected>Christianity</option>
                        <option value="Buddhism">Buddhism</option>
                        <option value="Hinduism">Hinduism</option>
                        
                        <option value="other">other</option>
                    </select>
                </div>
            </div>

            <!-- currency input type -->
            <div class="form-group">
                <label class="col-sm-2 control-label">{{__('Monthly Income')}}</label>
                <div class="col-sm-2">
                    <div class="input-group">
                        <span class="input-group-addon">{{__('KSH:')}}</span>
                        <input type="number" min="1000" step="1000.00" data-number-to-fixed="2"
                            data-number-stepfactor="100" class="form-control currency" name="reg_inpincome">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">{{__('Name of Patient/Guardian')}}<span style="color:red">*</span></label>
                <div class="col-sm-10">
                    <input type="text" required class="form-control" name="reg_ipguardname"
                        placeholder="Enter Name of any responsible person of patient">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">{{__('Address of Patient/Guardian')}}<span style="color:red">*</span></label>
                <div class="col-sm-10">
                    <input type="text" required class="form-control" name="reg_ipguardaddress"
                        placeholder="Enter Address of any responsible person of patient">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">{{__('Inventory of patient')}}</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="reg_ipinventory" rows="3" cols="100"
                        placeholder="Enter inventory list of patient"></textarea>
                </div>
            </div>
        </div>


        <div class="box-header with-border">
            <h3 class="box-title">{{__('Ward Registration Form')}}</h3>
        </div>
        <div class="box-body">
            <div class="form-group">

                <label class="col-sm-2 control-label">{{__('Ward No')}}<span style="color:red">*</span></label>
                <div class="col-sm-2">
                    <select required class="form-control" name="reg_ipwardno">
                        <option value="">Select Ward No</option>
                        @if($data)
                        @foreach ($data as $x)
                                <option value="{{$x->ward_no}}">{{$x->ward_no}} ({{ucwords($x->name)}})</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">{{__('House Physician/Surgeon')}}<span style="color:red">*</span></label>
                <div class="col-sm-10">
                    <input type="text" required class="form-control" name="reg_iphousedoc"
                        placeholder="Name of Physician/Surgeon">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">{{__('Approved Physician/Surgeon')}}<span style="color:red">*</span></label>
                <div class="col-sm-10">
                    <input type="text" required class="form-control" name="reg_ipapprovedoc" id="approveDoc"
                        placeholder="Name of Physician/Surgeon">
                </div>
            </div>

        </div>

        <div class="box-header with-border">
            <h3 class="box-title">{{__('Admitting Officer - Notes')}}</h3>
        </div>


        <div class="box-body">
            <div class="form-group">
                <label for="dis1" class="col-sm-2 control-label">{{__('Disease')}}<span style="color:red">*</span></label>
                <div class="col-sm-10">
                    <input type="text" required class="form-control" id="dis1" placeholder="Enter diagnosis of patient"
                    name="reg_admitofficer1" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">{{__('Duration of illness')}}<span style="color:red">*</span></label>
                <div class="col-sm-2">
                    <div class="input-group">
                        <span class="input-group-addon">{{__('Days:')}}</span>
                        <input type="number" required min="1" step="1" data-number-to-fixed="2" data-number-stepfactor="100"
                            class="form-control currency" name="reg_admitofficer2" id="dis2">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="dis3" class="col-sm-2 control-label">{{__('Mode of arises and current condition:')}}<span style="color:red">*</span></label>
                <div class="col-sm-10">
                    <textarea class="form-control" required name="reg_admitofficer3" id="dis3" rows="3" cols="100"
                        placeholder="Enter current condition of patient here"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="dis4" class="col-sm-2 control-label">{{__('Certified by')}}<span style="color:red">*</span></label>
                <div class="col-sm-2">
                    <input type="text" readonly value="{{Auth::user()->id}} ({{ucWords(Auth::user()->name)}})" required class="form-control" id="dis4" placeholder="Select Your ID here"
                        name="reg_admitofficer4" />
                </div>
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <input type="submit" class="btn btn-info pull-right" value="Register">
            <input type="reset" class="btn btn-default" value="Cancel">
        </div>

</div>
</form>



<div class="row mt-5 pt-5">
    <div class="col-md-1"></div>
    <div class="col-md-10">
<div class="box box-info" id="reginpatient1">
    <div class="box-header with-border">
        <h3 class="box-title">{{__('Enter Registration No. Or Scan the bar code')}}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="form-group">
            <label for="pID" class="control-label" style="font-size:18px">{{__('Registration No or Appointment No:')}}</label>
                <input type="number" required class="form-control" id="pID"
                    placeholder="Enter Registration No" />
        </div>
        <div class="form-group">
                <button type="button" class="btn btn-info" onclick="registerinpatientfunction()">{{__('Enter')}}</button>
        </div>
        {{-- </div> --}}
    </div>
    <!-- /.box-body -->

    <div class="box-footer">

    </div>
    <!-- /.box-footer -->
</div>
    </div>
</div>


<script>
    function registerinpatientfunction() {

        var x, text;
        x = document.getElementById("pID").value;
        patientid=x;
        if (x > 0)
        {
            var data=new FormData;
            data.append('pNum',x);
            data.append('_token','{{csrf_token()}}');


            $.ajax({
                type: "post",
                url: "{{route('regInPatient')}}",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                error: function(data){
                    console.log(data);
                },
                success: function (inp) {
                    if(inp.exist){
                        console.log(inp);
                        $("#patient_name").val(inp.name);
                        $("#patient_age").val(inp.age);
                        $("#patient_sex").val(inp.sex);
                        $("#patient_telephone").val(inp.telephone);
                        $("#patient_nic").val(inp.nic);
                        $("#patient_address").val(inp.address);
                        $("#patient_occupation").val(inp.occupation);
                        $("#patient_id").val(inp.id);

                        $("#reginpatient2").slideDown(1000);
                        $("#reginpatient1").slideUp(1000);

                    }else{
                        console.log('not found');
                        alert("Please Enter a Valid Admitted Patient Registration Number or Appointment Number!");
                    }
                }
            });
            }else{
                alert("Please Enter a Valid Registration Number!");
            }
    }

</script>


@endsection
