<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends BaseModel
{
    public function admissions()
    {
        return $this->hasMany(Admission::class);
    }

    public function academicSession()
    {
        return $this->belongsTo(AcademicSession::class);
    }

    public function reservedAdmissionNos()
    {
        return $this->hasMany(ReservedAdmissionNo::class);
    }

    public function durationInSeconds()
    {
        return strtotime($this->end) - strtotime($this->start);
    }

    public function durationInWeeks()
    {
        return floor($this->durationInSeconds()/604800);
    }

    public function currentWeek()
    {
        return floor((time() - strtotime($this->start))/604800) + 1;
    }

    public function remainingWeeks()
    {
        return $this->durationInWeeks() - $this->currentWeek();
    }
}
