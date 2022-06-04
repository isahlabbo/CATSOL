<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Day;
use App\Models\Period;
use App\Models\Schedule;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SectionTableSeeder::class);
        User::firstOrCreate([
            'first_name' => 'Admin',
            'phone' => '08162463010',
            'email' => 'admin@sistrac.com',
            'password' => Hash::make('admin'),
            'role' => 'Admin'
        ]);
        $schedules = ['Morning','Evening','Night','Week End'];
        foreach($schedules as $schedule){
            Schedule::firstOrCreate(['name'=>$schedule]);
        }
        $days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Sarturday','Sunday'];

        foreach ($days as $day) {
            Day::firstOrCreate(['name'=>$day]);
        }

        $periods = [
            ['start'=>'8:00am','end'=>'9:45am','order'=>'1'],
            ['start'=>'9:45am','end'=>'11:30am','order'=>'2'],
            ['start'=>'12:00pm','end'=>'1:45pm','order'=>'3'],
            ['start'=>'2:15pm','end'=>'3:45pm','order'=>'4'],
            ['start'=>'4:15pm','end'=>'6:00pm','order'=>'5'],
            ['start'=>'6:00pm','end'=>'7:45pm','order'=>'6'],
            ['start'=>'8:15pm','end'=>'10:00pm','order'=>'7'],
        ];
        foreach ($periods as $period) {
            Period::firstOrCreate($period);
        }
    }
}
