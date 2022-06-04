<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgrammeSchedule extends BaseModel
{
    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function reservedAdmissionNos()
    {
        return $this->hasMany(ReservedAdmissionNo::class);
    }

    public function admissions()
    {
        return $this->hasMany(Admission::class);
    }

    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }

    public function generateAdmissionNo()
    {
        $admission = $this->reservedAdmissionNos->where('batch_id',$this->currentBatch()->id)->first();
        if($admission){
            $admission->delete();
            return $admission->admission_no;
        }

        return $this->programme->title.'/'.substr(date('Y'),'2','2').
        $this->currentBatch()->name.substr($this->schedule->name,0,1).'/'.
        $this->formatSerialNo(count($this->admissions->where('batch_id',$this->currentBatch()->id))+1);
    }

    public function formatSerialNo($number)
    {
        if($number < 10){
            $number = '00'.$number;
        }else{
            $number = '0'.$number;
        }
        return $number;
    }
}
