<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Programme;

class ProgrammeController extends Controller
{
    public function index($sectionId)
    {
        return view('school.section.programme.index',['section'=>Section::find($sectionId)]);
    }

    public function register(Request $request, $sectionId)
    {
        $request->validate(['name'=>'required','title'=>'required','code'=>'required']);
        $section = Section::find($sectionId);
        $section->programmes()->firstOrCreate([
            'name'=>$request->name,
            'code'=>$request->code,
            'title'=>$request->title,
        ]);
        return redirect()->route('school.section.programme.index',[$section->id]);
    }

    public function update(Request $request, $sectionId, $programmeId)
    {
        $request->validate(['name'=>'required','title'=>'required','code'=>'required']);
        $programme = Programme::find($programmeId);
        $programme->update([
            'name'=>$request->name,
            'code'=>$request->code,
            'title'=>$request->title,
            'fee'=>$request->fee,
        ]);
        return redirect()->route('school.section.programme.index',[$sectionId]);
    }

    public function delete($sectionId, $programmeId)
    {
        $programme = Programme::find($programmeId);
        if(count($programme->programmeSchedules) == 0){
            $programme->delete();
        }
        return redirect()->route('school.section.programme.index',[$sectionId]);
    }
}