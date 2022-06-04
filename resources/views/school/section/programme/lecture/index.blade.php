@extends('layouts.app')

@section('title')
    sections
@endsection

@section('content')
@php
$programme = $programmeSchedule->programme;
@endphp
<div class="text text-center"><h5>{{$programmeSchedule->programme->name}} {{strtoupper($programmeSchedule->schedule->name)}} LECTURES</h5></div>
    <table class="table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>DAY</th>
                <th>COURSE</th>
                <th>FARCILITATOR</th>
                <th>LECTURE START</th>
                <th>LECTURE END</th>
                <th>PERIOD</th>
                <th><button class="btn btn-primary" data-toggle="modal" data-target="#addLecture"><b>+</b></button></th>
                @include('school.section.programme.lecture.create')
            </tr>
        </thead>
        <tbody>
            @foreach($programmeSchedule->lectures as $lecture)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$lecture->day->name}}</td>
                    <td>{{$lecture->course->code}}</td>
                    <td></td>
                    <td>{{$lecture->period->start}}</td>
                    <td>{{$lecture->period->end}}</td>
                    <td>{{$lecture->period->order}}</td>
                    <td>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$lecture->id}}">Edit</button>
                    <a href="{{route('school.section.programme.course.delete',
                    [$programme->section->id,$programme->id,$programmeSchedule->id,$lecture])}}" 
                    onclick="return confirm('Are you sure you want to delete this programme course')"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                @include('school.section.programme.lecture.edit')
            @endforeach
        </tbody>
    </table>
@endsection