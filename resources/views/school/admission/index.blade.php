@extends('layouts.app')

@section('title')
    {{$session->name}} Batch {{$session->currentBatch()->name}} admissions
@endsection

@section('content')
<table class="table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>PROGRAMME</th>
                <th>SCHEDULE</th>
                <th>ADMISSIONS</th>
                <th><button class="btn btn-primary" data-toggle="modal" data-target="#verifypin"><b>+</b></button></th>
                @include('school.admission.verifypin')
            </tr>
        </thead>
        <tbody>
            @foreach(App\Models\ProgrammeSchedule::all() as $programmeSchedule)
            @if(count($programmeSchedule->admissions->where('batch_id',$session->currentBatch()->id))> 0)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$programmeSchedule->programme->name}}</td>
                    <td>{{$programmeSchedule->schedule->name}}</td>
                    <td>
                    <a href="{{route('school.section.programme.schedule.admission.index',[$programmeSchedule->programme->section->id,$programmeSchedule->programme->id,$programmeSchedule->id])}}">
                    {{count($programmeSchedule->admissions->where('batch_id',$session->currentBatch()->id))}}
                    </a>
                    </td>
                    
                    <td></td>
                    
                </tr>
            @endif    
            @endforeach
        </tbody>
    </table>
@endsection