<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pin;
use App\Models\User;
use App\Models\Admission;
use App\Models\ProgrammeSchedule;
use App\Models\AcademicSession;
use Illuminate\Support\Facades\Hash;
use App\Services\Upload\FileUpload;

class AdmissionController extends Controller
{
    use FileUpload;

    public function admissions($academicSessionId)
    {
        return view('school.admission.index',['session'=>AcademicSession::find($academicSessionId)]);
    }

    public function changePin (Request $request, $admissionId)
    {
        $pin = Pin::where('pin',$request->pin)->first();
        $admission = Admission::find($admissionId);
        
        if($pin && $pin->status != 'used'){
           $admission->update(['pin_id'=>$pin->id]);
           return redirect()->route('school.section.programme.schedule.student.edit',[
            $admission->programmeSchedule->programme->section->id,
            $admission->programmeSchedule->programme->id,
            $admission->id
            ]);
        }else{
            return redirect()->route('school.index');
        }
    }
    public function verifyPin (Request $request)
    {
        $pin = Pin::where('pin',$request->pin)->first();
        
        if($pin && $pin->status != 'used'){
            return redirect()->route('school.admission.create',[$pin->id]);
        }else{
            return redirect()->route('school.index');
        }
    }

    public function create($pinId)
    {
        return view('school.admission.create',['pin'=>Pin::find($pinId)]);
    }

    public function register(Request $request, $pinId)
    {
        $request->validate([
            "first_name" => "required|string",
            "other_names" => "required|string",
            "programme_schedule" => "required",
            "email" => "required|email|unique:users",
            "phone" => "required|unique:users",
            "next_of_kin_phone" => "required",
            "skills_applying_with" => "required",
            "picture" => "",
            "gender" => "required",
            "lga" => "required",
            "date_of_birth" => "required",
            "address" => "required",
            ]);
        $pin = Pin::find($pinId);
        $programmeSchedule = ProgrammeSchedule::find($request->programme_schedule);
        if($pin && $pin->admission == null){
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
                $request->picture,str_replace('/','-',$pin->currentSession()->name).
                '/Batch '.substr($pin->currentBatch(),0,1).'/'.$programmeSchedule->programme->name.'/'.$programmeSchedule->name.'/'.
                'Pictures/');
            }    
            $admission = $user->admissions()->create([
                'pin_id'=>$pin->id,
                'admission_no'=> $programmeSchedule->generateAdmissionNo(),
                'programme_schedule_id'=>$request->programme_schedule,
                'skills_applying_with'=>$request->skills_applying_with,
                'date'=>time(),
                'batch_id'=>$pin->currentBatch()->id
                ]); 
            $pin->update(['status'=>'used']);   
        }else{
            return redirect()->route('school.index');
        }

        return redirect()->route('school.admission.confirm',[$admission->id]);
    }

    public function confirm($admissionId)
    {
        return view('school.admission.confirm',['admission'=>Admission::find($admissionId)]);
    }

    
    public function index($sectionId,$programmeId, $programmeScheduleId)
    {
        return view('school.section.programme.schedule.student.index',
        ['programmeSchedule'=>ProgrammeSchedule::find($programmeScheduleId)]);
    }
    public function edit($sectionId, $programmeId, $admissionId)
    {
        return view('school.section.programme.schedule.student.edit',
        ['admission'=>Admission::find($admissionId)]);
    }

    public function delete($sectionId, $programmeId, $admissionId)
    {
        $admission = Admission::find($admissionId);
        $admission->reserveThisNo();
        if(count($admission->user->admissions) == 1){
            $admission->user->delete();
        }
        $admission->delete();
        return redirect()->route('school.section.programme.schedule.admission.index',[$sectionId, $programmeId, $admission->programmeSchedule->id]);
    }

    public function update(Request $request, $sectionId, $programmeId, $admissionId)
    {
        
        $request->validate([
            
            "programme_schedule" => "required",
            
            ]);
        $admission = Admission::find($admissionId);
        
           
               
            if($request->programme_schedule != $admission->programme_schedule_id){
                $admission->reGenerateAdmissionNo($request->programme_schedule);
            }    
            $admission->update([
                'programme_schedule_id'=>$request->programme_schedule,
                'skills_applying_with'=>$request->skills_applying_with,
                'date'=>time(),
                ]);
        return redirect()->route('school.section.programme.schedule.student.edit',[$sectionId, $programmeId, $admissionId]);
    }

    
}
