<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservedAdmissionNo extends BaseModel
{
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function programmeSchedule()
    {
        return $this->belongsTo(ProgrammeSchedule::class);
    }
}
