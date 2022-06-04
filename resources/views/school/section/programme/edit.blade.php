
<div class="modal fade" id="edit_{{$programme->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form enctype="multipart/form-data" action="{{route('school.section.programme.update',[$section->id, $programme->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="NAME" value="{{$programme->name}}" name="name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="TITLE" value="{{$programme->title}}" name="title">
                    </div>
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="CODE" value="{{$programme->code}}" name="code">
                    </div>
                    <div class="form-group">
                        <input type="number" class="input-group form-control" placeholder="FEE" value="{{$programme->fee}}" name="fee">
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