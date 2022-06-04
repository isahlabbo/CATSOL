<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends BaseModel
{
    public function studentProjects()
    {
        return $this->hasMany(StudentProject::class);
    }
}
