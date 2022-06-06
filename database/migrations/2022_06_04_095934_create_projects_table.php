<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
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
            $table->integer('fee')->default(40000);
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
        Schema::dropIfExists('projects');
    }
}
