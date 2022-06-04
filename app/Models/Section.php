<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends BaseModel
{

    public function programmes()
    {
        return $this->hasMany(Programme::class);
    }

    public function pins()
    {
        return $this->hasMany(Pin::class);
    }

    public function generateApplicationPin($number)
    {
        for($i = 1; $i <= $number; $i++)
        {
            $pin = $this->getApplicationPin();
            if($pin && $this->pinExist($pin) == null){
                $this->pins()->create(['pin'=>$pin]);
            }
        }
    }
    public function pinExist($pin)
    {
        return Pin::where('pin',$pin)->first();
        
    }
    public function getApplicationPin()
    {
        
        $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
        return $characters[rand(0, strlen($characters) - 1)] .
        mt_rand(5111, 9999) . 
        $characters[rand(0, strlen($characters) - 1)] .
        mt_rand(5111, 9999) . 
        $characters[rand(0, strlen($characters) - 1)] . 
        $characters[rand(0, strlen($characters) - 1)] .
        mt_rand(5111, 9999);
        
        
    }
}
