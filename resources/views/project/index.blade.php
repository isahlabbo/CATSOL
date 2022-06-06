@extends('layouts.app')

@section('title')
    Projects
@endsection
@section('breadcrumb')
        {{ Breadcrumbs::render('project') }}
    @endsection
@section('content')
    <div class="row">
        @foreach(App\Models\School::all() as $school)
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center">{{$school->title}}</h5> 
                <table>
                    <tr>
                        <td>Projects</td>
                        <td>
                            <a href="{{route('project.school',[$school->id])}}">
                            {{count($school->schoolProjects)}}</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Supervisors</td>
                        <td><a href="{{route('project.supervisor.index',[$school->id])}}">
                            {{count($school->supervisors)}}</a></td>
                    </tr>
                    <tr>
                        <td>Student</td>
                        <td><a href="{{route('project.student.index',[$school->id])}}">
                            {{count($school->students)}}</a></td>
                    </tr>
                </table>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection