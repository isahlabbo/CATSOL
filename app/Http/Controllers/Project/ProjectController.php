<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School;

class ProjectController extends Controller
{
    public function index()
    {
        return view('project.index');
    }

    public function schoolProject($schoolId)
    {
        return view('project.school.index',['school'=>School::find($schoolId)]);
    }
}
