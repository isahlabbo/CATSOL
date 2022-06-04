@extends('layouts.app')

@section('title')
    {{$school->title}} Supervisors
@endsection

@section('content')
<div class="col-md-12 text-center"><h3>Recorded Supervisors for {{$school->name}}</h3><br></div>
    <table class="table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>DEPARTMENT</th>
                <th>RANK</th>
                <th>PROJECTS</th>
                <th><a href="{{route('project.supervisor.create',[$school->id])}}" class="btn btn-primary" >New Supervisor</a></th>
            </tr>
        </thead>
        <tbody>
        @foreach($school->supervisors as $supervisor)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$supervisor->user->fullName()}}</td>
            <td>{{$supervisor->user->email}}</td>
            <td>{{$supervisor->user->phone}}</td>
            <td>{{$supervisor->schoolDepartment->department->name}}</td>
            <td>{{$supervisor->schoolRank->name}}</td>
            <td><a href="{{route('project.supervisor.project.index',[$school->id,$supervisor->id])}}">{{count($supervisor->schoolProjects)}}</a></td>
            <td>
                <a href="{{route('project.supervisor.edit',[$school->id,$supervisor->id])}}"><button class="btn btn-warning">Edit</button></a>
                <a href="{{route('project.supervisor.delete',[$school->id,$supervisor->id])}}"><button class="btn btn-danger">Delete</button></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection