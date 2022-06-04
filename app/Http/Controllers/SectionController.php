<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    public function index()
    {
        return view('school.section.index',['sections'=>Section::all()]);
    }

    public function register(Request $request)
    {
        $request->validate(['name'=>'required','title'=>'required','code'=>'required']);
        Section::firstOrCreate([
            'name'=>$request->name,
            'code'=>$request->code,
            'title'=>$request->title,
        ]);
        return redirect()->route('school.section.index');
    }

    public function update(Request $request, $sectionId)
    {
        $request->validate(['name'=>'required','title'=>'required','code'=>'required']);
        $section = Section::find($sectionId);
        $section->update([
            'name'=>$request->name,
            'code'=>$request->code,
            'title'=>$request->title,
        ]);
        return redirect()->route('school.section.index');
    }

    public function delete($sectionId)
    {
        $section = Section::find($sectionId);
        if(count($section->programmes) == 0){
            $section->delete();
        }
        return redirect()->route('school.section.index');
    }

}
