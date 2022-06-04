<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Programme;
use App\Models\ProgrammeSchedule;

class ProgrammeScheduleController extends Controller
{
    public function index($sectionId, $programmeId)
    {
        return view('school.section.programme.schedule.index',['programme'=>Programme::find($programmeId)]);
    }

    public function register(Request $request,$sectionId, $programmeId)
    {
        $request->validate(['schedule_id'=>'required']);
        $programme = Programme::find($programmeId);
        $schedule = Schedule::find($request->schedule_id);
        $programme->programmeSchedules()->create([
            'schedule_id'=>$request->schedule_id,
            'name'=>$schedule->name,
        ]);
        return redirect()->route('school.section.programme.schedule.index',[$sectionId,$programmeId]);
    }

    public function update(Request $request, $sectionId, $programmeId, $programmeScheduleId)
    {
        $request->validate(['schedule_id'=>'required','status'=>'required']);
        $programmeSchedule = ProgrammeSchedule::find($programmeScheduleId);
        $programmeSchedule->update([
            'schedule_id'=>$request->schedule_id,
            'status'=>$request->status,
        ]);
        return redirect()->route('school.section.programme.schedule.index',[$sectionId,$programmeId]);
    }

    public function delete($sectionId,$programmeId, $programmeScheduleId)
    {
        $programmeSchedule = ProgrammeSchedule::find($programmeScheduleId);
        if(count($programmeSchedule->admissions) == 0){
            $programmeSchedule->delete();
        }
        return redirect()->route('school.section.programme.schedule.index',[$sectionId,$programmeId]);
        
    }
}
