@extends('layouts.app')

@section('title')
    {{$pin->pin}} admission registration
@endsection

@section('content')
<h4 class="text-center">{{$pin->section->name}} Application Registration <br><br></h4>
    <form enctype="multipart/form-data" action="{{route('school.student.programme.register',[$student->id,$pin->id])}}" method="post" class="row">
    @csrf
    <div class="col-md-4">
        <div class="form-group row">
            <label for="" class="col-md-3">Programme Applying For</label>
            <select name="programme" id="" class="col-md-9 input-group form-control">
                <option value="">Programme Applying For</option>
                @foreach($pin->section->programmes as $programme)
                    <option value="{{$programme->id}}">{{$programme->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label for="" class="col-md-3">Programme Schedule</label>
            <select name="programme_schedule" id="" class="col-md-9 input-group form-control">
                <option value="">Programme Schedule</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label for="" class="col-md-3">Skill Applying With</label>
            <textarea name="skills_applying_with" placeholder="Skill Applying With" id="" class="col-md-9 input-group form-control"></textarea>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3"></label>
            <button class="btn btn-success">Register</button>
        </div>
    </div>
    </form>

@endsection