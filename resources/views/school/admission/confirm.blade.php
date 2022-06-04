@extends('layouts.app')

@section('title')
    {{$admission->admission_no}} confirm
@endsection

@section('content')
<!--offer start  -->
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-1"><button class="btn btn-secondary btn-block" id="print" onclick="printContent('printContent');" >Print</button></div>
</div><br>
<div id="printContent" class="">
<div class="biodata" style="page-break-inside: avoid;">
<div class="card-body">
			<div class="row">
				<div class="col-md-8"></div>
				<div class="col-md-4">
                    @if($admission->user->profile_photo_path)
                        <img src="{{$admission->user->profileImage()}}" height="250" width="200" class="rounded">
                    @else
                        <img src="{{asset('images/user.jpg')}}" height="250" width="200" class="rounded">
                    @endif
                </div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<table class="table">
						<tr>
							<td><b class="h4 text text->primary">Personal Information</b></td>
							<td>
								<tr height="35">
									<td>First Name</td>
									<td>{{$admission->user->first_name}}</td>
								</tr>
								
								<tr height="35">
									<td>Other Names</td>
									<td>{{$admission->user->other_names}}</td>
								</tr>
								<tr height="35">
									<td>Date Of Birth</td>
									<td>{{date('d-M-Y',strtotime($admission->user->date_of_birth))}}</td>
								</tr>
								<tr height="35">
									<td>Admission Number</td>
									<td>{{$admission->admission_no}}</td>
								</tr>
							</td>
						</tr>

						<tr>
							<td><b class="h4 text text->success">Contact Information</b></td>
							<td>
								<tr height="35">
									<td>Email</td>
									<td>{{$admission->user->email}}</td>
								</tr>
								<tr height="35">
									<td>Phone Number</td>
									<td>{{$admission->user->phone}}</td>
								</tr>
							</td>
						</tr>

						<tr>
							<td><b class="h4 text text->success">Address Information</b></td>
							<td>
								<tr height="35">
									<td>State Of Origin</td>
									<td>{{$admission->user->lga->state->name ?? ''}}</td>
								</tr>
								<tr height="35">
									<td>Local Government</td>
									<td>{{$admission->user->lga->name ?? ''}}</td>
								</tr>
								<tr height="35">
									<td>Address</td>
									<td>{{$admission->user->address ?? ''}}</td>
								</tr>
							</td>
						</tr>
		                
					</table>
				</div>
                <div class="col-md-6">
                <br>
                I <i> <strong>{{$admission->user->first_name}} {{$admission->user->other_names}}</strong></i> has confirm the biodata given to this admission is the best of the of my knowledge  
                <br><b>Note</b> for any alteration is possible with our system but attract some fee for the reprinting
                </div>
			</div>
			
		</div>
</div>
<div class="offer" style="page-break-inside: avoid;">
    <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <!-- address start -->
        <div class="row">
            <div class="col-md-8 text-center">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
                <h5 class="text-danger">CALIPHATE TECH. SOLUTIONS LIMITED</h5>
                <i>(Computer Training Institute)</i>
            </div>
            <div class="col-md-4 text h4">
                Behind Sarda Quaters Arkilla Road Sokoto<br> Sokoto State <br>08162463010
            </div>
        </div>
        <!-- address end -->
        <br>
        <u><h5 class="text text-center text-danger">OFFER OF PROVISSIONAL ADMISSION IN TO {{$admission->programmeSchedule->programme->name}}</h5></u>
        <p>
            <h4>I write this letter to inform you that your application to
            {{$admission->programmeSchedule->programme->name}} 
            program of {{$admission->programmeSchedule->programme->duration ?? 3}} Months has been successfully offer you 
            a provisional admission with admission no {{$admission->admission_no}}  </h4>
        </p>
        <br>
        <p>
            <h4><b>Note,</b> You are expected to pay non-refundable sum of {{$admission->programmeSchedule->programme->fee}} Naira, Also the instalmental payment of atleast 50% and above also acceptedby the administration. 
            Therefore you are expected to obey the institute rules and regulations, 
            where by late coming to the school lectures would not be entertain.</h4>
        </p>
        <br>
        <p>
            <h4>Congratulation once again, we wish you success in your study and enjoy 
            you stay.</h4>
        </p>
        <br>
        <div id="sign" class="text text-center text-primary">
            <p><h4>Sign:</h4></p>
            <br>
            <br>
            <p><h4>{{$admission->programmeSchedule->programme->section->name}} Coordinator</h4></p>
            <p><h4>Caliphate Tech. Solutions Limited (Computer Training Institute)</h4></p>
        </div>
    </div>
    </div>
</div>
<div class="offer" style="page-break-inside: avoid;">
<!-- offer end -->
<!-- time table start -->
    <div id="timetable">
        <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <br>
            <br>
            <br>
            <h5 class="text text-center">{{$admission->programmeSchedule->programme->name}} TIME TABLE FOR {{$admission->admission_no}}</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Days<br>&<br>Time</th>
                        @foreach(App\Models\Period::all() as $period)
                        <th>{{$period->start}}<br>To<br>{{$period->end}}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach(App\Models\Day::all() as $day)
                        <tr>
                            <td><b>{{$day->name}}</b></td>
                            
                            @foreach(App\Models\Period::all() as $period)
                                <td>{{$admission->getLectureAtThisPeriod($period,$day)->course->code ?? ''}}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- time table end -->
@endsection