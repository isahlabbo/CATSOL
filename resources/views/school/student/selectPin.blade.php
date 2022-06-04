
<div class="modal fade" id="admit_{{$student->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>New Admission</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('school.student.usePin',[$student->id])}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="" class"col-md-4">Section</label>
                        <select name="section" id="" class="form-control col-md-8">
                            <option value="">Section</option>
                            @foreach(App\Models\Section::all() as $section)
                                <option value="{{$section->id}}">{{$section->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                       <label for="" class"col-md-4">Pin</label>
                        <select name="pin" id="" class="form-control input-group col-md-8">
                            <option value="">Pin</option>
                        </select>
                    </div>
                    
                    <button class="btn btn-primary">USE PIN</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>