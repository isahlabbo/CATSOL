
<div class="modal fade" id="edit_{{$programmeSchedule->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>EDIT PROGRAMME</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('school.section.programme.schedule.update',[$programme->section->id, $programme->id,$programmeSchedule->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <select name="schedule_id" id="" class="input-group form-control">
                            <option value="{{$programmeSchedule->schedule->id}}">{{$programmeSchedule->schedule->name}}</option>
                            @foreach(App\Models\Schedule::all() as $schedule)
                                @if($programmeSchedule->schedule->id != $schedule->id)
                                    <option value="{{$schedule->id}}">{{$schedule->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="status" id="" class="input-group form-control">
                            <option value="{{$programmeSchedule->status}}">{{$programmeSchedule->status}}</option>
                           
                                @if($programmeSchedule->status == 'active')
                                    <option value="not active">Not Active</option>
                                @else
                                    <option value="active">Active</option>
                                @endif
                           
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