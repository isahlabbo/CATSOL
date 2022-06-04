@extends('layouts.app')

@section('title')
    sections
@endsection

@section('content')
<div class="text text-center"><h5>{{$section->name}} AVAILABLE REGISTRATION PIN</h5></div>
    <table class="table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>PIN</th>
                <th>CREATED AT</th>
                <th>UPDATED AT</th>
                <th>
                <button class="btn btn-primary" data-toggle="modal" data-target="#addProgramme"><b>Generate Pins</b></button>
                <a href="{{route('school.section.pin.print',[$section->id])}}"><button class="btn btn-success"><b>Print Pins</b></button></a>
                </th>
                @include('school.section.pin.create')
            </tr>
        </thead>
        <tbody>
            @foreach($section->pins->where('status','available') as $registrationPin)
                <tr>
                    <td>{{$registrationPin->id}}</td>
                    <td>{{$registrationPin->pin}}</td>
                    <td>{{$registrationPin->created_at}}</td>
                    <td>{{$registrationPin->updated_at}}</td>
                    <td>
                    <a href="{{route('school.section.pin.sale',[$section->id,$registrationPin->id])}}"
                    onclick="return confirm('Are you sure you have collected the money for the pin because it will disappear from your dashboard forever after clicking OK')"><button class="btn btn-warning">Sale</button></a>
                    
                    <a href="{{route('school.admission.create',[$registrationPin->id])}}"
                    onclick="return confirm('Are you sure you have collected the money for the pin because it will disappear from your dashboard forever after this registration')">
                    <button class="btn btn-primary">Use</button></a>
                    <a href="{{route('school.section.pin.delete',[$section->id,$registrationPin->id])}}" onclick="return confirm('Are you sure you want to delete this registration pin? Note somebody might bought it from other seling point this might cause th pin to be invalid after clicking OK below')"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection