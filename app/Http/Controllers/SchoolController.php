<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        return view('school.index');
    }

    public function delete($studentId)
    {
        $student = User::find($studentId);
        if($student && count($student->admissions) > 0){
            return back();
        }
        $student->delete();
        return backe();
    }
}
