<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pin;
use App\Models\User;
use App\Models\Admission;
use Illuminate\Support\Facades\Hash;
use App\Models\ProgrammeSchedule;
use App\Services\Upload\FileUpload;

class StudentController extends Controller
{
    use FileUpload;

    public function index()
    {
        return view('school.student.index',['students'=>User::where('role','Student')->get()]);
    }

    public function create()
    {
        return view('school.student.create');
    }

    public function delete($studentId)
    {
        $student = User::find($studentId);
        if($student && count($student->admissions) > 0){
            return back();
        }
        $student->delete();
        return back();
    }

    public function edit($studentId)
    {
        return view('school.student.edit',['student'=>User::find($studentId)]);
    }

    public function newAdmission($studentId, $pinId)
    {
        return view('school.student.admission',['student'=>User::find($studentId),'pin'=>Pin::find($pinId)]);
    }

    public function register(Request $request)
    {
       
        $request->validate([
            "first_name" => "required|string",
            "other_names" => "required|string",
            "email" => "required|email|unique:users",
            "phone" => "required|unique:users",
            "next_of_kin_phone" => "required",
            "gender" => "required",
            "lga" => "required",
            "date_of_birth" => "required",
            "address" => "required",
        ]);
        
            $user = User::create([
                'first_name'=>strtoupper($request->first_name),
                'other_names'=>strtoupper($request->other_names),
                'phone'=>$request->phone,
                'email'=>$request->email,
                'gender_id'=>$request->gender,
                'password'=>Hash::make('123456'),
                'next_of_kin_phone'=>$request->next_of_kin_phone,
                'lga_id'=>$request->lga,
                'address'=>$request->address,
                'date_of_birth'=>$request->date_of_birth,
                ]);
            if($request->picture){
                $this->storeFile($user, 'profile_photo_path',
                $request->picture,str_replace('/','-',$user->lga->currentSession()->name).
                '/Batch '.substr($user->lga->currentBatch(),0,1).'/'.
                'Pictures/');
            }    
        
        return redirect()->route('school.student.index');
       
    }

    public function usePin(Request $request, $studentId)
    {
        $request->validate(['pin'=>'required']);
        $pin = Pin::find($request->pin);
        return redirect()->route('school.student.newAdmission',[$studentId, $pin->id]);
       
    }

    public function newProgramme(Request $request,$studentId, $pinId)
    {
        $student = User::find($studentId);
        $programmeSchedule = ProgrammeSchedule::find($request->programme_schedule);
        $pin = Pin::find($pinId);
        $admission = $student->admissions()->create([
            'pin_id'=>$pin->id,
            'admission_no'=> $programmeSchedule->generateAdmissionNo(),
            'programme_schedule_id'=>$request->programme_schedule,
            'skills_applying_with'=>$request->skills_applying_with,
            'date'=>time(),
            'batch_id'=>$pin->currentBatch()->id
            ]); 
        $pin->update(['status'=>'used']);
           
        return redirect()->route('school.admission.confirm',[$admission->id]);
       
    }

    public function update(Request $request, $studentId)
    {
        
        $request->validate([
            "first_name" => "required|string",
            "other_names" => "required|string",
            "email" => "required|email",
            "phone" => "required|string",
            "next_of_kin_phone" => "required",
            "gender" => "required",
            "lga" => "required",
            "address" => "required",
            ]);
       
            $student = User::find($studentId);
            $student->update([
                'first_name'=>strtoupper($request->first_name),
                'other_names'=>strtoupper($request->other_names),
                'phone'=>$request->phone,
                'email'=>$request->email,
                'gender_id'=>$request->gender,
                'next_of_kin_phone'=>$request->next_of_kin_phone,
                'lga_id'=>$request->lga,
                'address'=>$request->address,
                'date_of_birth'=>$request->date_of_birth,
                ]);    
            if($request->picture){
                $this->updateFile($user, 'profile_photo_path',
                $request->picture,str_replace('/','-',$student->lga->currentSession()->name).
                '/Batch '.substr($student->lga->currentBatch(),0,1).'/'.
                'Pictures/');
            }
        return redirect()->route('school.student.edit',[$student->id]);
    }
}
