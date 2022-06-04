<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends BaseModel
{
    public function schoolType()
    {
        return $this->belongsTo(SchoolType::class);
    }

    public function lga()
    {
        return $this->belongsTo(Lga::class);
    }

    public function schoolProjects()
    {
        return $this->hasMany(SchoolProject::class);
    }
    
    public function schoolDepartments()
    {
        return $this->hasMany(SchoolDepartment::class);
    }

    public function schoolRanks()
    {
        return $this->hasMany(SchoolRank::class);
    }

    public function supervisors()
    {
        return $this->hasMany(Supervisor::class);
    }

    


}
