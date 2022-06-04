<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends BaseModel
{
    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }
}
