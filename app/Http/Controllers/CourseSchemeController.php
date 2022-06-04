<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\SchemeOfWork;

class CourseSchemeController extends Controller
{
    public function index($sectionId, $programmeId, $courseId)
    {
        return view('school.section.programme.course.scheme.index',['course'=>Course::find($courseId)]);
    }

    public function edit($sectionId, $programmeId, $courseId, $schemeId)
    {
        return view('school.section.programme.course.scheme.edit',['scheme'=>SchemeOfWork::find($schemeId)]);
    }

    public function update(Request $request,$sectionId, $programmeId, $courseId, $schemeId)
    {
        $scheme = SchemeOfWork::find($schemeId);
        $scheme->update([
            "module" => $request->module,
            "sub_module" => $request->sub_module,
            "objective" => $request->objective,
            "content" => $request->content,
            "teaching_aids" => $request->teaching_aids,
            "farcilitator_activities" => $request->farcilitator_activities,
            "student_activities" => $request->student_activities,
            "evaluation" => $request->evaluation,
            "significance_area" => $request->significance_area
        ]);
        return redirect()->route('school.section.programme.course.scheme.edit',[$sectionId, $programmeId, $courseId, $schemeId]);
    }
    public function addWeek($sectionId, $programmeId, $courseId)
    {
        $course = Course::find($courseId);
        $scheme = $course->schemeOfWorks()->create(['week'=>count($course->schemeOfWorks)+1]);
        return redirect()->route('school.section.programme.course.scheme.edit',[$sectionId, $programmeId, $courseId, $scheme->id]);
    }

}
