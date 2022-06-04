
<div class="modal fade" id="addProgramme" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>NEW PROGRAMME SCHEDULE</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('school.section.programme.schedule.register',[$programme->section->id,$programme->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <select name="schedule_id" id="" class="input-group form-control">
                            <option value="">Schedule</option>
                            @foreach($programme->remainingSchedules() as $schedule)
                                <option value="{{$schedule->id}}">{{$schedule->name}}</option>
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