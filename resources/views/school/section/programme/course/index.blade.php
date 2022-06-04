@extends('layouts.app')

@section('title')
    sections
@endsection

@section('content')
<div class="text text-center"><h5>{{$programme->name}} COURSES</h5></div>
    <table class="table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>NAME</th>
                <th>TITLE</th>
                <th>CODE</th>
                <th><button class="btn btn-primary" data-toggle="modal" data-target="#addCourse"><b>+</b></button></th>
                @include('school.section.programme.course.create')
            </tr>
        </thead>
        <tbody>
            @foreach($programme->courses as $course)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$course->name}}</td>
                    <td>{{$course->title}}</td>
                    <td>{{$course->code}}</td>
                    <td>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$course->id}}">Edit</button>
                    <a href="{{route('school.section.programme.course.delete',
                    [$programme->section->id,$programme->id,$course->id])}}" 
                    onclick="return confirm('Are you sure you want to delete this programme course')"><button class="btn btn-danger">Delete</button></a>
                    <a href="{{route('school.section.programme.course.scheme.index',
                    [$programme->section->id,$programme->id,$course->id])}}"><button class="btn btn-primary">Scheme of Work</button></a>
                    </td>
                </tr>
                @include('school.section.programme.course.edit')
            @endforeach
        </tbody>
    </table>
@endsection