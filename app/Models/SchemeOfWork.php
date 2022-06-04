<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchemeOfWork extends BaseModel
{
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
