<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends BaseModel
{
    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }

    public function isToday()
    {
        if(substr($this->name,0,3) == date('D')){
            return true;
        }
    }
}
