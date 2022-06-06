@extends('layouts.app')

@section('title')
    {{$supervisor->user->fullName()}} Projects
@endsection

@section('content')
<div class="col-md-12 text-center"><h3>Recorded Projects Supervised by {{$supervisor->user->fullName()}} From {{$supervisor->school->title}}</h3><br></div>
    <table class="table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>TOPIC</th>
                <th>SERVER USE</th>
                <th>CASE STUDIED</th>
                <th>STATUS</th>
                <th>YEAR</th>
                <th>FEE</th>
                <th><a href="#" data-toggle="modal" data-target="#newProject" class="btn btn-primary" >New Project</a></th>
            @include('project.school.supervisor.project.create')
            </tr>
        </thead>
        <tbody>
        @foreach($supervisor->schoolProjects as $schoolProject)
        <tr>
            <td>{{$loop->iteration}}</td>
            
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection