<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Pin;

class SectionRegistrationPinController extends Controller
{
    public function index($sectionId)
    {
        return view('school.section.pin.index',['section'=>Section::find($sectionId)]);
    }

    public function register(Request $request,$sectionId)
    {
        $request->validate(['number'=>'required']);
        $section = Section::find($sectionId);

        $section->generateApplicationPin($request->number);
        
        return redirect()->route('school.section.pin.index',[$sectionId]);
    }

    public function sale($sectionId, $pinId)
    {
        $pin = Pin::find($pinId);
        $pin->update(['status'=>'sale']);
        return redirect()->route('school.section.pin.index',[$sectionId]);
    }
    public function delete($sectionId, $pinId)
    {
        $pin = Pin::find($pinId);
        $pin->delete();
        return redirect()->route('school.section.pin.index',[$sectionId]);
    }

    public function print($sectionId)
    {
        return view('school.section.pin.print',['section'=>Section::find($sectionId)]);
    }
}
