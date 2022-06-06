@extends('layouts.app')

@section('title')
    create new supervisor
@endsection

@section('content')
<h4 class="text-center">New Student Project Registration for {{$school->title}}<br><br></h4>
    <form action="{{route('project.student.register',[$school->id])}}" method="post" class="row" enctype="multipart/form-data">
    @csrf
    <div class="col-md-4">
        <div class="form-group row">
            <label for="" class="col-md-3"></label>
            <div class="col-md-9">
                <img  id="picture_preview_container" src="{{asset('images/user.jpg')}}" alt="" width="140" height="150" class="rounded">
            </div>
        </div>
        <div class="form-group row">
        <label for="" class="col-md-3">First Name</label>
            <input type="text" name="first_name" value="{{old('first_name')}}" id="" class="col-md-9 input-group form-control" placeholder="First Name">
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Other Names</label>
            <input type="text" name="other_names" value="{{old('other_names')}}" id="" class="col-md-9 input-group form-control" placeholder="Other Names">
        </div>
        
        <div class="form-group row">
            <label for="" class="col-md-3">Gender</label>
            <select name="gender" id="" class="col-md-9 input-group form-control">
                <option value="">Gender</option>
                @foreach(App\Models\Gender::all() as $gender)
                    <option value="{{$gender->id}}">{{$gender->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">E-mail address</label>
            <input type="email" name="email" value="{{old('email')}}" id="" class="col-md-9 input-group form-control" placeholder="E-mail address">
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Phone Number</label>
            <input type="text" name="phone" value="{{old('phone')}}" id="" class="col-md-9 input-group form-control" placeholder="Phone number">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label for="" class="col-md-3">Deparment</label>
            <select name="department" id="" class="col-md-9 input-group form-control">
            <option value="">Department</option>
            @foreach($school->schoolDepartments as $schoolDepartment)
            <option value="{{$schoolDepartment->id}}">{{$schoolDepartment->department->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Picture</label>
            <input type="file" name="picture" id="" class="col-md-9 input-group form-control" placeholder="E-mail address">
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">State</label>
            <select name="state" id="" class="col-md-9 input-group form-control">
                <option value="">State</option>
                @foreach(App\Models\State::all() as $state)
                    <option value="{{$state->id}}">{{$state->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Local Government</label>
            <select name="lga" id="" class="col-md-9 input-group form-control">
                <option value="">LGA</option>
            </select>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Address</label>
            <textarea name="address" placeholder="Address" id="" class="col-md-9 input-group form-control">
            {{old('address')}}
            </textarea>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label for="" class="col-md-3">Admission No</label>
            <input type="text" name="admission_no" value="{{old('admission_no')}}" id="" class="col-md-9 input-group form-control" placeholder="Admission No">
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Project</label>
            <select name="project" id="" class="col-md-9 input-group form-control">
            <option value="new">New Project</option>
            @foreach($school->schoolProjects as $schoolProject)
            <option value="{{$schoolProject->id}}">{{$schoolProject->project->topic}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Supervisor</label>
            <select name="supervisor" id="" class="col-md-9 input-group form-control">
            <option value="">New Supervisor</option>
            @foreach($school->supervisors as $supervisor)
            <option value="{{$supervisor->id}}">{{$supervisor->user->fullName()}}</option>
            @endforeach
            </select>
        </div>
       

        <div class="form-group row">
            <label for="" class="col-md-3"></label>
            <button class="btn btn-success">Register</button>
        </div>
    </div>
    </form>

@endsection