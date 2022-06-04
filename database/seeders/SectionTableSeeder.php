<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            [
                'name'=>'Computer for Office Task','title'=>'COFOT','code'=>'01',
                'programmes'=>[
                    ['name'=>'COMPUTER APPRECIATION','title'=>'COA','code'=>'01'],
                    ['name'=>'ADVANCE SPREAD SHEET PROCESSING','title'=>'ASP','code'=>'02'],
                    ['name'=>'ADVANCE DOCUMENT PROCESSING','title'=>'ADP','code'=>'03'],
                    ['name'=>'ADVANCE DATABASE MANAGEMENT','title'=>'COA','code'=>'04'],
                ]
            ],
            [
                'name'=>'Computer for Kids','title'=>'COFOK','code'=>'02',
                'programmes'=>[
                    ['name'=>'COMPUTER FOR BASIC SCHOOL KIDS','title'=>'CBK','code'=>'01'],
                    ['name'=>'COMPUTER FOR JUNIOR SECONDARY SCHOOL KIDS','title'=>'CJK','code'=>'02'],
                    ['name'=>'COMPUTER FOR SENIOR SECONDARY SCHOOL KIDS','title'=>'CSK','code'=>'03'],
                ]
            ],
            [
                'name'=>'Computer as Profession','title'=>'CAP','code'=>'03',
                'programmes'=>[
                    ['name'=>'WEB DEVELOPMENT FUNDAMENTAL','title'=>'WDF','code'=>'01'],
                    ['name'=>'DATABASE MANAGEMENT','title'=>'DBM','code'=>'02'],
                    ['name'=>'SERVER SCRIPTING','title'=>'SES','code'=>'03'],
                    ['name'=>'PROFESSIONAL WEB DEVELOPMENT','title'=>'PWD','code'=>'04'],
                    ['name'=>'SOFTWARE ENGINEERING','title'=>'SOE','code'=>'05'],
                ]
            ],
            ['name'=>'Indstrial TRAINING','title'=>'IT','code'=>'04'],
        ];
        foreach($sections as $section){
            $newSection = Section::firstOrCreate([
                'name'=>strtoupper($section['name']),
                'title'=>$section['title'],
                'code'=>$section['code']
            ]);
            if(isset($section['programmes'])){
                foreach($section['programmes'] as $programme){
                    $newSection->programmes()->firstOrCreate($programme);
                }
            }
        }
    }
}
