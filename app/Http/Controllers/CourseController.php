<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Programme;

class CourseController extends Controller
{
    public function index($sectionId, $programmeId)
    {
        return view('school.section.programme.course.index',['programme'=>Programme::find($programmeId)]);
    }

    public function register(Request $request,$sectionId, $programmeId)
    {
        $request->validate([
            'name'=>'required|string',
            'title'=>'required|string',
            'code'=>'required'
            ]);
        $programme = Programme::find($programmeId);
        $programme->courses()->create([
            'name'=>$request->name,
            'code'=>$request->code,
            'title'=>$request->title,
        ]);
        return redirect()->route('school.section.programme.course.index',[$sectionId,$programmeId]);
    }

    public function update(Request $request, $sectionId, $programmeId, $courseId)
    {
        $request->validate([
            'name'=>'required|string',
            'title'=>'required|string',
            'code'=>'required'
            ]);
        $course = Course::find($courseId);
        $course->update([
            'name'=>$request->name,
            'code'=>$request->code,
            'title'=>$request->title,
        ]);
        $course->newScheme();
        
        return redirect()->route('school.section.programme.course.index',[$sectionId,$programmeId]);
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
