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

    public function register(Request $request, $schoolId, $supervisorId)
    {
        
        $supervisor = Supervisor::find($supervisorId);
        $supervisor->projects()->create([
            'topic'=>$request->topic,
            'language_use'=>$request->language,
            'server_use'=>$request->server,
            'case_study'=>$request->case_study,
            'year'=>$request->year,
            'status'=>$request->status,
            'fee'=>$request->fee,
        ]);

        return redirect()->route('project.supervisor.project.index',[$schoolId, $supervisorId]);
    }
}
