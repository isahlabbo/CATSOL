@extends('layouts.app')

@section('title')
    school payments
@endsection

@section('content')
@php
    $paindAmount = 0;
    $pendingAmount = 0;
@endphp
    <table class="table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>NAME</th>
                <th>PHONE</th>
                <th>PROGRAMME</th>
                <th>SCHEDULE</th>
                <th>PAID</th>
                <th>PENDING</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach(App\Models\Section::find(1)->currentSession()->batches as $batch)
                @foreach($batch->admissions as $admission)
                    @php
                        $paindAmount+=$admission->paidFee();
                        $pendingAmount+=$admission->pendingFee();
                    @endphp
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$admission->user->first_name}} {{$admission->user->other_names}}</td>
                        <td>{{$admission->user->phone}}</td>
                        <td>{{$admission->programmeSchedule->programme->name}}</td>
                        <td>{{$admission->programmeSchedule->schedule->name}}</td>
                        <td>{{$admission->paidFee()}}</td>
                        <td>{{$admission->pendingFee()}}</td>
                        <td>
                        @if($admission->pendingFee() > 0)
                        <button data-toggle="modal" data-target="#pay_{{$admission->id}}" class="btn btn-warning">Pay Now</button>
                        @include('school.payment.create')
                        @else
                        Cleared
                        @endif

                        </td>
                    </tr>
                @endforeach
                
            @endforeach
            <tr>
                <td><b>Total</b></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>{{$paindAmount}}</b></td>
                <td><b>{{$pendingAmount}}</b></td>
                <td><b>{{$paindAmount+$pendingAmount}}</td>
                </tr>
        </tbody>
    </table>
@endsection