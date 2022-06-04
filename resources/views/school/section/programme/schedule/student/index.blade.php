@extends('layouts.app')

@section('title')
    students
@endsection

@section('content')
<div class="text text-center"><h5>ADMISSIONS</h5></div>
    <table class="table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>FIRST NAME</th>
                <th>OTHER NAMES</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>ADMISSION NO</th>
                <th>PIN</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($programmeSchedule->admissions->where('batch_id',$programmeSchedule->currentBatch()->id) as $admission)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$admission->user->first_name}}</td>
                    <td>{{$admission->user->other_names}}</td>
                    <td>{{$admission->user->email}}</td>
                    <td>{{$admission->user->phone}}</td>
                    <td>{{$admission->admission_no}}</td>
                    <td>{{$admission->pin->pin}}</td>
                    <td>
                <a href="{{route('school.admission.confirm',[$admission->id])}}">
                        <button class="btn btn-success">Confirm</button>
                    </a>
                    <a href="{{route('school.section.programme.schedule.admission.edit',[
                    $programmeSchedule->programme->section->id,
                    $programmeSchedule->programme->id,
                    $admission->id
                    ])}}">
                        <button class="btn btn-warning">Edit</button>
                    </a>
                    <a href="{{route('school.section.programme.schedule.admission.delete',[
                    $programmeSchedule->programme->section->id,
                    $programmeSchedule->programme->id,
                    $admission->id
                    ])}}" onclick="return confirm('Are you sure you want to delete this admission')">
                        <button class="btn btn-danger">Delete</button>
                    </a>
                    
                    </td>
                    <td><button class="btn btn-warning" data-toggle="modal" data-target="#changePin">Change Pin</button>
                    @include('school.section.programme.schedule.student.changePin')</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection