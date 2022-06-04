<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends BaseModel
{
    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }

    public function schemeOfWorks()
    {
        return $this->hasMany(SchemeOfWork::class);
    }

    public function newScheme()
    {
        $weeks = [1,2,3,4,5,6,7,8,9,10,11,12];
        foreach ($weeks as $week) {
            $this->schemeOfWorks()->firstOrCreate(['week'=>$week]); 
        }
    }
    public function currentWeekScheme()
    {
        return $this->schemeOfWorks->where('week',$this->currentBatch()->currentWeek())->first();
    }
}
