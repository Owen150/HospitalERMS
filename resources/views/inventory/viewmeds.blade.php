@extends('template.main')

@section('title', 'Inventory')

@section('content_title',"Inventory")
@section('content_description',"medicine table")
@section('breadcrumbs')

<ol class="breadcrumb">
    <li><a href="{{route('dash')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
    <li class="active">Here</li>
</ol>
@endsection

<style>
    .edit:hover {
        cursor: pointer;
    }
</style>

@section('main_content')
{{--  issue medicine  --}}


<section class="content">
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Medicine Inventory</h3>
            </div>
            
            <div class="box-body">
                <table id="medTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Actions</th>
                            
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($medicines as $med)
                        
                    
                        <tr>
                            <td>{{$med->name_english}}</td>
                            <td>{{$med->price}}</td>
                            
                            <td>{{$med->qty}}</td>
                            @if ($med->qty < 30)
                                <td><span style="color: red">Low Stock</span></td>
                            @else
                            <td><span class="text-green">Ok Stock</span></td>
                            @endif
                            
                            <td>
                                <i class="fa fa-pencil-square text-success edit" 
                                   style="font-size: 23px; padding-right: 20px;padding-left: 20px;"
                                   data-toggle="modal" data-target="#editMed{{ $med->id }}"
                                ></i>

                                <i class="fa fa-trash edit" 
                                   style="font-size: 23px; color: rgb(216, 2, 2)"
                                   data-toggle="modal" data-target="#deleteMed{{ $med->id }}"
                                ></i>
                                
                            </td>
                            
                        </tr>
                    
                    @endforeach
                
                </tbody>
                
                </table>
            </div>
        
        </div>
    
    </div>
    
</div>
    
</section>

@foreach ($medicines as $med)
<div class="modal fade" id="editMed{{ $med->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('medinventoryupdate', $med->id) }}" method="post">
           @csrf
           @method('PATCH')
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update {{ $med->name_english }}</h5>
                
                </div>
                <div class="modal-body">
                    <label for="">Name</label>
                    <input class="form-control name" type="text" value="{{ $med->name_english }}" name="med_name" required>

                    <br>

                    <label for="">Price</label>
                    <input class="form-control price" type="text" value="{{ $med->price }}" name="med_price" required>
                    
                    <br>

                    <label for="">Quantity</label>
                    <input class="form-control" id="qty" type="text"  name="med_qty" required>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save changes</button>
                </div>
            </div>
        </form>
    </div>
  </div>
@endforeach

<script>

    $(document).ready( function () {
        $('#medTable').DataTable();

        
    } );
    function savePrint(presid){

        var data=new FormData;
        data.append('medid',presid);
        data.append('_token','{{csrf_token()}}');

        $.ajax({
                type: "post",
                url: "{{route('medIssueSave')}}",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                error: function(data){
                    console.log(data);
                },
                success: function (response) {
                  if(response.code==200){
                   $("#btn-print").attr("disabled", "disabled");

                  }
                }
        });
    }

    /*
    function editMedicine(med_id){
        var qty = $('#qty').text();

        console.log(qty);
        
        var data=new FormData;
        data.append('medid',med_id);
        data.append('_token','{{csrf_token()}}');
        data.append('qty', qty);

        $.ajax({
                type: "post",
                url: "",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                error: function(data){
                    console.log(data);
                },
                success: function (response) {
                  if(response.code==200){
                      $("#td-issue-"+med_id).html('<span style="font-size:14px" class="badge bg-green"><i class="fas fa-check"></i> Issued </span>');
                  }
                }
        });
        
        
    }
    */
</script>

@endsection