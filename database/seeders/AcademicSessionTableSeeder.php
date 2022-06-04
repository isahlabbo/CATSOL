<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Batch;
use App\Models\AcademicSession;

class AcademicSessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sessions = [['name'=>'2022/2023','start'=>'16/5/2022','end'=>'16/5/2023','status'=>'active']];
        $batches = [
            ['name'=>'A','start'=>'16/5/2022','end'=>'16/8/2022','status'=>'active'],
            ['name'=>'B','start'=>'16/8/2022','end'=>'16/11/2022','status'=>'not active'],
            ['name'=>'C','start'=>'16/11/2022','end'=>'16/2/2023','status'=>'active'],
            ['name'=>'D','start'=>'16/2/2023','end'=>'16/5/2023','status'=>'active'],
        ];
        foreach($sessions as $session){
            $newSession = AcademicSession::firstOrCreate($session);
            foreach($batches as $batch){
                $newSession->batches()->firstOrCreate($batch);
            }

        }
    }
}
