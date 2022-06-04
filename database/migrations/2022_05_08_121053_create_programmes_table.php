<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgrammesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programmes', function (Blueprint $table) {
            $table->id();
            $table->integer('section_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('sections')
            ->delete('restrict')
            ->update('cascade');
            $table->string('name');
            $table->string('title');
            $table->string('code');
            $table->string('fee')->default(5000);
            $table->string('duration')->default(3);
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
        Schema::dropIfExists('programmes');
    }
}
