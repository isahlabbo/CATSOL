@extends('layouts.app')

@section('title')
    school
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('school.section.index')}}"><h5 class="text-center">Sections</h5> </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                <a href="{{route('school.admission.index',[App\Models\Pin::find(1)->currentSession()->id])}}">
                <h5 class="text-center">{{count(App\Models\Pin::find(1)->currentBatch()->admissions)}} Admissions</h5></a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                <a href="{{route('school.payment.index')}}"><h5 class="text-center">Payment</h5></a>
                </div>
            </div>
        </div> 
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                
                <a href="{{route('school.student.index')}}"><h5 class="text-center">Students</h5></a>
                </div>
            </div>
        </div> 
    </div>
@endsection