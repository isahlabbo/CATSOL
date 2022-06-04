<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchemeOfWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheme_of_works', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('courses')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('week');
            $table->string('module')->nullable();
            $table->string('sub_module')->nullable();
            $table->string('objective')->nullable();
            $table->string('content')->nullable();
            $table->string('teaching_aids')->nullable();
            $table->string('farcilitator_activities')->nullable();
            $table->string('student_activities')->nullable();
            $table->string('evaluation')->nullable();
            $table->string('significance_area')->nullable();
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
        Schema::dropIfExists('scheme_of_works');
    }
}
