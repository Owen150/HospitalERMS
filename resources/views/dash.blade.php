@extends('template.main')

@section('title', $title)


@section('content_title',__("Dashboard"))
@section('content_description',__("Operate All The Things Here"))
@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="#"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
    <li class="active">Here</li>
</ol>

@endsection

@section('main_content')

<div class="row">
  
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('Doctors')}}</p>
                <h5 class="font-weight-bolder mb-0">
                  {{$doctorcnt}}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
                <i class="ni fas fa-user-md text-lg opacity-10" aria-hidden="true"></i>
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
                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('Dentist')}}</p>
                <h5 class="font-weight-bolder mb-0">
                  {{$generalcnt}}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
                <i class="ni fas fa-id-card-alt text-lg opacity-10" aria-hidden="true"></i>
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
                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('Pharmacists')}}</p>
                <h5 class="font-weight-bolder mb-0">
                  {{$pharmacistcnt}}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                <i class="ni fas fa-briefcase-medical text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('In Patients')}}</p>
                <h5 class="font-weight-bolder mb-0">
                  {{$inpatientcnt}}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
                <i class="ni fas fa-user-injured text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--End of First Info Row-->

  <div class="row mt-4">
    <div class="col-lg-7 mb-lg-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-lg-6">
              <div class="d-flex flex-column h-100">
                <p class="mb-1 pt-2 text-bold">Kenya Prisons Service</p>
                <h5 class="font-weight-bolder">Wanini Kireri Magereza EMR</h5>
                <p class="mb-5">From colors, cards, typography to complex elements, you will find the full documentation.</p>
                <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                  Read More
                  <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
              <div class="bg-gradient-primary border-radius-lg h-100">
                <img src="{{ asset('assets/img/shapes/waves-white.svg') }}" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                <div class="position-relative d-flex align-items-center justify-content-center h-100">
                  <img class="w-100 position-relative z-index-2 pt-4" src="./images/WKMHLogo.png" alt="rocket">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-5">
      <div class="card h-100 p-3">
        <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('./images/bg5.jpg');">
          <span class="mask bg-gradient-dark"></span>

          <!--
          <div class="box-header">
            <p class="mb-1 pt-2 text-bold">{{__('Quick Reports')}}</p>
          </div>
          -->

          <div class="card-body list-group position-relative z-index-1 d-flex flex-column h-100 p-3">
            @if(Auth::user()->user_type=='doctor' || Auth::user()->user_type=='admin')
            <a href="{{route('mon_stat_report')}}" class="list-group-item bg-danger text-center list-group-item-action btn btn-danger">
              {{ __('Monthly Statistic Report')}}
            </a>
            @endif
            @if(Auth::user()->user_type=='doctor' || Auth::user()->user_type=='admin')
            <a href="{{route('stats')}}" class="list-group-item bg-warning text-center mt-4 list-group-item-action btn btn-warning">
                {{__('Statistics')}}
            </a>
            @endif

            <a href="{{route('attendance_report')}}"
                class="list-group-item bg-success text-center mt-4 list-group-item-action btn btn-success">
                {{__('Attendance Report')}}
            </a>
          </div>

        </div>
      </div>
    </div>

  </div>
  <div class="row mt-4 justify-content-center align-items-center">

    <!-- Input Auth Pages-->
    <div class="col-lg-10 mt-4">
        <div class="card z-index-2">
          <div class="card-header pb-0 text-center">
            <h5>Quick Links</h5>
          </div>
          <div class="card-body p-3">
            <!-- Input Items-->
            <div class="row">
              <!-- Quick Links Items for All Users except Pharmacists e.g Doctor, SuperAdmin, lab, cashier etc-->
              @if(Auth::user()->user_type!='pharmacist')
                  <div class="col-sm-2">
                      <a href="{{route('patient')}}" class="btn btn-app" style="width: 110px; height: 10vh;">
                        {{__('Register out-patient')}}
                      </a>
                  </div>

                  <div class="col-sm-2">
                      <a href="{{route('searchPatient')}}" class="btn btn-app" style="width: 110px; height: 10vh;">
                        {{__('Search Patient')}}
                      </a>
                  </div>

                  <div class="col-sm-2">
                      <a href="{{route('register_in_patient_view')}}" class="btn btn-app" style="width: 110px; height: 10vh;">
                        {{__('Register in-Patient')}}
                      </a>
                  </div>

                  @if(Auth::user()->user_type!='general')
                  <div class="col-sm-2">
                      <a href="{{route('check_patient_view')}}" class="btn btn-app" style="width: 110px; height: 10vh;">
                        {{__('Check Patient')}}
                      </a>
                  </div>
                  @endif
              
                  <div class="col-sm-2">
                      <a href="{{route('create_channel_view')}}" class="btn btn-app" style="width: 110px; height: 10vh;">
                        {{__('Create Appointment')}}
                      </a>
                  </div>
              @endif

              <!-- Quick Links Items for Pharmacists -->
              @if(Auth::user()->user_type=='pharmacist' || Auth::user()->user_type=='admin')
              <div class="col-sm-2">
                  <a href="{{route('issueMedicineView')}}" class="btn btn-app" style="height: 10vh;">
                    {{__('Issue Medicine')}}
                  </a>
              </div>
              @endif

          </div>

          <!--Additional Quick Links Items for Super Admin-->
          <div class="row mt-4 mb-2">
              @if(Auth::user()->user_type=='admin')
              <!-- ./col -->
              <div class="col-sm-2">
                  <a href="{{route('newuser')}}" class="btn btn-app" style="width: 110px; height: 10vh;">
                    {{__('Register User')}}
                  </a>
              </div>

              <div class="col-sm-2">
                  <a href="{{route('regfinger')}}" class="btn btn-app" style="width: 110px; height: 10vh;">
                    {{__('Register Fingerprints')}}
                  </a>
              </div>

              <div class="col-sm-2">
                  <a href="{{route('resetuser')}}" class="btn btn-app" style="width: 110px; height: 10vh;">
                    {{__('Reset Users')}}
                  </a>
              </div>
              @endif

              <div class="col-sm-2">
                  <a href="{{route('profile')}}" class="btn btn-app" style="width: 110px; height: 10vh;">
                    {{__('User Profile')}}
                  </a>
              </div>

              @if(Auth::user()->user_type=='admin')
              <div class="col-sm-2">
                  <a href="{{route('createnoticeview')}}" class="btn btn-app" style="width: 110px; height: 10vh;">
                    {{__('Notices')}}
                  </a>
              </div>
              @endif
          </div>
          </div>
        </div>
      </div>

  <div class="row mt-4">
    <div class="col-lg-8 col-md-6 mb-md-0 mt-4 mb-4">
      <div class="card">
        <div class="card-header pb-0">
          <div class="row">
            <div class="col-lg-6 col-7">
              <h6>Noticeboard</h6>
            </div>
          </div>
        </div>
        <!--End of Card Header-->
        <div class="card-body px-0 pb-2">
          @foreach ($notices as $note)
          <div class="list-group">
              <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="d-flex w-100 justify-content-between">
                      <b>
                          <h4 class="mb-1">{{$note->subject}}</h4>
                      </b>
                      <small>{{$note->time}}</small>
                  </div>
                  <p class="mb-1">{{$note->description}}</p>
                  <small>By {{$note->name}} ({{$note->user_type}})</small>
              </a>
          </div>
          @endforeach
          @if (count($notices)==0)
          <h3 class="text-center"><i class="fas fa-angle-double-left"></i>..........Empty..........<i
                  class="fas fa-angle-double-right"></i></h3>
          @endif
        </div>
        <!--End of Card Body-->
      </div>
    </div>

    <div class="col-lg-4 col-md-6 mt-4">
      <div class="card h-100">
        <div class="card-header pb-0">
          <h6>Calendar</h6>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <!-- button with a dropdown -->
            <div class="btn-group">
                <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                </ul>
            </div>
            <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>  
            <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
            </button>
        </div>
        <!-- /. tools -->
        </div>
        <div class="card-body no-padding">
          <!--The calendar -->
          <div id="calendar" style="width: 100%"></div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('optional_scripts')
<script>
    // The Calender
    $('#calendar').datepicker();
</script>
@endsection
