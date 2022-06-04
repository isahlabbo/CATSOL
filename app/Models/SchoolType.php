<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolType extends BaseModel
{
    public function schools()
    {
        return $this->hasMany(School::class);
    }
}
