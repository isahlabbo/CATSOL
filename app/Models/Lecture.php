<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends BaseModel
{
    public function period()
    {
        return $this->belongsTo(Period::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function programmeSchedule()
    {
        return $this->belongsTo(ProgrammeSchedule::class);
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }
}
