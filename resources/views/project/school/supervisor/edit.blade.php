@extends('layouts.app')

@section('title')
    edit supervisor
@endsection

@section('content')
<h4 class="text-center">New Supervisor Registration<br><br></h4>
    <form action="{{route('project.supervisor.update',[$supervisor->school->id, $supervisor->id])}}" method="post" class="row" enctype="multipart/form-data">
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
            <input type="text" name="first_name" value="{{$supervisor->user->first_name}}" id="" class="col-md-9 input-group form-control" placeholder="First Name">
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Other Names</label>
            <input type="text" name="other_names" value="{{$supervisor->user->other_names}}" id="" class="col-md-9 input-group form-control" placeholder="Other Names">
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Title</label>
            <select name="title" id="" class="col-md-9 input-group form-control">
                <option value="{{$supervisor->title}}">{{$supervisor->title}}</option>
                @foreach(['Malam','Malama','Dr','Prof'] as $title)
                    @if($supervisor->title != $title)
                        <option value="{{$title}}">{{$title}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Gender</label>
            <select name="gender" id="" class="col-md-9 input-group form-control">
                <option value="{{$supervisor->user->gender->id}}">{{$supervisor->user->gender->name}}</option>
                @foreach(App\Models\Gender::all() as $gender)
                    @if($supervisor->user->gender->id != $gender->id)
                        <option value="{{$gender->id}}">{{$gender->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label for="" class="col-md-3">Deparment</label>
            <select name="department" id="" class="col-md-9 input-group form-control">
            <option value="{{$supervisor->schoolDepartment->id}}">{{$supervisor->schoolDepartment->department->name}}</option>
            @foreach($supervisor->school->schoolDepartments as $schoolDepartment)
                @if($supervisor->schoolDepartment->id != $schoolDepartment->id)
                    <option value="{{$schoolDepartment->id}}">{{$schoolDepartment->department->name}}</option>
                @endif
            @endforeach
            </select>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Rank</label>
            <select name="rank" id="" class="col-md-9 input-group form-control">
            <option value="{{$supervisor->schoolRank->id}}">{{$supervisor->schoolRank->name}}</option>
            @foreach($supervisor->school->schoolRanks as $schoolRank)
                @if($supervisor->schoolRank->id != $schoolRank->id)
                    <option value="{{$schoolRank->id}}">{{$schoolRank->name}}</option>
                @endif
            @endforeach
            </select>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">E-mail address</label>
            <input type="email" name="email" value="{{$supervisor->user->email}}" id="" class="col-md-9 input-group form-control" placeholder="E-mail address">
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Phone Number</label>
            <input type="text" name="phone" value="{{$supervisor->user->phone}}" id="" class="col-md-9 input-group form-control" placeholder="Phone number">
        </div>
    
        <div class="form-group row">
            <label for="" class="col-md-3">Picture</label>
            <input type="file" name="picture" id="" class="col-md-9 input-group form-control" placeholder="E-mail address">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label for="" class="col-md-3">State</label>
            <select name="state" id="" class="col-md-9 input-group form-control">
                <option value="{{$supervisor->user->lga->state->id}}">{{$supervisor->user->lga->state->name}}</option>
                @foreach(App\Models\State::all() as $state)
                    @if($supervisor->user->lga->state->id != $state->id)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Local Government</label>
            <select name="lga" id="" class="col-md-9 input-group form-control">
                <option value="{{$supervisor->user->lga->id}}">{{$supervisor->user->lga->name}}</option>
                @foreach($supervisor->user->lga->state->lgas as $lga)
                    @if($supervisor->user->lga->id != $lga->id)
                        <option value="{{$lga->id}}">{{$lga->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Address</label>
            <textarea name="address" placeholder="Address" id="" class="col-md-9 input-group form-control">
            {{$supervisor->user->address}}
            </textarea>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3"></label>
            <button class="btn btn-success">Save</button>
        </div>
    </div>
    </form>

@endsection