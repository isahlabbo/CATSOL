<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Server extends BaseModel
{
    public function studentProjects()
    {
        return $this->hasMany(StudentProject::class);
    }
}
