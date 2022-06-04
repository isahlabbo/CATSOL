
<div class="modal fade" id="newProject" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>NEW PROJECT</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="#" method="post">
                    @csrf

                    <div class="form-group">
                        <input type="text" name="year" class="input-group form-control" placeholder="YEAR" value="{{old('year')}}">
                    </div>

                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="TOPIC" value="{{old('topic')}}" name="topic">
                    </div>

                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="CASE STUDY" value="{{old('case_study')}}" name="topic">
                    </div>

                    <div class="form-group">
                        <select name="supervisor" id="" class="input-group form-control">
                        <option value="">Supervisor</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="language" id="" class="input-group form-control">
                        <option value="">Language</option>
                        @foreach(App\Models\Language::all() as $language)
                            <option value="{{$language->id}}">{{$language->name}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="server" id="" class="input-group form-control">
                        <option value="">Server</option>
                        @foreach(App\Models\Server::all() as $server)
                            <option value="{{$server->id}}">{{$server->name}}</option>
                        @endforeach
                        </select>
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