
<div class="modal fade" id="addLecture" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>NEW COURSE LECTURE</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('school.section.programme.schedule.lecture.register',[$programme->section->id,$programme->id,$programmeSchedule->id])}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="" class="col-md-4">Course</label>
                        <select name="course" id="" class="form-control input-group col-md-7">
                            <option value="">Course</option>
                            @foreach($programme->courses as $course)
                            <option value="{{$course->id}}">{{$course->code}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-4">Period</label>
                        <select name="period" id="" class="form-control input-group col-md-7">
                            <option value="">Period</option>
                            @foreach(App\Models\Period::all() as $period)
                            <option value="{{$period->id}}">{{$period->start}} to {{$period->end}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-4">Day</label>
                        <select name="day" id="" class="form-control input-group col-md-7">
                            <option value="">Day</option>
                            @foreach(App\Models\Day::all() as $day)
                            <option value="{{$day->id}}">{{$day->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <button class="btn btn-primary">ADD</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>