<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends BaseModel
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function pin()
    {
        return $this->belongsTo(Pin::class);
    }

    public function programmeSchedule()
    {
        return $this->belongsTo(ProgrammeSchedule::class);
    } 
    
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function getLectureAtThisPeriod(Period $period, Day $day)
    {
        $periodLecture = null;
        
        foreach($this->programmeSchedule->lectures->where('day_id',$day->id)->where('period_id',$period->id) as $lecture){
            $periodLecture = $lecture; 
        }
        return $periodLecture;
    }

    public function paidFee()
    {
        $amount = 0;
        foreach ($this->payments as $payment) {
            $amount+=$payment->amount;
        }
        return $amount;
    }

    public function pendingFee()
    {
       return $this->programmeSchedule->programme->fee - $this->paidFee();
    }

    public function reGenerateAdmissionNo($programmeScheduleId)
    {
        // reserve the current admission no
        $this->reserveThisNo();
        // generate another admission no for the student
        $this->update(['admission_no'=>ProgrammeSchedule::find($programmeScheduleId)->generateAdmissionNo()]);
    }

    public function reserveThisNo(Type $var = null)
    {
        $this->batch->reservedAdmissionNos()->create([
            'programme_schedule_id'=>$this->programmeSchedule->id,
            'admission_no'=>$this->admission_no
        ]);
    }
}
