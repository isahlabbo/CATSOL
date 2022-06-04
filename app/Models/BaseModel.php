<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $guarded = [];

    public function currentBatch()
    {
        return $this->currentSession()->batches->where('status','active')->first();
    }

    public function currentSession()
    {
        return AcademicSession::where('status','active')->first();
    }
}
