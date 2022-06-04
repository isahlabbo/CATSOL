@extends('layouts.app')

@section('title')
    {{$course->name}} scheme of works
@endsection

@section('content')
<div class="text text-center"><h5>UPDATED {{$course->name}} SCHEME OF WORK</h5></div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>WEEK</th>
                <th>MODULE</th>
                <th>SUB MODULE</th>
                <th>CONTENT</th>
                <th>TEACHING AIDS</th>
                <th>OBJECTIVES</th>
                <th>FACILITATOR ACTIVITIES</th>
                <th>STUDENT ACTIVITIES</th>
                <th>EVALUATION</th>
                <th>SIGNIFICANCE AREA</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($course->schemeOfWorks as $scheme)
                <tr>
                    <td>{{$scheme->week}}</td>
                    <td>{{$scheme->module}}</td>
                    <td>{{$scheme->sub_module}}</td>
                    <td>{{$scheme->content}}</td>
                    <td>{{$scheme->teaching_aids}}</td>
                    <td>{{$scheme->objective}}</td>
                    <td>{{$scheme->farcilitator_activities}}</td>
                    <td>{{$scheme->student_activities}}</td>
                    <td>{{$scheme->evaluation}}</td>
                    <td>{{$scheme->significance_area}}</td>
                    <td>
                    <a href="{{route('school.section.programme.course.scheme.edit',[
                        $course->programme->section->id,
                        $course->programme->id,$course->id,$scheme->id])}}">   
                    <button class="btn btn-warning">Edit</button></a>
                    <a href="{{route('school.section.programme.course.scheme.addweek',[
                        $course->programme->section->id,
                        $course->programme->id,$course->id])}}">   
                    <button class="btn btn-success">Add Week</button></a>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection