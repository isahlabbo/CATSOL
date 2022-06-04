<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends BaseModel
{
    public function admission()
    {
        return $this->belongsTo(Admission::class);
    }
}
