@extends('template.main')

@section('title', $title)

@section('content_title',"REPORTS")
@section('content_description',"Personalize Your Account")
@section('breadcrumbs')

<ol class="breadcrumb">
    <li><a href="{{route('dash')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
    <li class="active">Here</li>
</ol>
@endsection

@section('main_content')
<?php $user = Auth::user();
    $name = $user->name;
    $user_type = $user->user_type;
    $image_path = $user->img_path;
    $outlet = 'Rural Ayruvedic Hospital Kesbawa'?>

<style>
    @media print {

        .no-print,
        .no-print * {
            display: none !important;
        }
    }
</style>

<section class="content">

    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border no-print ">
                    <h3 class="box-title">{{__('Monthly Statics Report')}}</h3>
                </div>
                <!-- /.box-header -->

                <!-- form start -->
                <form class="form-horizontal">

                    <div class="box-body">

                        <h2 align="center">{{__('Ayruvedic Department')}}</h2>
                        <h4 align="center">{{__('Monthly Statics Report')}}</h4>

                        <br>
                        {{__('Institute')}} : {{__('Rural Ayruvedic Hospital Kesbawa')}}
                        <div class="pull-right">
                            <?php echo date('Y F'); ?>
                            <br>
                            {{__('Kesbewa District')}}
                        </div>


                        <br>
                        <br>
                        <center>
                            <h4>{{__('Outpatient Department')}}</h4>
                        </center>
                        <br>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('Patients Total Atendance')}} :- </label>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">{{__('First Arrival')}} : <input readonly
                                    style="border: 0px none" type="text" value="{{$fa}}"></label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">{{__('Second Arrival')}} : <input readonly
                                    style="border: 0px none" type="text" value="{{$sa}}"></label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">{{__('Total')}} : <input readonly
                                    style="border: 0px none" type="text" value="{{$total}}"></label>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">{{__('AVG of daily OPD patients')}} : <input readonly
                                    style="border: 0px none" type="text" value="{{$avgpatient}}"></label>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">{{__('Value of Issued medicine')}} : <input
                                    style="border: 0px none" type="text" placeholder="{{__('enter value')}}"></label>

                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">{{__('AVG price for one patient')}} : <input
                                    style="border: 0px none" type="text" placeholder="{{__('enter value')}}"></label>
                        </div>
                        <br>
                        <br>

                        <div class="form-group">
                            <label
                                class="col-sm-4 control-label">{{__('Issuing medicines according to OPD dates')}}</label>
                            <br>
                            <br>
                            <br>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">{{__('Description')}}</th>
                                                <th scope="col">{{__('Day 03')}}</th>
                                                <th scope="col">{{__('Day 05')}}</th>
                                                <th scope="col">{{__('Day 07')}}</th>
                                                <th scope="col">{{__('Day 06')}}</th>
                                                <th scope="col">{{__('Total')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">{{__('No. of patients from OPD')}}</th>
                                                <td><input style="border: 0px none" type="text"></td>
                                                <td><input style="border: 0px none" type="text"></td>
                                                <td><input style="border: 0px none" type="text"></td>
                                                <td><input style="border: 0px none" type="text"></td>
                                                <td><input style="border: 0px none" type="text">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">{{__('No. of OPD days')}}</th>
                                                <td><input style="border: 0px none" type="text"></td>
                                                <td><input style="border: 0px none" type="text"></td>
                                                <td><input style="border: 0px none" type="text"></td>
                                                <td><input style="border: 0px none" type="text"></td>
                                                <td><input style="border: 0px none" type="text">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>

                        <center>
                            <h4>{{__('Inpatient Department')}}</h4>
                        </center>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-6 control-label">{{__('No. of wards')}} : <input readonly
                                        style="border: 0px none" type="text" value="{{$wardcnt}}"></label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label">{{__('No. of beds in wards')}} : <input readonly
                                        style="border: 0px none" type="text" value="{{$bedcnt}}"></label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label">{{__('No. of inpatients in this month')}} : <input
                                        readonly style="border: 0px none" type="text" value="{{$inpcnt}}"></label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label">{{__('No. of inpatients discharged(this month)')}}
                                    : <input readonly style="border: 0px none" type="text" value="{{$dispcnt}}"></label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label">{{__('No. of inpatient dates')}} : <input readonly
                                        style="border: 0px none" type="text" value="{{$wardcnt}}"></label>
                            </div>
                            <div class="form-group">
                                <label
                                    class="col-sm-7 control-label">{{__('AVG no of days that inpatient spent in the hospital')}}
                                    : <input readonly style="border: 0px none" type="text" value="{{$wardcnt}}"></label>
                            </div>
                            <div class="form-group">
                                <label
                                    class="col-sm-7 control-label">{{__('Value for the medicines issued for the inpatients in this month')}}
                                    : <input style="border: 0px none" type="text"
                                        placeholder="{{__('enter value')}}"></label>
                            </div>
                            <div class="form-group">
                                <label
                                    class="col-sm-7 control-label">{{__('Value for the medicines issued for one inpatient day')}}
                                    : <input style="border: 0px none" type="text"
                                        placeholder="{{__('enter value')}}"></label>
                            </div>
                        </div>
                        <br>
                        <br>

                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-9"></div>
                            <div class="col-sm-2 no-print"><button type="button" class="btn btn-success"
                                    onclick="myFunction()">{{__('Add Row')}}</button></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>{{__('Type of drug produced')}}</th>
                                                <th colspan="2">{{__('Drugs produced in the institute')}}</th>
                                                <th colspan="2">{{__('Drugs received from othe institutes')}}</th>
                                                </tr>
                                            <tr>
                                                <th></th>
                                                <th>{{__('Quentity')}}</th>
                                                <th>{{__('Value')}}</th>
                                                <th>{{__('Quentity')}}</th>
                                                <th>{{__('Value')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td><input style="border: 0px none" type="text"></td>
                                                <td><input style="border: 0px none" type="text"></td>
                                                <td><input style="border: 0px none" type="text"></td>
                                                <td><input style="border: 0px none" type="text"></td>
                                                <td><input style="border: 0px none" type="text"></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>

                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-9"></div>
                            <div class="col-sm-2 no-print"><button type="button" class="btn btn-success"
                                    onclick="myFunction2()">{{__('Add Row')}}</button></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="myTable2">
                                        <thead>
                                            <tr>
                                                <th>{{__('Type of drug produced')}}</th>
                                                <th colspan="2">{{__('Drugs received from Pharmaceutical Corporation')}}
                                                </th>
                                                <th colspan="2">{{__('Total Medicines Available')}}</th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th>{{__('Quentity')}}</th>
                                                <th>{{__('Value')}}</th>
                                                <th>{{__('Quentity')}}</th>
                                                <th>{{__('Value')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td><input style="border: 0px none" type="text"></td>
                                                <td><input style="border: 0px none" type="text"></td>
                                                <td><input style="border: 0px none" type="text"></td>
                                                <td><input style="border: 0px none" type="text"></td>
                                                <td><input style="border: 0px none" type="text"></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <center>
                            <h3>{{__('Dry Medicines Provision')}}</h3>
                        </center>
                        <br>
                        <br>
                        <div class="form-group">
                            <label
                                class="col-sm-3 control-label">{{__('Total value for the medicines which bought this month')}}
                            </label>

                            <div class="col-sm-9">
                                <input type="text" style="border: 0px none" class="form-control"
                                    placeholder="{{__('enter value')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label
                                class="col-sm-3 control-label">{{__('Total value for the medicines which got as donations')}}
                            </label>

                            <div class="col-sm-9">
                                <input type="text" style="border: 0px none" class="form-control"
                                    placeholder="{{__('enter value')}}">
                            </div>
                        </div>
                        <br>
                        <br>
                        <center>
                            <h3>{{__('Approval Staff')}}</h3>
                        </center>
                        <br>
                        <br>
                        <div class="form-group">
                            <label
                                class="col-sm-3 control-label">{{__('Total number of employees approved to the hospital(in all grades)')}}</label>

                            <div class="col-sm-9">
                                <input type="text" style="border: 0px none" class="form-control"
                                    placeholder="{{__('enter value')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label
                                class="col-sm-3 control-label">{{__('Number of employees served for this month')}}</label>

                            <div class="col-sm-9">
                                <input type="text" style="border: 0px none" class="form-control"
                                    placeholder="{{__('enter value')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label
                                class="col-sm-3 control-label">{{__('Number of vacancies available at the end of the month(in all grades)')}}</label>

                            <div class="col-sm-9">
                                <input type="text" style="border: 0px none" class="form-control"
                                    placeholder="{{__('enter value')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label
                                class="col-sm-3 control-label">{{__('Excess number of workers(Exceed the approved number of employees)')}}</label>

                            <div class="col-sm-9">
                                <input type="text" style="border: 0px none" class="form-control"
                                    placeholder="{{__('enter value')}}">
                            </div>
                        </div>
                        <label>{{__('Number of days of duty in the field within the month')}} :-</label>
                        <br><br>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">{{__('Head of the institute')}} :
                                <input type="text" style="border: 0px none" readonly value="{{$admindaycnt}}">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">{{__('Other medical officers')}} :
                                <input type="text" style="border: 0px none" readonly value="{{$doctordaycnt}}">
                            </label>
                        </div>



                        <br>
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                                <p>{{__('I certifie that the above statical reports and informations are true')}}.</p>
                                <div class="pull-right">
                                    <p>{{__('Certified By')}}</p>
                                    <p>.............................</p>
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                    </div>

                    <!-- /.box-body -->
                    <div class="box-footer no-print">
                        <button action="refresh()" type="submit"
                            class="btn btn-default no-print">{{__('Cancel')}}</button>
                        <button onclick="window.print()" class="float-right btn btn-warning no-print">{{__('Print')}} <i
                                class="fas fa-print"></i></button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>

    </div>
    <!-- /.row -->


</section>
<script>
    function myFunction() {
                var table = document.getElementById("myTable");
                var row = table.insertRow(2);

                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);

                var input="<input style='border: 0px none' type='text'>";
                cell1.innerHTML = input;
                cell2.innerHTML = input;
                cell3.innerHTML = input;
                cell4.innerHTML = input;
                cell5.innerHTML = input;
            }

            function myFunction2() {
            var table = document.getElementById("myTable2");
            var row = table.insertRow(2);

            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);

            var input="<input style='border: 0px none' type='text'>";
            cell1.innerHTML = input;
            cell2.innerHTML = input;
            cell3.innerHTML = input;
            cell4.innerHTML = input;
            cell5.innerHTML = input;
            }
</script>
@endsection
