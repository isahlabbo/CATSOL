<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecture;
use App\Models\ProgrammeSchedule;

class ScheduleLectureController extends Controller
{
    public function index($sectionId, $programmeId, $programmeScheduleId)
    {
        return view('school.section.programme.lecture.index',['programmeSchedule'=>ProgrammeSchedule::find($programmeScheduleId)]);
    }

    public function register(Request $request,$sectionId, $programmeId, $programmeScheduleId)
    {
        
        $request->validate([
            'course'=>'required|string',
            'period'=>'required|string',
            'day'=>'required'
            ]);
        $programmeSchedule = ProgrammeSchedule::find($programmeScheduleId);
        $programmeSchedule->lectures()->firstOrCreate([
            'course_id'=>$request->course,
            'period_id'=>$request->period,
            'day_id'=>$request->day,
        ]);
        return redirect()->route('school.section.programme.schedule.lecture.index',[$sectionId,$programmeId,$programmeScheduleId]);
    }

    public function update(Request $request, $sectionId, $programmeId, $scheduleId, $lectureId)
    {
        
        $request->validate([
            'course'=>'required|string',
            'period'=>'required|string',
            'day'=>'required'
            ]);
        $lecture = Lecture::find($lectureId);
        $lecture->update([
            'course_id'=>$request->course,
            'period_id'=>$request->period,
            'day_id'=>$request->day,
        ]);
        return redirect()->route('school.section.programme.schedule.lecture.index',[$sectionId,$programmeId, $lecture->programmeSchedule->id]);
    }

    public function delete($sectionId,$programmeId, $courseId)
    {
        $course = Course::find($courseId);
        if(count($course->lectures) == 0){
            $course->delete();
        }
        return redirect()->route('school.section.programme.course.index',[$sectionId,$programmeId]);
        
    }
}
