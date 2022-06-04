<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_projects', function (Blueprint $table) {
            $table->id();
            $table->integer('school_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('schools')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('student_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('students')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('supervisor_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('supervisors')
            ->delete('restrict')
            ->update('cascade');
            $table->string('topic');
            $table->string('language_use');
            $table->string('server_use');
            $table->string('case_study');
            $table->string('status')->default('propose');
            $table->string('year')->default(date('Y'));
            $table->integer('refferal_token')->default(5);
            $table->integer('supervisor_token')->default(25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_projects');
    }
}
