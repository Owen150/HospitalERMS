@extends('template.main')

@section('title', $title)

@section('content_title',__("Cashier"))
@section('content_description')
<button class="btn btn-success" onclick="window.print()">Print Receipt</button>
@endsection

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="#"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
    <li class="active">Here</li>
</ol>

@endsection

@section('main_content')

<style>
    .text-danger strong {
        	color: #9f181c;
		}
		.receipt-main {
			background: #ffffff none repeat scroll 0 0;
			border-bottom: 12px solid #333333;
			border-top: 12px solid #9f181c;
			margin-top: 50px;
			margin-bottom: 50px;
			padding: 40px 30px !important;
			position: relative;
			box-shadow: 0 1px 21px #acacac;
			color: #333333;
			font-family: open sans;
		}
		.receipt-main p {
			color: #333333;
			font-family: open sans;
			line-height: 1.42857;
		}
		.receipt-footer h1 {
			font-size: 15px;
			font-weight: 400 !important;
			margin: 0 !important;
		}
		.receipt-main::after {
			background: #414143 none repeat scroll 0 0;
			content: "";
			height: 5px;
			left: 0;
			position: absolute;
			right: 0;
			top: -13px;
		}
		.receipt-main thead {
			background: #414143 none repeat scroll 0 0;
		}
		.receipt-main thead th {
			color:#fff;
		}
		.receipt-right h5 {
			font-size: 16px;
			font-weight: bold;
			margin: 0 0 7px 0;
		}
		.receipt-right p {
			font-size: 12px;
			margin: 0px;
		}
		.receipt-right p i {
			text-align: center;
			width: 18px;
		}
		.receipt-main td {
			padding: 9px 20px !important;
		}
		.receipt-main th {
			padding: 13px 20px !important;
		}
		.receipt-main td {
			font-size: 13px;
			font-weight: initial !important;
		}
		.receipt-main td p:last-child {
			margin: 0;
			padding: 0;
		}	
		.receipt-main td h2 {
			font-size: 20px;
			font-weight: 900;
			margin: 0;
			text-transform: uppercase;
		}
		.receipt-header-mid .receipt-left h1 {
			font-weight: 100;
			margin: 34px 0 0;
			text-align: right;
			text-transform: uppercase;
		}
		.receipt-header-mid {
			margin: 24px 0;
			overflow: hidden;
		}
		
		#container {
			background-color: #dcdcdc;
		}
</style>

{{--
<div class="row">
    <div class="col-xs-1"></div>
    <div class="col-xs-10">
        <div class="box box-info">
            
            <!-- /.box-header -->
            <div class="box-body">
                <button class="btn btn-success" onclick="window.print()">Print Receipt</button>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-xs-1"></div>
    <!-- /.col -->
</div>
--}}





<div class="col-md-12">   
    <div class="row">
           
           <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3" id="receipt_main">
               <div class="row">
                   <div class="receipt-header">
                       <div class="col-xs-6 col-sm-6 col-md-6">
                           <div class="receipt-left">
                               <img class="img-responsive" alt="iamgurdeeposahan" src="" style="width: 71px; border-radius: 43px;">
                           </div>
                       </div>
                       <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                           <div class="receipt-right">
                               <h5>WKMH</h5>
                               <p>0700 000 000<i class="fa fa-phone"></i></p>
                               <p>wkmh@gmail.com <i class="fa fa-envelope-o"></i></p>
                               <p>KENYA <i class="fa fa-location-arrow"></i></p>
                           </div>
                       </div>
                   </div>
               </div>
               
               <div class="row">
                   <div class="receipt-header receipt-header-mid">
                       <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                           <div class="receipt-right">
                               <h5>{{ $search_result[0]->name }}</h5>
                               <p><b>Mobile :</b> {{ $search_result[0]->telephone }}</p>
                               <p><b>Email :</b> {{ $search_result[0]->name }}</p>
                              
                           </div>
                       </div>
                       <div class="col-xs-4 col-sm-4 col-md-4">
                           <div class="receipt-left">
                               <h3>INVOICE # 102</h3>
                           </div>
                       </div>
                   </div>
               </div>
               
               <div>
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th>Payment for</th>
                               <th>Amount</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach ($billing as $bill)
                               
                          
                           <tr>
                               <td class="col-md-9">{{ $bill->billing_for }}</td>
                               <td class="col-md-3"><label for="">KSH</label><input type="number" class="form-control" readonly name="" value="{{ $bill->amount }}" id="amount"></td>
                           </tr>
                           @endforeach
                           <tr>
                               <td class="text-right">
                               <p>
                                   <strong>Total Amount: </strong>
                               </p>
                               
                               </td>
                               <td>
                               <p>
                                   <strong id="t_amount"></strong>
                               </p>
                               
                               </td>
                           </tr>
                           <tr>
                              
                               <td class="text-right"><h2><strong>Total: </strong></h2></td>
                               <td class="text-left text-success"><h2><strong id="t_amounts"></strong></h2></td>
                           </tr>
                       </tbody>
                   </table>
               </div>
               
               <div class="row">
                   <div class="receipt-header receipt-header-mid receipt-footer">
                       <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                           <div class="receipt-right">
                               <p><b>Date :</b> </p>
                               
                           </div>
                       </div>
                       <div class="col-xs-4 col-sm-4 col-md-4">
                           <div class="receipt-left">
                               <h1>Stamp</h1>
                           </div>
                       </div>
                   </div>
               </div>
               
           </div>    
       </div>
   </div>



<script>
   var amt = document.querySelectorAll('#amount');
   var x = 0;
   var t_amount = document.getElementById('t_amount');
   var t_amounts = document.getElementById('t_amounts');
   amt.forEach(element => {
       
       

       x = x + parseInt(element.value);
       
   });
   t_amount.innerHTML = "KSH " + x;
   t_amounts.innerHTML = "KSH " + x;


   
</script>

@endsection