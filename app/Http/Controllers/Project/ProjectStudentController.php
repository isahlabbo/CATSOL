<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Services\Upload\FileUpload;

class ProjectStudentController extends Controller
{
    use FileUpload;

    public function index($schoolId)
    {
        return view('project.school.student.index',['school'=>School::find($schoolId)]);
    }

    public function create($schoolId)
    {
        return view('project.school.student.create',['school'=>School::find($schoolId)]);
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
            "project" => "required",
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
                '/Project/Students/Pictures/');
            }
            
            $school->students()->create([
                'admission_no'=>$request->admission_no,
                'school_department_id'=>$request->department,
                'supervisor_id'=>$request->supervisor,
                'user_id'=>$user->id,
            ]);
            return redirect()->route('project.student.index',[$school->id]);
    }
}
