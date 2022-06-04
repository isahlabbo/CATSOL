<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchoolDepartment extends BaseModel
{
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
