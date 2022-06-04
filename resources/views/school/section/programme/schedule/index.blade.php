@extends('layouts.app')

@section('title')
    sections
@endsection

@section('content')
<div class="text text-center"><h5>{{$programme->name}} SCHEDULES</h5></div>
    <table class="table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>NAME</th>
                <th>STATUS</th>
                <th>LECTURES</th>
                <th><button class="btn btn-primary" data-toggle="modal" data-target="#addProgramme"><b>+</b></button></th>
                @include('school.section.programme.schedule.create')
            </tr>
        </thead>
        <tbody>
            @foreach($programme->programmeSchedules as $programmeSchedule)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$programmeSchedule->schedule->name}}</td>
                    <td>{{$programmeSchedule->status}}</td>
                    <td> 
                    <a href="{{route('school.section.programme.schedule.lecture.index',[$programme->section->id, $programme->id, $programmeSchedule->id])}}">
                    {{count($programmeSchedule->lectures)}}
                    </a>
                    </td>
                    <td>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$programmeSchedule->id}}">Edit</button>
                    <a href="{{route('school.section.programme.schedule.delete',[$programme->section->id,$programme->id,$programmeSchedule->id])}}" onclick="return confirm('Are you sure you want to delete this programme schedule')"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                @include('school.section.programme.schedule.edit')
            @endforeach
        </tbody>
    </table>
@endsection