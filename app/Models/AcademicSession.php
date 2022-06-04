<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicSession extends BaseModel
{
    public function batches()
    {
        return $this->hasMany(Batch::class);
    }
}
