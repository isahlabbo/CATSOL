<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supervisor;

class SupervisorProjectController extends Controller
{
    public function index($schoolId, $supervisorId)
    {
        return view('project.school.supervisor.project.index',['supervisor'=>Supervisor::find($supervisorId)]);
    }
}
