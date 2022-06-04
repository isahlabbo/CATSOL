@extends('layouts.app')

@section('title')
    {{$admission->admission}} edit
@endsection

@section('content')
<h4 class="text-center">{{$admission->admission_no}} Edit <br><br></h4>
    <form action="{{route('school.section.programme.schedule.admission.update',
    [ 
    $admission->programmeSchedule->programme->section->id,
    $admission->programmeSchedule->programme->id,
    $admission->id,
    ])}}" method="post" class="row">
    @csrf
    <div class="col-md-4">
        <div class="form-group row">
            <label for="" class="col-md-3">Programme Applying For</label>
            <select name="programme" id="" class="col-md-9 input-group form-control">
                <option value="{{$admission->programmeSchedule->programme->id}}">{{$admission->programmeSchedule->programme->name}}</option>
                @foreach($admission->pin->section->programmes as $programme)
                    @if($admission->programmeSchedule->programme->id != $programme->id)
                    <option value="{{$programme->id}}">{{$programme->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label for="" class="col-md-3">Programme Schedule</label>
            <select name="programme_schedule" id="" class="col-md-9 input-group form-control">
                <option value="{{$admission->programmeSchedule->id}}">{{$admission->programmeSchedule->schedule->name}}</option>
                @foreach($admission->programmeSchedule->programme->programmeSchedules as $programmeSchedule)
                    @if($programmeSchedule->id != $admission->programmeSchedule->id)
                    <option value="{{$programmeSchedule->id}}">{{$programmeSchedule->schedule->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label for="" class="col-md-3">Skill Applying With</label>
            <textarea name="skills_applying_with" placeholder="Skill Applying With" id="" class="col-md-9 input-group form-control">{{$admission->skills_applying_with}}</textarea>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3"></label>
            <button class="btn btn-success">Save</button>
        </div>
    </div>
    </form>

@endsection