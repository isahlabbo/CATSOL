<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pin;
use App\Models\Lga;
use App\Models\ProgrammeSchedule;

class AjaxController extends Controller
{
    
    public function getSchedules($programmeId)
    {
        return response()->json(ProgrammeSchedule::where(['programme_id'=>$programmeId,'status'=>'active'])->pluck('name','id'));
    }

    public function getLgas($state_id)
    {
        return response()->json(Lga::where('state_id',$state_id)->pluck('name','id'));
    }

    public function getPins($sectionId)
    {
        return response()->json(Pin::where(['section_id'=>$sectionId,'status'=>'available'])->pluck('pin','id'));
    }
    
    
}
