@extends('template.main')

@section('title', $title)

@section('content_title',"General Statistics & Analytics For The Year ".$year)
@section('breadcrumbs')

<ol class="breadcrumb">
    <li><a href="{{route('dash')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
    <li class="active">Here</li>
</ol>
@endsection

@section('main_content')
<script src="bower_components/chart.js/dist/Chart.js"></script>

@if ($year==date('Y'))

<div class="row mb-1">
    <div class="col-md-12 text-center mt-3 font-weight-bolder">
        <h4 class="font-weight-bolder">Summary For ({{date('F, Y')}})</h4><br>
    </div>
</div>

<div class="row mb-3">

    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('Out Patients')}}</p>
                  <h5 class="font-weight-bolder mb-0">
                    {{$out_patients_this_month}}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                  <i class="ni fas fa-user-injured text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('In Patients')}}</p>
                  <h5 class="font-weight-bolder mb-0">
                    {{$in_patients_this_month}}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                  <i class="ni fas fa-procedures text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('New Patients')}}</p>
                  <h5 class="font-weight-bolder mb-0">
                    {{$new_patient_regs_this_month}}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
                  <i class="ni fas fa-user-injured text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('Total Checkings')}}</p>
                  <h5 class="font-weight-bolder mb-0">
                    {{$total_checkings_this_month}}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
                  <i class="ni fas fa-hospital text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

</div>
@endif

<div class="row mb-4">
    <div class="col-md-12">
        <div class="box box-dark">
            <div class="box-header with-border">
                <h3 class="box-title text-center">Patient Statistics For The Year({{$year}})</h3>
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                            class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body justify-content-center align-items-center">
                <div class="mb-5 justify-content-center align-items-center">
                    <p class="h5 text-center">The graphs below display statistics for the year {{$year}}. To view different years
                        select the
                        year
                        below and submit.</p>
                    <div class="col-md-4 ml-5" style="justify-content: center; align-items:center;">
                        <form class=" form-horizontal ml-5 mb-3 mt-3" method="POST" action="{{route('stats_old')}}">
                            @csrf
                            <label for="year">Select Different Year</label>
                            <div class="input-group align-items-center justify-content-center">
                                <select class="form-control" name="year" id="year">
                                    <option @if($year==2018) selected @endif value="2018">2018</option>
                                    <option @if($year==2019) selected @endif value="2019">2019</option>
                                    <option @if($year==2020) selected @endif value="2020">2020</option>
                                </select>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn bg-gradient-dark mt-0 mb-0">Fetch <i
                                            class="fas fa-arrow-right"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>

                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title text-center">Monthly Outpatients Attendance</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="outPatientMonthlyStat" width="400" height="100"></canvas>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>

                <script>
                    var ctx = document.getElementById("outPatientMonthlyStat").getContext("2d");
                
                var OutPatientData = {
                    labels: ["January", "February", "March","April","May","June","July","August","September","October","November","December"],
                    datasets: [
                        {
                            label: "Male",
                            backgroundColor: "RGBA(0,83,156,0.81)",
                            data: [
                                @php
                                use App\Appointment;
                                $i=1;
                                while($i<13){
                                    echo (Appointment::getMonthCount($year,$i,'Male','OUT'));
                                    echo (",");
                                    $i++;
                                }
                                @endphp
                            ]
                        },
                        {
                            label: "Female",
                            backgroundColor: "RGBA(206,91,120,0.51)",
                            data: [
                                @php
                                $i=1;
                                while($i<13){
                                    echo (Appointment::getMonthCount($year,$i,'Female','OUT'));
                                    echo (",");
                                    $i++;
                                }
                                @endphp
                            ]
                        },
                        {
                            label: "All",
                            backgroundColor: "RGBA(63,191,88,0.82)",
                            data: [
                                @php
                                $i=1;
                                while($i<13){
                                    echo (Appointment::getTotalCount($year,$i,'OUT'));
                                    echo (",");
                                    $i++;
                                }
                                @endphp
                            ]
                        }
                    ]
                };
                
                var outPatientMonthlyStat = new Chart(ctx, {
                    type: 'bar',
                    data: OutPatientData,
                    options: {
                        title:{
                            text:"Monthly Outpatients Overview",
                            display:true,
                            position:'top',
                            fontSize:16,
                        },
                        barValueSpacing: 10,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    min: 0,
                                }
                            }]
                        }
                    }
                });
                </script>

                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-success mt-5">
                            <div class="box-header with-border">
                                <h3 class="box-title text-center">Monthly Inpatients Admissions</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="inPatientMonthlyStat" width="400" height="100"></canvas>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>

                <script>
                    var ctx = document.getElementById("inPatientMonthlyStat").getContext("2d");
                
                var InPatientData = {
                    labels: ["January", "February", "March","April","May","June","July","August","September","October","November","December"],
                    datasets: [
                        {
                            label: "Male",
                            backgroundColor: "RGBA(0,83,156,0.81)",
                            data: [
                                @php
                                $i=1;
                                while($i<13){
                                    echo (Appointment::getMonthCount($year,$i,'Male','IN'));
                                    echo (",");
                                    $i++;
                                }
                                @endphp
                            ]
                        },
                        {
                            label: "Female",
                            backgroundColor: "RGBA(206,91,120,0.51)",
                            data: [
                                @php
                                $i=1;
                                while($i<13){
                                    echo (Appointment::getMonthCount($year,$i,'Female','IN'));
                                    echo (",");
                                    $i++;
                                }
                                @endphp
                            ]
                        },
                        {
                            label: "All",
                            backgroundColor: "RGBA(63,191,88,0.82)",
                            data: [
                                @php
                                $i=1;
                                while($i<13){
                                    echo (Appointment::getTotalCount($year,$i,'IN'));
                                    echo (",");
                                    $i++;
                                }
                                @endphp
                            ]
                        }
                    ]
                };
                
                var inPatientMonthlyStat = new Chart(ctx, {
                    type: 'bar',
                    data: InPatientData,
                    options: {
                        title:{
                            text:"Monthly Inpatients Overview",
                            display:true,
                            position:'top',
                            fontSize:16,
                        },
                        barValueSpacing: 10,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    min: 0,
                                }
                            }]
                        }
                    }
                });
                </script>

                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-success mt-5">
                            <div class="box-header with-border">
                                <h3 class="box-title text-center">Monthly New Patient Registrations</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="newRegsMonthlyStat" width="400" height="100"></canvas>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>


                <script>
                    var ctx = document.getElementById("newRegsMonthlyStat").getContext("2d");
                
                var newRegsMonthlyStat = {
                    labels: ["January", "February", "March","April","May","June","July","August","September","October","November","December"],
                    datasets: [
                        {
                            label: "Male",
                            backgroundColor: "RGBA(0,83,156,0.81)",
                            data: [
                                @php
                                use App\Patients;
                                $i=1;
                                while($i<13){
                                    echo (Patients::regsMonth($year,$i,'Male'));
                                    echo (",");
                                    $i++;
                                }
                                @endphp
                            ]
                        },
                        {
                            label: "Female",
                            backgroundColor: "RGBA(206,91,120,0.51)",
                            data: [
                                @php
                                $i=1;
                                while($i<13){
                                    echo (Patients::regsMonth($year,$i,'Female'));
                                    echo (",");
                                    $i++;
                                }
                                @endphp
                            ]
                        },
                        {
                            label: "All",
                            backgroundColor: "RGBA(63,191,88,0.82)",
                            data: [
                                @php
                                $i=1;
                                while($i<13){
                                    echo (Patients::totalRegs($year,$i));
                                    echo (",");
                                    $i++;
                                }
                                @endphp
                            ]
                        }
                    ]
                };
                
                var newRegsMonthlyStat = new Chart(ctx, {
                    type: 'bar',
                    data: newRegsMonthlyStat,
                    options: {
                        title:{
                            text:"Monthly New Patient Registrations",
                            display:true,
                            position:'top',
                            fontSize:16,
                        },
                        barValueSpacing: 10,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    min: 0,
                                }
                            }]
                        }
                    }
                });
                </script>
            </div>
        </div>
    </div>
</div>


<div class="row mb-4">
    <div class="col-md-12">
        <div class="box box-black mt-5">
            <div class="box-header with-border">
                <h3 class="box-title text-center">Medicines Statistics For The Year {{$year}}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                            class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body mb-3">
                <p class="h6 mb-4 text-center">Below charts show the detailed analysis about medicine usage of the hospital.</p>
                <p class="h6 mb-4 text-center">Change the year above to get analytics of previous years</p>

                <div class="row mt-2">
                    <div class="col-md-6">
                        <div class="box box-success mt-3">
                            <div class="box-header with-border">
                                <h4 class="box-title font-weight-bolder">Most Issued Medicines All Time</h4>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="medicineDougnet" width="400" height="200"></canvas>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box box-success mt-3">
                            <div class="box-header with-border justify-content-center align-items-center">
                                <h4 class="box-title font-weight-bolder">Most Prescribed Medicines ({{date('F, Y')}})</h4>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="medicineDougnetMonth" width="400" height="200"></canvas>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>


<script>
    var ctx = document.getElementById("medicineDougnet").getContext("2d");

    data = {
    datasets: 
    [
        {
            data: 
            [
            @foreach ($top_ten_meds as $medicine)
                @if($medicine->qty>0)
                {{$medicine->qty}},
                @endif
            @endforeach
            ],
            backgroundColor: [
                @foreach ($top_ten_meds as $medicine)
                    @if($medicine->qty>0)
                    "RGBA({{rand(22,210)}},{{rand(54,255)}},{{rand(0,200)}},1)",
                    @endif
                @endforeach
			]
        },

    ],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        
    
    @foreach ($top_ten_meds as $medicine)
        @if($medicine->qty>0)
            '{{$medicine->name_english}}',
        @endif
    @endforeach
        
    ],
    
};


var myDoughnutChart = new Chart(ctx, {
    type: 'doughnut',
    data: data,
    options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
                    display: true,
                    position:'bottom',
                    fontSize:16,
					text: 'Mostly Issued Medicines'
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
});



var ctx = document.getElementById("medicineDougnetMonth").getContext("2d");

medicineDougnetMonth = {
    datasets: 
    [
        {
            data: 
            [
            @foreach ($this_month_meds as $medicine)
                @if($medicine->issues>0)
                {{$medicine->issues}},
                @endif
            @endforeach
            ],
            backgroundColor: [
                @foreach ($this_month_meds as $medicine)
                    @if($medicine->issues>0)
                    "RGBA({{rand(3,180)}},{{rand(0,90)}},{{rand(1,255)}},1)",
                    @endif
                @endforeach
			]
        },

    ],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        
    
    @foreach ($this_month_meds as $medicine)
        @if($medicine->issues>0)
            '{{$medicine->name_english}}',
        @endif
    @endforeach
        
    ],
    
};


var medicineDougnetMonthGraph = new Chart(ctx, {
    type: 'doughnut',
    data: medicineDougnetMonth,
    options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
                    display: true,
                    position:'bottom',
                    fontSize:16,
					text: 'Mostly Issued Medicines'
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
});
</script>

@endsection
@section('custom_style_sheets')
<link rel="stylesheet" href="bower_components/chart.js/dist/Chart.css">
@endsection

@section('optional_scripts')

@endsection