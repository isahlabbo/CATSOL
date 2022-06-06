<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends BaseModel
{
    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class);
    }
}
