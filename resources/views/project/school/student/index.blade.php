@extends('layouts.app')

@section('title')
    {{$school->title}} students
@endsection

@section('content')
<div class="col-md-12 text-center"><h3>Recorded Students for {{$school->name}}</h3><br></div>
    <table class="table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>NAME</th>
                <th>ADMISSION NO</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>DEPARTMENT</th>
                <th>SUPERVISOR</th>
                <th>PROJECT</th>
                <th>YEAR</th>
                <th><a href="{{route('project.student.create',[$school->id])}}" class="btn btn-primary" >New Student</a></th>
            </tr>
        </thead>
        <tbody>
        @foreach($school->students as $student)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$student->user->fullName()}}</td>
            <td>{{$student->admission_no}}</td>
            <td>{{$student->user->email}}</td>
            <td>{{$student->user->phone}}</td>
            <td>{{$student->schoolDepartment->department->name}}</td>
            <td>
                @if($student->supervisor)
                {{$student->supervisor->user->fullName() ?? 'Not Available'}}
                @endif
            </td>
            <td><a href="">{{$student->project->topic ?? 'Not Available'}}</a></td>
            <td>{{date('Y',strtotime($student->created_at))}} / {{date('Y',strtotime($student->created_at))+1}}</td>
            <td>
                <a href=""><button class="btn btn-warning">Edit</button></a>
                <a href=""><button class="btn btn-danger">Delete</button></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection