@extends('layouts.app')

@section('title')
    {{$student->email}} edit
@endsection

@section('content')
<h4 class="text-center">{{$student->fullName()}} Edit <br><br></h4>
    <form action="{{route('school.student.update',[$student->id])}}" method="post" class="row">
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
            <input type="text" name="first_name" value="{{$student->first_name}}" id="" class="col-md-9 input-group form-control" placeholder="First Name">
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Other Names</label>
            <input type="text" name="other_names" value="{{$student->other_names}}" id="" class="col-md-9 input-group form-control" placeholder="Other Names">
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Gender</label>
            <select name="gender" id="" class="col-md-9 input-group form-control">
                <option value="{{$student->gender->id}}">{{$student->gender->name}}</option>
                @foreach(App\Models\Gender::all() as $gender)
                    @if($student->gender->id != $gender->id)
                    <option value="{{$gender->id}}">{{$gender->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label for="" class="col-md-3">Date of Birth</label>
            <input type="date" name="date_of_birth" value="{{$student->date_of_birth}}" class="col-md-9 input-group form-control" placeholder="E-mail address">
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">E-mail address</label>
            <input type="email" name="email" value="{{$student->email}}" id="" class="col-md-9 input-group form-control" placeholder="E-mail address">
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Phone Number</label>
            <input type="text" name="phone" value="{{$student->phone}}" id="" class="col-md-9 input-group form-control" placeholder="Phone number">
        </div>
    
        <div class="form-group row">
            <label for="" class="col-md-3">Next of Kin Number</label>
            <input type="text" name="next_of_kin_phone" value="{{$student->next_of_kin_phone}}" id="" class="col-md-9 input-group form-control" placeholder="Next of kin phone">
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
                @if($student->lga)
                    <option value="{{$student->lga->state->id ?? ''}}">{{$student->lga->state->name ?? 'State'}}</option>
                    @foreach(App\Models\State::all() as $state)
                        @if($student->lga->state->id != $state->id)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                        @endif
                    @endforeach
                @else
                    <option value="">State</option>
                    @foreach(App\Models\State::all() as $state)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Local Government</label>
            <select name="lga" id="" class="col-md-9 input-group form-control">
                @if($student->lga)
                    <option value="{{$student->lga->id}}">{{$student->lga->name}}</option>
                    @foreach($student->lga->state->lgas as $lga)
                        @if($student->lga->id != $lga->id)
                        <option value="{{$lga->id}}">{{$lga->name}}</option>
                        @endif
                    @endforeach
                @else
                    <option value="">LGA</option>
                @endif
            </select>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Address</label>
            <textarea name="address" placeholder="Address" id="" class="col-md-9 input-group form-control">
            {{$student->address}}
            </textarea>
        </div>
       

        <div class="form-group row">
            <label for="" class="col-md-3"></label>
            <button class="btn btn-success">Save</button>
        </div>
    </div>
    </form>

@endsection