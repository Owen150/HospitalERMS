<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <style>
            *{
                    padding: 0px;
                    margin:  0px;
                }
                html,body{
                    height: 100%;
                    overflow: hidden;
                }
                .main{
                    margin-top: 10%;	
                }
                #admin, #user{
                    border:2px solid;
                    width: 180px;
                    margin-right: 10px;
                }
                #admin:hover,#user:hover{
                    background-color: green;
                }
                #container{
                    display: grid;
                    grid-template-columns: auto 38%;
                    grid-template-rows: 20% auto 10%;
                    grid-template-areas: 
                    "header header"
                    "content sidebar"
                    "footer footer";
                }
                #header{
                    grid-area: header;
                    display: grid;
                    grid-template-columns: 25% auto 40%;
                    width: 100vw;
                }
                #header_image{
                    height: 80px;
                }
                ul{
                    list-style-type: none;
                }
                ul li{
                    margin-bottom: 10px;
                }
                .header_price{
                    border:1px white;
                    background-color: black;
                    margin: 10px;
                    color: #39FF14;
                }
                #content{
                    grid-area: content;
                    display: grid;
                    grid-template-rows: auto 15%;
                    
                }
                #price_column{
                    border:2px solid black;
                    background-color: white;
                }
                #table_buttons{
                    display: grid;
                    grid-template-columns: 60% auto ;
                    grid-gap:10px;
                }
                #buttons{
                    height:50px;
                }
                #sidebar{
                    margin: 8px;
                    grid-area: sidebar;
                    display: grid;
                    grid-template-rows: 10% 74% auto;
                }
                #search{
                    float: right;
                }
                #product_area{
                    background-color: white;
                    border:2px solid black;
                    margin-top: 0px;
                }
                #enter_area{
                    display: grid;
                    grid-template-columns: 1fr;
                }
                #footer{
                    width: 100vw;
                    grid-area: footer;
                    display: grid;
                    grid-template-columns: 2fr 1fr 1fr 1fr 1fr 1fr 1fr;
                }
                #tableData tr:hover,#products tr:hover{
                    background-color: #ffff99;
                }
                #table1 th{
                    font-style: bold;
                }


                .my-custom-scrollbar-a{
                    position: relative;
                    height: 350px;
                    overflow: auto;
                }

                .my-custom-scrollbar{
                    position: relative;
                    height: 300px;
                    overflow: auto;
                }

                .table-wrapper-scroll-y{
                    display: block;
                }


            </style>
</head>
<body>
    <div class="h-100 bg-dark" id="container">
		<div id="header">
            
            
            
			<div>
				<img class="img-fluid " src="/images/WKMHLogo.png" style="height: 20vh; width: 15vw"/>
			</div>
			<div class="text-white mt-0 ml-5">
				<table class="table-responsive-sm">
					<tbody>
						<tr>
							<td valign="baseline"><small>User Logged on:</small></td>
							<td valign="baseline"><small><p class="pt-3 ml-5"><i class="fas fa-user-shield"></i> {{Auth::user()->name}}</p></small></td>
						</tr>
						<tr>
							<td valign="baseline"><small class="mt-5">Customer Name:</small></td>
							<td valign="baseline"><small><div class="content p-0 ml-5"><input type="text" class="form-control form-control-sm customer_search" autocomplete="off" data-provide="typeahead" id="customer_search" value="{{ $search_result[0]->name }}" name="patient_name"/></small></div>
							</td>
							
						</tr>
						<tr>
							<td valign="baseline"><small class="mt-5">Payment Method:</small></td>
							<td valign="baseline"><small><div class="content p-0 ml-5"><input type="text" class="form-control form-control-sm customer_search" autocomplete="off" data-provide="typeahead" id="customer_search" value="{{ $appointment->mode_of_payment }}" name="customer"/></small></div>
							</td>
							
						</tr>
					</tbody>
				</table>
			</div>
			<div class="header_price border p-0">
				<h5>Grand Total</h5>
				<p class="pb-0 mr-2" style="float: right; font-size: 40px;" id="t_amounts">KSH 0.00</p>
			</div>
		</div>
		<div id="content" class="mr-2" style="width: 100vw">
			<div id="price_column" class="m-2 table-responsive-sm table-wrapper-scroll-y my-custom-scrollbar-a">
				<form method="POST" action="">
				<table class="table-striped w-100 font-weight-bold" style="cursor: pointer; " id="table2">
					<thead>
						<tr class='text-center'>
							
							<th>Description</th>
							<th>Price</th>
							<th>Unit</th>
							<th>Qty</th>
							<th>Sub.Total</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="tableData">
                        @foreach ($billing as $bill)
                        <tr class='prd'>
                            <td class='text-center'>{{ $bill->billing_for  }}</td>
                            <td class='price text-center' id="amount">{{ $bill->amount }}</td>
                            <td class='text-center'></td>
                            <td class='qty text-center'></td>
                            <td class='totalPrice text-center'>{{ $bill->amount }}</td>
                            <td><button class='btn btn-danger btn-sm' type='button' id='delete-row'><i class='fas fa-times-circle'></i></button></td>
                        </tr>
                        @endforeach
					</tbody>
				</table>
				</form>
			</div>
			<div id="table_buttons">
                
				
				<div class="">
                    
				</div>
			</div>
		</div>
		<div id="sidebar">
			<div class="mt-1 ">
			<div class="input-group"><div class="input-group-prepend"></div>
   				
   			</div></div>
			<div id="product_area" class="table-responsive-sm mt-2 table-wrapper-scroll-y my-custom-scrollbar" style="display: none">
				
			</div>
			<div class="w-100 mt-2" id="enter_area" >
				
			</div>
		</div>
		<div id="footer" >
			
            <form action="{{ route('cashiercheckprint') }}" method="post">
                @csrf
                <input type="hidden" name="keyword" value="{{$search_result[0]->id}}">
                <button id="buttons" style="width: 90%"  name='enter' class="btn btn-secondary border mr-2 ml-2"><i class="fas fa-handshake"></i> Finish and Print Receipt</button>
            </form>
			<button id="buttons"  class="btn btn-secondary border mr-2"><i class="fas fa-box-open"></i> Product</button>
			<button id="buttons"  class="btn btn-secondary border mr-2"><i class="fas fa-user-tie"></i> Supplier</button>
			
			<button id="buttons"  class="btn btn-secondary border mr-2"><i class="fas fa-globe"></i> Logs</button>
			
			<button id="buttons"  class="btn btn-secondary border mr-2"><i class="fas fa-shopping-cart"></i> Sales</button>
			<button id="buttons"  class="btn btn-secondary border mr-2"><i class="fas fa-truck"></i> Deliveries</button>
            <a id="buttons" class="logout btn btn-danger border mr-2" href="{{ route('cashiercheckp') }}" ><i class="fas fa-ban"></i> Cancel</a>
			
		</div>
	</div>

    <div style="display: none">
        <input type="text" value="{{ $appointment->id }}" id="appointment">
        <input type="text" value="{{ $search_result[0]->id }}" id="keywordp">
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha512-3P8rXCuGJdNZOnUx/03c1jOTnMn3rP63nBip5gOP2qmUh5YAdVAvFZ1E+QLZZbC1rtMrQb+mah3AfYW11RUrWA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script defer>
        var amt = document.querySelectorAll('#amount');
        var x = 0;
        
        var t_amounts = document.getElementById('t_amounts');
        var appointment_id = document.getElementById('appointment');
        amt.forEach(element => {
            x = x + parseInt(element.innerText);
        });
        
        t_amounts.innerHTML = "KSH " + x;

        

        
        function printcashier() {
            var appointment_id = document.getElementById('appointment').value;
            var keyword = document.getElementById('keywordp').value;
            var data = new FormData;
            data.append('appNum', appointment_id);
            data.append('depatment', 'done');
            data.append('keyword', keyword);
            data.append('appointment', appointment_id);
            data.append('_token', '{{csrf_token()}}');


            $.ajax({
                type: "POST",
                url: "",
                processData: false,
                contentType: false,
                cache: false,
                data:data,
                success: function () {
                    if(response==200){
                    window.location = 'cashiercheckpprint';
                    }
                }
            });

        }
        
        

       
    </script>
</body>
</html>