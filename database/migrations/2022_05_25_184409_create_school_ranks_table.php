<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_ranks', function (Blueprint $table) {
            $table->id();
            $table->integer('school_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('schools')
            ->delete('restrict')
            ->update('cascade');
            $table->string('name');
            $table->timestamps();
        });
        
        $ranks = ['Head of Department','Exam Officer','Lecturer'];
        foreach(App\Models\School::all() as $school){
            foreach ($ranks as $rank) {
                $school->schoolRanks()->firstOrCreate(['name'=>$rank]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_ranks');
    }
}
