
<div class="modal fade" id="edit_{{$course->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>EDIT COURSE</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('school.section.programme.course.update',[$programme->section->id, $programme->id,$course->id])}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="" class="col-md-4">Course Name</label>
                        <input type="text" value="{{$course->name}}" name="name" id="" class="col-md-7 input-group form-control">
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-4">Course Title</label>
                        <input type="text" value="{{$course->title}}" name="title" id="" class="col-md-7 input-group form-control">
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-4">Course Code</label>
                        <input type="text" value="{{$course->code}}" name="code" id="" class="col-md-7 input-group form-control">
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