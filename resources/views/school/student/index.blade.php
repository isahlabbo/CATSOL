@extends('layouts.app')

@section('title')
    students
@endsection

@section('content')
<div class="text text-center"><h5>REGISTERED STUDENTS</h5></div>
    <table class="table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>FIRST NAME</th>
                <th>OTHER NAMES</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>ADMISSIONS</th>
                <th>
                <a href="{{route('school.student.create')}}"><button class="btn btn-primary"><b>New Student</b></button></a></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$student->first_name}}</td>
                    <td>{{$student->other_names}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->phone}}</td>
                    <td>{{count($student->admissions)}}</td>
                    <td>

                    <a href="{{route('school.student.edit',[$student->id])}}">
                    <button class="btn btn-warning">Edit</button></a>

                    <a href="{{route('school.student.delete',[$student->id])}}">
                    <button class="btn btn-danger">Delete</button></a>
                    </td>
                    <td>
                    <a href="#" data-toggle="modal" data-target="#admit_{{$student->id}}">
                    <button class="btn btn-primary"><b>New Admission</b></button></a>
                    </td>
                </tr>
                @include('school.student.selectPin')
            @endforeach
        </tbody>
    </table>
@endsection