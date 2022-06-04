<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @section('content')
        @if(Auth::user()->role == 'Admin')
        <h5 class="text text-center">{{date('D')}}. Batch {{App\Models\Section::find(1)->currentBatch()->name}}  Week {{App\Models\Section::find(1)->currentBatch()->currentWeek()}} Lectures</h5><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Days<br>&<br>Time</th>
                    @foreach(App\Models\Period::all() as $period)
                    <th>{{$period->start}}<br>To<br>{{$period->end}}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                
                @foreach(App\Models\Day::all() as $day)
                @if($day->isToday())
                    <tr>
                        <td><b>{{$day->name}}</b></td>
                        
                        @foreach(App\Models\Period::all() as $period)
                            <td>
                            @foreach($period->lectures->where('day_id',$day->id) as $lecture)
                                @if(count($lecture->programmeSchedule->admissions->where('batch_id',$day->currentBatch()->id))>0)
                                    {{$lecture->course->code}} {{substr($lecture->programmeSchedule->name,0,1)}}<br>
                                    <small>{{$lecture->course->title}}</small><br>
                                    {{$lecture->course->currentWeekScheme()->sub_module}}<br>
                                    <b class="text text-danger">{{count($lecture->programmeSchedule->admissions->where('batch_id',$day->currentBatch()->id))}} Students</b>
                                @endif
                            @endforeach
                            </td>
                        @endforeach
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        @else
            other user
        @endif
    @endsection    
</x-app-layout>
