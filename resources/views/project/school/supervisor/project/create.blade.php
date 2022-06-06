
<div class="modal fade" id="newProject" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>New Project</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('project.supervisor.project.register',[$supervisor->school->id,$supervisor->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="TOPIC" value="" name="topic">
                    </div>
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="CASE STUDY" value="" name="case_study">
                    </div>
                    <div class="form-group">
                        <select name="language" id="" class="input-group form-control">
                        <option value="">LANGUAGE USE</option>
                        @foreach(App\Models\Language::all() as $language)
                           <option value="{{$language->id}}">{{$language->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="server" id="" class="input-group form-control">
                        <option value="">SERVER USE</option>
                        @foreach(App\Models\Server::all() as $server)
                           <option value="{{$server->id}}">{{$server->name}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="status" id="" class="input-group form-control">
                            <option value="">PROJECT STATUS</option>
                            <option value="propose">Propose</option>
                            <option value="available">Available</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="number" class="input-group form-control" placeholder="YEAR" value="" name="year">
                    </div>
                    <div class="form-group">
                        <input type="number" class="input-group form-control" placeholder="FEE" value="" name="fee">
                    </div>
                    <div class="form-group">
                        <input type="file" class="input-group form-control" value="" name="document">
                    </div>
                    
                    <button class="btn btn-primary">Register</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>