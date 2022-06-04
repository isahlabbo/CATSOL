@extends('layouts.app')

@section('title')
    sections
@endsection

@section('content')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-1"><button class="btn btn-secondary btn-block" id="print" onclick="printContent('printContent');" >Print</button></div>
</div><br>
<div class="row" id="printContent">
@foreach($section->pins->where('status','available') as $pin)
    <div class="col-md-4 mb-4">
        <div class="card">
        <div class="card-header">{{$section->name}} Registration PIN <small>Serial No {{$pin->id}}</small></div>
            <div class="card-body">
                <h4 class="text text-center">PIN: {{$pin->pin}}</h4>
            </div>
            <div class="card-footer"><small>Note this pin can be use to register one of the following programmes
            <ol>
            @foreach($section->programmes as $programme)
               <li>{{$programme->name}}</li>
            @endforeach
            </ol>
            </small></div>
        </div>
    </div>
@endforeach
<br>
</div>

@endsection