@extends('layouts.app')

@section('title')
    sections
@endsection

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>NAME</th>
                <th>TITLE</th>
                <th>CODE</th>
                <th>FEE</th>
                <th>SCHEDULES</th>
                <th>COURSES</th>
                <th><button class="btn btn-primary" data-toggle="modal" data-target="#addProgramme"><b>+</b></button></th>
                @include('school.section.programme.create')
            </tr>
        </thead>
        <tbody>
            @foreach($section->programmes as $programme)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$programme->name}}</td>
                    <td>{{$programme->title}}</td>
                    <td>{{$programme->code}}</td>
                    <td>{{$programme->fee}}</td>
                    <td>
                    <a href="{{route('school.section.programme.schedule.index',[$section->id,$programme->id])}}">{{count($programme->programmeSchedules)}}</a>
                    </td>
                    <td>
                    <a href="{{route('school.section.programme.course.index',[$section->id,$programme->id])}}">{{count($programme->courses)}}</a>
                    </td>
                    <td>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$programme->id}}">Edit</button>
                    <a href="{{route('school.section.programme.delete',[$section->id,$programme->id])}}" onclick="return confirm('Are you sure you want to delete this programme')"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                @include('school.section.programme.edit')
            @endforeach
        </tbody>
    </table>
@endsection