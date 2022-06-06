<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends BaseModel
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schoolProjects()
    {
        return $this->hasMany(SchoolProject::class);
    }

    public function schoolDepartment(Type $var = null)
    {
        return $this->belongsTo(SchoolDepartment::class);
    }

    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class);
    }
}
