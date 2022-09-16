@extends('template.main')

@section('title', $title)

@section('optional_scripts')
@endsection

@section('content_title',__('Check In Patient'))


@if ($user->user_type == 'consultation')
    @section('content_description',__('Consultation'))  
@endif

@if ($user->user_type == 'dentist')
    @section('content_description',__('Dentist'))  
@endif


@if ($user->user_type == 'doctor')
    @section('content_description',__('Check Patient here and update history from here !'))  
@endif


@if ($user->user_type == 'physiotherapy')
    @section('content_description',__('Check Patient here and update physiotherapy from here !'))  
@endif


@section('breadcrumbs')

<ol class="breadcrumb">
    <li><a href="{{route('dash')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
    <li class="active">Here</li>
</ol>
@endsection
@section('main_content')


<script src="js/typeahead/typeahead.bundle.js"></script>
{{-- <script src="js/typeahead/typeahead.jquery.js"></script> --}}
<script src="js/typeahead/bloodhound.js"></script>


<div id="remove_on_admit">
<div class="row">

    <div class="col-md-6">
        <div style="height:46.5vh;overflow-y:scroll;overflow-x:hidden;" class="mt-2 mb-1 box box-dark">
            <div class="box-header with-border">
                <h3 class="box-title"> <i class="fas fa-notes-medical"></i>&nbsp; InPatient's Details</h3>
            </div>
            <div class="box-body">
                
                <h4>Name : {{$pName}}</h4>
                <h4>Age : {{$pAge}}</h4>
                <h4>Sex : {{$pSex}}</h4>
                
                
                @if ($triage !== null)
                <hr>

                <h3 class="box-title">
                    Triage Results
                </h3>
                <h4>
                    Blood Pressure :
                    <span class="h4 @if ($triage->blood_pressure>130) text-red @elseif ($triage->blood_pressure>125 ) text-yellow @else text-green @endif ">
                        {{ $triage->blood_pressure }} mmHg <small> ({{ $triage->created_at }}) </small>
                    </span>
                </h4>
                
                
                <h4>
                    Weight : <span class="text-green">{{ $triage->weight }} Kg <small> ({{ $triage->created_at }}) </small></span>
                </h4>
                <h4>
                    Temp : <span class="@if ($triage->blood_pressure>130) text-red @elseif ($triage->blood_pressure>125 ) text-yellow @else text-green @endif">{{ $triage->temp }} °C <small> ({{ $triage->created_at }}) </small></span>
                </h4>

                
                @endif

                @if ($medicines !== null)



                @endif
                
             
                @if ($lab !== null)
                    <hr>
                    <h3 class="box-title">
                        Lab Results
                    </h3>

                    @if ($lab->whitebooldcells !== null)
                        <h4>
                            White blood cell (WBC): <span class="text-green">{{ $lab->whitebooldcells }}</span>
                        </h4>
                    @endif

                    @if ($lab->redbooldcells !== null)
                    <h4>
                        Red blood cell (RBC) counts: <span class="text-green">{{ $lab->redbooldcells }}</span>
                    </h4>
                    @endif

                    @if ($lab->prothrombintime !== null)
                    <h4>
                        PT, prothrombin time: <span class="text-green">{{ $lab->prothrombintime }}</span>
                    </h4>
                    @endif

                    @if ($lab->activatedpartialthromboplastin !== null)
                    <h4>
                        APTT, activated partial thromboplastin time: <span class="text-green">{{ $lab->activatedpartialthromboplastin }}</span>
                    </h4>
                    @endif

                    @if ($lab->aspartateaminotransferase !== null)
                    <h4>
                        AST, aspartate aminotransferase: <span class="text-green">{{ $lab->aspartateaminotransferase }}</span>
                    </h4>
                    @endif

                    @if ($lab->alanineaminotransferase !== null)
                    <h4>
                        ALT, alanine aminotransferase: <span class="text-green">{{ $lab->alanineaminotransferase }}</span>
                    </h4>
                    @endif


                    @if ($lab->mlactatedehydrogenase !== null)
                    <h4>
                        LD, lactate dehydrogenase: <span class="text-green">{{ $lab->mlactatedehydrogenase }}</span>
                    </h4>
                    @endif


                    @if ($lab->bloodureanitrogen !== null)
                    <h4>
                        BUN, blood urea nitrogen: <span class="text-green">{{ $lab->bloodureanitrogen }}</span>
                    </h4>
                    @endif

                    @if ($lab->WBCcountWdifferential !== null)
                    <h4>
                        WBC count w/differential: <span class="text-green">{{ $lab->WBCcountWdifferential }}</span>
                    </h4>
                    @endif

                    @if ($lab->Quantitativeimmunoglobulin !== null)
                    <h4>
                        Quantitative immunoglobulin’s (IgG, IgA, IgM): <span class="text-green">{{ $lab->Quantitativeimmunoglobulin }}</span>
                    </h4>
                    @endif

                    @if ($lab->Erythrocytesedimentationrate !== null)
                    <h4>
                        Erythrocyte sedimentation rate (ESR): <span class="text-green">{{ $lab->Erythrocytesedimentationrate }}</span>
                    </h4>
                    @endif
                    

                    @if ($lab->alpha_antitrypsin !== null)
                    <h4>
                        Quantitative alpha-1-antitrypsin (AAT) level: <span class="text-green">{{ $lab->alpha_antitrypsin }}</span>
                    </h4>
                    @endif


                    @if ($lab->Reticcount !== null)
                    <h4>
                        Retic count: <span class="text-green">{{ $lab->Reticcount }}</span>
                    </h4>
                    @endif

                    @if ($lab->arterialbloodgasses !== null)
                    <h4>
                        Arterial blood gasses (ABGs): <span class="text-green">{{ $lab->arterialbloodgasses }}</span>
                    </h4>
                    @endif
                    
                    
                @endif

                

                @if ($imaging_radiology !== null)
                    <hr>

                    <h3 class="box-title">
                        Radiology/Imaging Results
                    </h3>

                    @if ($imaging_radiology->ct_scan !== null)
                    <h4>
                        CT Scan: <span class="text-green">{{ $imaging_radiology->ct_scan }}</span>
                    </h4>
                    @endif


                    @if ($imaging_radiology->x_ray !== null)
                    <h4>
                        X-Ray: <span class="text-green">{{ $imaging_radiology->x_ray }}</span>
                    </h4>
                    @endif

                    @if ($imaging_radiology->ultra_sound !== null)
                    <h4>
                        Ultra Sound: <span class="text-green">{{ $imaging_radiology->ultra_sound }}</span>
                    </h4>
                    @endif

                    @if ($imaging_radiology->mri !== null)
                    <h4>
                        MRI: <span class="text-green">{{ $imaging_radiology->mri }}</span>
                    </h4>
                    @endif

                    @if ($imaging_radiology->pet_scan !== null)
                    <h4>
                        PET Scan: <span class="text-green">{{ $imaging_radiology->pet_scan }}</span>
                    </h4>
                    @endif
                    <br>
                    

                @endif

                

                @if ($dialysis !== null)
                <hr>
                    <h3 class="box-title">
                        Dialysis Results
                    </h3>
                    <h4>
                        Findings: <span class="text-green">{{ $dialysis->findings }}</span>
                    </h4>
                    <h4>
                        Recommendation: <span class="text-green">{{ $dialysis->Recommendation }}</span>
                    </h4>
                @endif
                
                

                

                

                @if ($theatre !== null)
                <hr>
                    <h3 class="box-title">
                        Theatre Results
                    </h3>
                    <h4>
                        Findings: <span class="text-green">{{ $theatre->findings }}</span>
                    </h4>
                    <h4>
                        Recommendation: <span class="text-green">{{ $theatre->recommendation }}</span>
                    </h4>
                @endif
                {{--
                    @if ($pBloodPressure->flag)
                <h4>Blood Pressure : <span
                        class="h4 @if ($pBloodPressure->sys>130 || $pBloodPressure->dia>90) text-red @elseif ($pBloodPressure->sys>125 || $pBloodPressure->dia>85) text-yellow @else text-green @endif ">
                        {{$pBloodPressure->sys}}/{{$pBloodPressure->dia}}
                        mmHg</span><small> (Updated
                        {{explode(" ",$pBloodPressure->date)[0]}})</small></h4>
                @endif
                @if($pBloodSugar->flag)
               
                <h4>Blood Glucose Levels : <span
                        class="h4 @if($pBloodSugar->value > 72 && $pBloodSugar->value<100) text-green @else text-red @endif">{{$pBloodSugar->value}}
                        mg/dL</span><small> (Updated
                        {{explode(" ",$pBloodSugar->date)[0]}})</small></h4>
                @endif

                @if ($pCholestrol->flag)
                <h4>General Cholestrol Level : <span
                        class="h4 @if($pCholestrol->value>220) text-red @elseif($pCholestrol->value>200) text-yellow @else text-green @endif">{{$pCholestrol->value}}
                        mg/dL</span><small>
                        (Updated {{explode(" ",$pCholestrol->date)[0]}})</small></h4>
                @endif
                --}}
                <div class="row mt-2 mb-0 pb-0">
                    <div class="col-md-3 mt-2 mb-0 pb-0">
                        <button onclick="window.open('{{route('patientHistory',$pid)}}','myWin','scrollbars=yes,width=720,height=690,location=no').focus();" class="btn btn-info">
                            View Patient History
                        </button>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>



    <!-- /.modal -->

    <div class="rounded col-md-6">

        <div style="height:46.5vh;" class="box box-dark mb-1 mt-2">
            <div class="box-header with-border">
                Add Medicines To Prescription
            </div>
            <div class="box-body">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-md-5 m-0 p-0">
                            <div id="bloodhound">
                                <input oninput="console.log(this.value);" id="medSearch" class="form-control"
                                    type="text" placeholder="Search Medicines">
                            </div>
                        </div>
                        <div class="col-md-7 m-0 p-0">
                            <input onkeydown="addMed(event,this)" id="medNote" disabled type="text" class="form-control"
                                placeholder="Notes">
                        </div>
                        <div id="suggestionList"></div>
                    </div>
                </div>


                <div style="height:30vh;overflow-y: scroll">
                    <table style="width:100%" id="medTable" class="table table-sm table-bordered w-100">

                        <colgroup>
                            <col span="1" style="width: 10%;">
                            <col span="1" style="width: 40%;">
                            <col span="1" style="width: 30%;">
                            <col span="1" style="width: 20%;">
                        </colgroup>

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Medicine</th>
                                <th>Notes</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="m-0 p-0">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script>
        var medicines=[];
        var patient_id={{$pid}};
        var app_num={{$appNum}};

        $(document).ready(function () {
            if(sessionStorage.getItem('app')=={{$appNum}}){
                console.log(sessionStorage.getItem("medicines"));
                sessionStorage.setItem('app',{{$appNum}});
                if(sessionStorage.getItem("medicines")){
                medicines=JSON.parse(sessionStorage.getItem("medicines"));
                medTableUpdate();
                $("#diagnosys").val(sessionStorage.getItem('diagnosys'));
                $("#cholestrol").val(sessionStorage.getItem('cholestrol'));
                $("#glucose").val(sessionStorage.getItem('glucose'));
                $("#pressure").val(sessionStorage.getItem('pressure'));
                console.log("Found");
                }else{
                console.log("not found");
                return;
                }
            }
            sessionStorage.setItem('app',{{$appNum}});

            $("#diagnosys").change(function (e) { 
                var diag=$("#diagnosys").val();
                sessionStorage.setItem('diagnosys',diag)
            });

            $("#cholestrol").change(function (e) { 
                sessionStorage.setItem('cholestrol',$("#cholestrol").val());
            });

            $("#glucose").change(function (e) { 
                sessionStorage.setItem('glucose',$("#glucose").val());
            });
            $("#pressure").change(function (e) { 
                sessionStorage.setItem('pressure',$("#pressure").val());
            });
         });

        function addMed(e,obj) { 
            var note=obj.value;
            var med=$("#medSearch").val();
            if(e.keyCode === 13){
                e.preventDefault();
                var id = Math.floor(1000 + Math.random() * 9000); 
                var med={id:id,name:med,note:note}
                medicines.push(med);
                medTableUpdate();
                $("#medSearch").val('');
                $("#medSearch").focus();
                $('#medSearch').typeahead('val', '');
                $('#medSearch').typeahead('close');

                $("#medNote").val('');
                $("#medNote").attr('disabled', 'disabled');
            }else if(e.keyCode===9){
                e.preventDefault();
            }
         }

         function medTableUpdate() {
            medicines = medicines.filter(function (el) {
            return el != null;
            });
            sessionStorage.setItem("medicines", JSON.stringify(medicines));
            $("#medTable tbody tr").remove();
            var count=1
             medicines.forEach(element => {
                $('#medTable > tbody:last-child').append('<tr><td>'+count+'</td><td>'+element.name+'</td><td>'+element.note+'</td><td><div class="btn-group"><button onclick="delMed('+element.id+')" style="height:28px;" type="button" class="m-0 btn btn-danger btn-sm btn-flat"><i class="far fa-trash-alt"></i></button><button style="height:28px;" onclick="editMed('+element.id+')" type="button" class="btn m-0 btn-warning btn-sm btn-flat"><i class="far fa-edit"></i></button></div></td></tr>');
                count++;
             });
         }

         function editMed(id){
             $("#medSearch").val()
             count=0;
             medicines.forEach(element=>{
                if(element.id==id){
                    $("#medSearch").val(element.name);
                    $("#medNote").removeAttr("disabled");
                    $("#medNote").val(element.note);
                    $("#medNote").focus();
                    delMed(id);
                    return;
                }
                count++;
            })
         }

         function delMed(id){
            medicines = medicines.filter(function (el) {
            return el != null;
            });
            console.log(id);
            count=0;
            medicines.forEach(element=>{
                if(element.id==id){
                    delete medicines[count];
                    medTableUpdate();
                    return;
                }
                count++;
            })
         }

            
            var states = [
                @foreach($medicines as $med)
                    '{{ucWords($med->name_english)}}',
                @endforeach
            ];
        
            var states = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                // `states` is an array of state names defined in "The Basics"
                local: states
            });

      
    
            $('#bloodhound #medSearch').typeahead({
                hint: true,
                highlight: true,
                minLength: 2
            }, {
                name: 'states',
                source: states
            });
    
            $('#medSearch').bind('typeahead:select', function(ev, suggestion) {
                $("#medNote").removeAttr("disabled");
                $("#medNote").focus();
                // 

            });
    </script>

</div>

<div class="row">
    <div class="col-md-12">
        <div class="box mt-2 box-dark">
            <div class="box-header with-border">
                <p class="h4 m-0">In Patient</p>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Doctor Note</label>
                            <input type="text" class="form-control">
                            <br>
                            <label for="">Current Department</label>

                            <input type="text" class="form-control">

                            <br>
                            <label for="">Ward</label>

                            <input type="text" class="form-control">

                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                   
                    <div class="p-2 mt-5 ml-1 mr-1">
                        
                        <button type="button"  class="btn btn-block btn-info btn-lg" data-toggle="modal" data-target="#lab">Send to
                            Lab</button>
                        <br>
                        <button type="button" class="btn btn-block btn-info btn-lg" data-toggle="modal" data-target="#radiology">Send to
                            Radiology</button>
                        <br>
                        <button type="button" class="btn btn-block btn-info btn-lg" data-toggle="modal" data-target="#counselling">Send To
                            HDU</button>
                        <br>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-2 mt-5 ml-1 mr-1">
                        <button type="button"  class="btn btn-block btn-info btn-lg" data-toggle="modal" data-target="#lab">Send to
                            Phlembotomy</button>
                        <br>
                        <button type="button" class="btn btn-block btn-info btn-lg" data-toggle="modal" data-target="#radiology">Send to
                            Dialysis Unit</button>
                        <br>
                        <button type="button" class="btn btn-block btn-info btn-lg" data-toggle="modal" data-target="#counselling">Send To
                            Physiotherapy</button>
                        <br>
                        
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="p-2 mt-5 ml-1 mr-1">
                        
                        <button  type="button" class="btn btn-block btn-info btn-lg">Send To Theatre</button>
                       

                        <br>
                        <button  type="button" class="btn btn-block btn-info btn-lg">Send To Triage</button>
                        <br>

                        <button type="button" onclick="submit()" class="btn btn-block btn-success btn-lg">Save &
                            Next</button>
                        
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="lab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document" style="width: 60vw">
      <div class="modal-content">
        <form action="{{ route('measures') }}" method="POST">
            @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Test For</h5>
          
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="White blood cell (WBC)" id="defaultCheck1" name="whitebooldcells">
                        <label class="form-check-label" for="defaultCheck1">
                            White blood cell (WBC)
                        </label>
                      </div>
        
                      <br>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="red blood cell (RBC) counts" id="defaultCheck1" name="redbooldcells">
                        <label class="form-check-label" for="defaultCheck1">
                            red blood cell (RBC) counts
                        </label>
                      </div>
                      <br>
        
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="PT, prothrombin time" id="defaultCheck1" name="prothrombintime">
                        <label class="form-check-label" for="defaultCheck1">
                            PT, prothrombin time
                        </label>
                      </div>
                      <br>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="APTT, activated partial thromboplastin time" id="defaultCheck1" name="activatedpartialthromboplastin">
                        <label class="form-check-label" for="defaultCheck1">
                            APTT, activated partial thromboplastin time
                        </label>
                      </div>
                      <br>
        
        
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="AST, aspartate aminotransferase" id="defaultCheck1" name="aspartateaminotransferase">
                        <label class="form-check-label" for="defaultCheck1">
                            AST, aspartate aminotransferase
                        </label>
                      </div>
                      <br>
        
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="ALT, alanine aminotransferase" id="defaultCheck1" name="alanineaminotransferase">
                        <label class="form-check-label" for="defaultCheck1">
                            ALT, alanine aminotransferase
                        </label>
                      </div>

                      <br>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="LD, lactate dehydrogenase" id="defaultCheck1" name="mlactatedehydrogenase">
                        <label class="form-check-label" for="defaultCheck1">
                            LD, lactate dehydrogenase
                        </label>
                      </div>
                      <br>
        
        
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="BUN, blood urea nitrogen" id="defaultCheck1" name="bloodureanitrogen">
                        <label class="form-check-label" for="defaultCheck1">
                            BUN, blood urea nitrogen
                        </label>
                      </div>
                      <br>
        
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="WBC count w/differential" id="defaultCheck1" name="WBCcountWdifferential">
                        <label class="form-check-label" for="defaultCheck1">
                            WBC count w/differential
                        </label>
                      </div>

                </div>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Quantitative immunoglobulin’s (IgG, IgA, IgM)" id="defaultCheck1" name="Quantitativeimmunoglobulin">
                        <label class="form-check-label" for="defaultCheck1">
                            Quantitative immunoglobulin’s (IgG, IgA, IgM)
                        </label>
                      </div>
                      <br>
        
        
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Erythrocyte sedimentation rate (ESR)" id="defaultCheck1" name="Erythrocytesedimentationrate">
                        <label class="form-check-label" for="defaultCheck1">
                            Erythrocyte sedimentation rate (ESR)
                        </label>
                      </div>
                      <br>
        
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Quantitative alpha-1-antitrypsin (AAT) level" id="defaultCheck1" name="alpha_antitrypsin">
                        <label class="form-check-label" for="defaultCheck1">
                            Quantitative alpha-1-antitrypsin (AAT) level
                        </label>
                      </div>
                      <br>


                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Retic count" id="defaultCheck1" name="Reticcount">
                        <label class="form-check-label" for="defaultCheck1">
                            Retic count
                        </label>
                      </div>

                      <br>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Arterial blood gasses (ABGs)" id="defaultCheck1" name="arterialbloodgasses">
                        <label class="form-check-label" for="defaultCheck1">
                            Arterial blood gasses (ABGs)
                        </label>
                      </div>
                </div>

            </div>
            


              <input type="hidden" name="patient_id" value="{{ $patient->id }}">
              <input type="hidden" name="app_id" value="{{$appID}}">
              <input type="hidden" name="sendto" value="lab">

            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Send</button>
        </div>
        </form>
      </div>
    </div>
</div>




<div class="modal fade" id="radiology" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <form action="{{route('radiologymeasures')}}" method="POST">
        @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="CT Scan" id="defaultCheck1" name="ct_scan">
                <label class="form-check-label" for="defaultCheck1">
                    CT Scan
                </label>
            </div>
            <br>


            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="X-Ray" id="defaultCheck1" name="x_ray">
                <label class="form-check-label" for="defaultCheck1">
                    X-Ray
                </label>
            </div>

            <br>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Ultra Sound" id="defaultCheck1" name="ultra_sound">
                <label class="form-check-label" for="defaultCheck1">
                    Ultra Sound
                </label>
            </div>

            <br>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="mri" id="defaultCheck1" name="mri">
                <label class="form-check-label" for="defaultCheck1">
                    MRI
                </label>
            </div>

            <br>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="PET Scan" id="defaultCheck1" name="pet_scan">
                <label class="form-check-label" for="defaultCheck1">
                    PET Scan
                </label>
            </div>
            
            <br>

            <input type="hidden" name="patient_id" value="{{ $patient->id }}">
            <input type="hidden" name="app_id" value="{{$appID}}">
            <input type="hidden" name="sendto" value="radiology and imaging">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
    </div>
</div>

</div>







<script>
    var inpatient='{{$inpatient}}';

    $("#reginpatient2form").hide(1000);
    $("#some").hide(1000);
    console.log({{$pid}});

    function removeinfo() {
        $("#remove_on_admit").show(1000);
        $("#reginpatient2form").hide(1000);
    }

    function myfunc() {
        console.log('iii');
        var data=new FormData;
            data.append('pNum',{{$pid}});
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

                        $("#remove_on_admit").hide(1000);
                        $("#reginpatient2form").show(1000);

                    }else{
                        console.log('not found');
                        alert("Please Enter a Valid Admitted Patient Registration Number or Appointment Number!");
                    }
                }
            })
        
    }

    

    function admitPatient(status){
        bootbox.confirm({
            title:"<h2>Confirm Admit Patient</h2>",
            message: "<p>This Will Make This Patient(Out Patient) an Inpatient.<br>Press Admit Patient To Admit The Patient.<br>Note:This Action Cannot Be Undone.</p>",
            buttons: {
                confirm: {
                    label: 'Admit Patient',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if(result){
                    var data=new FormData;
                    data.append('_token','{{csrf_token()}}');
                    data.append('admit',status);
                    data.append('pid',{{$pid}});
                    data.append('app_num',{{$appNum}});
                    $.ajax({
                        type: "POST",
                        url: "{{route('markInPatient')}}",
                        processData: false,
                        contentType: false,
                        cache: false,
                        data:data,
                        success: function (response) {
                            //console.log('success');
                            //console.log(response);
                            if(response.success){
                                $("#admit-btn").attr('disabled','disabled');
                                $("#admit-btn").text("Patient Admitted");
                                $("#admit-btn").removeClass('btn-warning');
                                $("#admit-btn").addClass('btn-primary');
                            }else{
                                $("#admit-btn").attr('disabled','disabled');
                                $("#admit-btn").text("Error Occured");
                                $("#admit-btn").removeClass('btn-warning');
                                $("#admit-btn").addClass('btn-danger');
                            }
                        },
                        error: function(data){
                            //console.log('error occured');
                            //console.log(data);
                            $("#admit-btn").attr('disabled','disabled');
                            $("#admit-btn").text("Error Occured");
                            $("#admit-btn").removeClass('btn-warning');
                            $("#admit-btn").addClass('btn-danger');
                            bootbox.alert({
                                title:"Error Occured On Admit Patient",
                                message: "Error Occured! Try Later."+data,
                                backdrop: true
                            });
                        },
                    });
                }
            }
        });
        
    }

    /*
    function validate(){
        var diag=$('textarea').val();
        var pressure=$('#pressure').val();
        var cholestrol=$('#cholestrol').val();
        var glucose=$('#glucose').val();
        if(diag.length<5){
            $('textarea').addClass('border-danger');
            diag=false;
        }else{
            $('textarea').removeClass('border-danger');
            diag=true;
        }
        if($('#pressure').val()==""){
            pressure=true;
           
        }
        if($('#cholestrol').val()==""){
            cholestrol=true;
        }
        if($('#glucose').val()==""){
            glucose=true;   
        }

        if(cholestrol){
            $('#cholestrol').removeClass('border-danger');
        }else{
            $('#cholestrol').addClass('border-danger');
        }

        if(glucose){
            $('#glucose').removeClass('border-danger');
        }else{
            $('#glucose').addClass('border-danger');
        }

        if(pressure){
            $('#pressure').removeClass('border-danger');
        }else{
            $('#pressure').addClass('border-danger');
        }

        if(pressure && cholestrol && glucose && diag){
            return true;
        }else{
            return false;
        }
    }

    */
    function submit(){
        
            bootbox.confirm({
                title:"<h2>Done With Appointment</h2>",
                message: "<p>This will finish the Appointment for the patient.<br>No changes can be done to the prescription after saving.<br>Please check your actoin before comfirm.<br>Note:This Action Cannot Be Undone.</p>",
                buttons: {
                    confirm: {
                        label: 'Confirm Save',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'Cancel',
                        className: 'btn-danger'
                    }
                },
                callback:function(result){
                    if (result) {
                        window.scrollTo(0,0);
                        var diag=$('textarea').val();
                        

                        if ("{{ $user->user_type}}" == 'doctor_dentist') {
                            var amount = 1000;
                            var billing_for = "dentist";
                        }

                        if ("{{ $user->user_type}}" == 'doctor_consultation') {
                            var amount = 1500;
                            var billing_for = "consultation";
                        }

                        if ("{{ $user->user_type}}" == 'doctor') {
                            var amount = 1500;
                            var billing_for = "consultation";
                        }

                        if ("{{ $user->user_type}}" == 'admin') {
                            var amount = 1500;
                            var billing_for = "consultation";
                        }
                        
                        
                        var payment_method = 'cash';
                        var completed = 'no';
                        var data={
                            _token:'{{csrf_token()}}',
                            patient_id:patient_id,
                            appointment_num:app_num,
                            appointment_id:{{$appID}},
                            medicines:medicines,
                            //diagnosis:diag,
                            amount: amount,
                            billing_for:billing_for,
                            payment_method: payment_method,
                            completed: completed,
                            department: 'ward'
                        };
                        $.ajax({
                            type: "POST",
                            url: "{{route('checksaveinpatient')}}",
                            processData: false,
                            contentType: "application/json",
                            cache: false,
                            data:JSON.stringify(data),
                            success: function (response) {
                                if(response==200){
                                    clearAll();
                                    window.location.replace("{{route('checkinpatientsearch')}}");
                                }
                            },
                            error: function(response){
                                bootbox.alert({
                                    title:"Error Occured On Save",
                                    message: "Error Occured! Try Later."+response,
                                    backdrop: true
                                });
                            },
                        });

                    };
        
                }
            });
    
    }

    function clearAll(){
        medicines=[];
        medTableUpdate();
        sessionStorage.clear();
        $('input').val("");
        $('textarea').val("");
    }
</script>



@endsection

@section('custom_styles')
.typeahead,
.tt-query,
.tt-hint {
width: 100%;
height: 100%;
{{-- padding: 8px 12px; --}}
{{-- font-size: 24px; --}}
{{-- line-height: 30px; --}}
border: 2px solid #ccc;
-webkit-border-radius: 8px;
-moz-border-radius: 8px;
border-radius: 8px;
outline: none;
}

.typeahead {
background-color: #fff;
}

.typeahead:focus {
border: 2px solid #0097cf;
}

.tt-query {
-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
-moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}

.tt-hint {
color: #999
}

.tt-menu {
width:100% ;
margin: 3px 0;
padding: 8px 0;
background-color: #fef;
border: 1px solid #ccc;
border: 1px solid rgba(0, 0, 0, 0.2);
-webkit-border-radius: 2px;
-moz-border-radius: 2px;
border-radius: 2px;
-webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
-moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
box-shadow: 0 5px 10px rgba(0,0,0,.2);
}

.tt-suggestion {
padding: 3px 20px;
font-size: 15px;
line-height: 20px;
}

.tt-suggestion:hover {
cursor: pointer;
color: #fff;
background-color: #0097cf;
}

.tt-suggestion.tt-cursor {
color: #fff;
background-color: #0097cf;

}

.tt-suggestion p {
margin: 0;
}

@endsection