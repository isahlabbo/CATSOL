
<div class="modal fade" id="edit_{{$lecture->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>EDIT LECTURE</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('school.section.programme.schedule.lecture.update',[
                    $programme->section->id, $programme->id,$programmeSchedule->id,$lecture->id])}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="" class="col-md-4">Course</label>
                        <select name="course" id="" class="form-control input-group col-md-7">
                            <option value="{{$lecture->course->id}}">{{$lecture->course->code}}</option>
                            @foreach($programme->courses as $course)
                                @if($lecture->course->id != $course->id)
                                <option value="{{$course->id}}">{{$course->code}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-4">Period</label>
                        <select name="period" id="" class="form-control input-group col-md-7">
                            <option value="{{$lecture->period->id}}">{{$lecture->period->start}} to {{$lecture->period->end}}</option>
                            @foreach(App\Models\Period::all() as $period)
                                @if($lecture->period->id != $period->id)
                                <option value="{{$period->id}}">{{$period->start}} to {{$period->end}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-4">Day</label>
                        <select name="day" id="" class="form-control input-group col-md-7">
                            <option value="{{$lecture->day->id}}">{{$lecture->day->name}}</option>
                            @foreach(App\Models\Day::all() as $day)
                                @if($lecture->day->id != $day->id)
                                    <option value="{{$day->id}}">{{$day->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary">SAVE</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>