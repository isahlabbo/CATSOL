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
                <th>PROGRAMME</th>
                <th>AVAILABLE PINS</th>
                <th><button class="btn btn-primary" data-toggle="modal" data-target="#addSection"><b>+</b></button></th>
                @include('school.section.create')
            </tr>
        </thead>
        <tbody>
            @foreach($sections as $section)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$section->name}}</td>
                    <td>{{$section->title}}</td>
                    <td>{{$section->code}}</td>
                    <td>
                        <a href="{{route('school.section.programme.index',[$section->id])}}">{{count($section->programmes)}}</a></td>
                    </td>
                    <td>
                        <a href="{{route('school.section.pin.index',[$section->id])}}">{{count($section->pins->where('status','available'))}}</a>
                    </td>
                    <td>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$section->id}}">Edit</button>
                    <a href="{{route('school.section.delete',[$section->id])}}" onclick="return confirm('Are you sure you want to delete this section')"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                @include('school.section.edit')
            @endforeach
        </tbody>
    </table>
@endsection