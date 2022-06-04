@extends('layouts.app')

@section('title')
    {{$pin->pin}} admission registration
@endsection

@section('content')
<h4 class="text-center">{{$pin->section->name}} Application Registration <br><br></h4>
    <form enctype="multipart/form-data" action="{{route('school.admission.register',[$pin->id])}}" method="post" class="row">
    @csrf
    <div class="col-md-4">
        <div class="form-group row">
        <label for="" class="col-md-3">First Name</label>
            <input type="text" name="first_name" id="" class="col-md-9 input-group form-control" placeholder="First Name">
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Other Names</label>
            <input type="text" name="other_names" id="" class="col-md-9 input-group form-control" placeholder="Other Names">
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
            <label for="" class="col-md-3">Date of Birth</label>
            <input type="date" name="date_of_birth" id="" class="col-md-9 input-group form-control" placeholder="E-mail address">
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">E-mail address</label>
            <input type="email" name="email" id="" class="col-md-9 input-group form-control" placeholder="E-mail address">
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Phone Number</label>
            <input type="text" name="phone" id="" class="col-md-9 input-group form-control" placeholder="Phone number">
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Next of Kin Number</label>
            <input type="text" name="next_of_kin_phone" id="" class="col-md-9 input-group form-control" placeholder="Next of kin phone">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label for="" class="col-md-3"></label>
            <div class="col-md-9">
                <img  id="picture_preview_container" src="{{asset('images/user.jpg')}}" alt="" width="140" height="150" class="rounded">
            </div>
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
            <textarea name="address" placeholder="Address" id="" class="col-md-9 input-group form-control"></textarea>
        </div>
        
    </div>
    <div class="col-md-4">
        

        <div class="form-group row">
            <label for="" class="col-md-3">Picture</label>
            <input type="file" name="picture" id="picture" class="col-md-9 input-group form-control" placeholder="E-mail address">
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Programme Applying For</label>
            <select name="programme" id="" class="col-md-9 input-group form-control">
                <option value="">Programme Applying For</option>
                @foreach($pin->section->programmes as $programme)
                    <option value="{{$programme->id}}">{{$programme->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Programme Schedule</label>
            <select name="programme_schedule" id="" class="col-md-9 input-group form-control">
                <option value="">Programme Schedule</option>
            </select>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Skill Applying With</label>
            <textarea name="skills_applying_with" placeholder="Skill Applying With" id="" class="col-md-9 input-group form-control"></textarea>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3"></label>
            <button class="btn btn-success">Register</button>
        </div>
    </div>
    </form>

@endsection