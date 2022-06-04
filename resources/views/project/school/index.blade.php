@extends('layouts.app')

@section('title')
    {{$school->title}} Projects
@endsection

@section('content')
<div class="col-md-12 text-center"><h3>Recorded Student Project for {{$school->name}}</h3><br></div>
    <table class="table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>YEAR</th>
                <th>TOPIC</th>
                <th>SUPERVISOR</th>
                <th>LANGUAGE</th>
                <th>SERVER</th>
                <th><button class="btn btn-primary" data-toggle="modal" data-target="#newProject">New Project</button></th>
                @include('project.school.create')
            </tr>
        </thead>
    </table>
@endsection