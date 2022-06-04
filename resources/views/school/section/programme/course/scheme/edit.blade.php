@extends('layouts.app')

@section('title')
    {{$scheme->course->name}} week {{$scheme->week}} edit
@endsection

@section('content')
<h4 class="text-center">{{$scheme->course->title}} week {{$scheme->week}} edit</h4><br>
<form action="{{route('school.section.programme.course.scheme.update',[
    $scheme->course->programme->section->id,
    $scheme->course->programme->id,
    $scheme->course->id,
    $scheme->id])}}" method="post" class="row" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="form-group">
            <label for="" class="col-md-3">Module</label>
            <textarea name="module" id="" cols="30" rows="3" class="input-group form-control col-md-9">{{$scheme->module}}</textarea>
        </div>

        <div class="form-group">
            <label for="" class="col-md-3">Sub Module</label>
            <textarea name="sub_module" id="" cols="30" rows="3" class="input-group form-control col-md-9">{{$scheme->sub_module}}</textarea>
        </div>
    
        <div class="form-group">
            <label for="" class="col-md-3">Objective</label>
            <textarea name="objective" id="" cols="30" rows="3" class="input-group form-control col-md-9">{{$scheme->objective}}</textarea>
        </div>
        <div class="form-group">
            <label for="" class="col-md-3">Content</label>
            <textarea name="content" id="" cols="30" rows="3" class="input-group form-control col-md-9">{{$scheme->content}}</textarea>
        </div>
    
    
        <div class="form-group">
            <label for="" class="col-md-3">Teaching Aids</label>
            <textarea name="teaching_aids" id="" cols="30" rows="3" class="input-group form-control col-md-9">{{$scheme->teaching_aids}}</textarea>
        </div>
        <div class="form-group">
            <label for="" class="col-md-3">Farcilitator Activities</label>
            <textarea name="farcilitator_activities" id="" cols="30" rows="3" class="input-group form-control col-md-9">{{$scheme->farcilitator_activities}}</textarea>
        </div>
        <div class="form-group">
            <label for="" class="col-md-3">Student Activities</label>
            <textarea name="student_activities" id="" cols="30" rows="3" class="input-group form-control col-md-9">{{$scheme->student_activities}}</textarea>
        </div>
        <div class="form-group">
            <label for="" class="col-md-3">Evaluation</label>
            <textarea name="evaluation" id="" cols="30" rows="3" class="input-group form-control col-md-9">{{$scheme->evaluation}}</textarea>
        </div>
        <div class="form-group">
            <label for="" class="col-md-3">Significance Area</label>
            <textarea name="significance_area" id="" cols="30" rows="3" class="input-group form-control col-md-9">{{$scheme->significance_area}}</textarea>
        </div>
        <div class="form-group">
            <label for="" class="col-md-3"></label>
            <button class="btn btn-success">Save</button>
        </div>
    </div>
    </form>
@endsection