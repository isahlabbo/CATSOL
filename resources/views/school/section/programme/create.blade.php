
<div class="modal fade" id="addProgramme" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>NEW PROGRAMME</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('school.section.programme.register',[$section->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="NAME" value="{{old('name')}}" name="name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="TITLE" value="{{old('title')}}" name="title">
                    </div>
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="CODE" value="{{old('code')}}" name="code">
                    </div>
                    <div class="form-group">
                        <input type="number" class="input-group form-control" placeholder="FEE" value="{{old('fee')}}" name="fee">
                    </div>
                    <button class="btn btn-primary">REGISTER</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>