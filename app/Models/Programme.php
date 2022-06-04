<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends BaseModel
{
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function pins()
    {
        return $this->hasMany(Pin::class);
    }
    
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function programmeSchedules()
    {
        return $this->hasMany(ProgrammeSchedule::class);
    }

    public function remainingSchedules()
    {
        $remain = [];
        $registered = [];
        foreach ($this->programmeSchedules as $programmeSchedule) {
            $registered[] = $programmeSchedule->schedule_id;
        }
        foreach (Schedule::all() as $schedule) {
            if(!in_array($schedule->id, $registered)){
                $remain[] = $schedule;
            }
        }

        return $remain;
    }

   
}
