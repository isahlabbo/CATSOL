<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pin extends BaseModel
{
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function admission()
    {
        return $this->hasOne(Admission::class);
    }
}
