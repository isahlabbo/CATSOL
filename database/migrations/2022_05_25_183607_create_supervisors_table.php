<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisors', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('users')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('school_department_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('school_departments')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('school_rank_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('school_ranks')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('school_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('schools')
            ->delete('restrict')
            ->update('cascade');
            $table->string('title')->nullable();
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
        Schema::dropIfExists('supervisors');
    }
}
