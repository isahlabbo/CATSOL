<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_departments', function (Blueprint $table) {
            $table->id();
            $table->integer('school_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('schools')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('department_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('departments')
            ->delete('restrict')
            ->update('cascade');
            $table->timestamps();
        });
        
        foreach(App\Models\School::all() as $school){
            $school->schoolDepartments()->firstOrCreate(['department_id'=>1]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_departments');
    }
}
