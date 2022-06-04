<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\School;
use App\Models\Supervisor;
use Illuminate\Support\Facades\Hash;
use App\Services\Upload\FileUpload;

class SupervisorController extends Controller
{
    use FileUpload;

    public function index($schoolId)
    {
        return view('project.school.supervisor.index',['school'=>School::find($schoolId)]);
    }

    public function create($schoolId)
    {
        return view('project.school.supervisor.create',['school'=>School::find($schoolId)]);
    }

    public function edit($schoolId, $supervisorId)
    {
        return view('project.school.supervisor.edit',['supervisor'=>Supervisor::find($supervisorId)]);
    }

    public function register(Request $request, $schoolId)
    {
        $request->validate([
            "first_name" => "required|string",
            "other_names" => "required|string",
            "email" => "required|email|unique:users",
            "phone" => "required|unique:users",
            "gender" => "required",
            "lga" => "required",
            "address" => "required",
            "department" => "required",
            "rank" => "required",
            ]);
            $school = School::find($schoolId);
            $user = User::create([
                'first_name'=>strtoupper($request->first_name),
                'other_names'=>strtoupper($request->other_names),
                'phone'=>$request->phone,
                'email'=>$request->email,
                'gender_id'=>$request->gender,
                'password'=>Hash::make('123456'),
                'lga_id'=>$request->lga,
                'address'=>$request->address,
                ]);
            if($request->picture){
                $this->storeFile($user, 'profile_photo_path',
                $request->picture,$school->title.
                '/Project/Supervisors/Pictures/');
            }
            $school->supervisors()->create([
                'school_rank_id'=>$request->rank,
                'school_department_id'=>$request->department,
                'user_id'=>$user->id,
                'title'=>$request->title,
            ]);
            return redirect()->route('project.supervisor.index',[$school->id]);
    }

    public function update(Request $request, $schoolId, $supervisorId)
    {
        $request->validate([
            "first_name" => "required|string",
            "other_names" => "required|string",
            "gender" => "required",
            "lga" => "required",
            "address" => "required",
            "department" => "required",
            "rank" => "required",
            ]);
            $school = School::find($schoolId);
            $supervisor = Supervisor::find($supervisorId);
            $supervisor->user->update([
                'first_name'=>strtoupper($request->first_name),
                'other_names'=>strtoupper($request->other_names),
                'phone'=>$request->phone,
                'email'=>$request->email,
                'gender_id'=>$request->gender,
                'password'=>Hash::make('123456'),
                'lga_id'=>$request->lga,
                'address'=>$request->address,
                ]);
            if($request->picture){
                $this->updateFile($supervisor->user, 'profile_photo_path',
                $request->picture,$school->title.
                '/Project/Supervisors/Pictures/');
            }
            $supervisor->update([
                'school_rank_id'=>$request->rank,
                'school_department_id'=>$request->department,
                'user_id'=>$supervisor->user->id,
                'title'=>$request->title,
            ]);
            return redirect()->route('project.supervisor.index',[$school->id]);
    }
    public function delete($schoolId, $supervisorId)
    {
        $supervisor = Supervisor::find($supervisorId);
        $school = School::find($schoolId);
        if(count($supervisor->schoolProjects) < 1){
            $supervisor->user->delete();
            $supervisor->delete();
        }
        return redirect()->route('project.supervisor.index',[$school->id]);
    }
}
