<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchoolProject extends BaseModel
{
    public function supervisor()
    {
        return $this->belongsTo(User::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
