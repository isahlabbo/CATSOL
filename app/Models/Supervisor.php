<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supervisor extends BaseModel
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schoolDepartment()
    {
        return $this->belongsTo(SchoolDepartment::class);
    }

    public function schoolRank()
    {
        return $this->belongsTo(SchoolRank::class);
    }

    public function schoolProjects()
    {
        return $this->hasMany(SchoolProject::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
