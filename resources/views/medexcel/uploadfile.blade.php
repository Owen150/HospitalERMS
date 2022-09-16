@extends('template.main')

@section('title', 'medicine excel')

@section('content_title',__("Med Excel"))
@section('content_description')
@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="#"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
    <li class="active">Here</li>
</ol>

@endsection

@section('main_content')

<div class="container">
    @if(session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif
  
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
  
     
  </div>
  
  <br>

<div class="container">
    <form action="{{ route('medexcelstore') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="medicine_excel" id="medicine_excel">
        <button type="submit">Submit</button>
    </form>
</div>


@endsection