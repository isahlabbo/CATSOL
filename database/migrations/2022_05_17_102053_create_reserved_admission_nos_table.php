<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservedAdmissionNosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserved_admission_nos', function (Blueprint $table) {
            $table->id();
            $table->integer('batch_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('batches')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('programme_schedule_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('programme_schedules')
            ->delete('restrict')
            ->update('cascade');
            $table->string('admission_no');
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
        Schema::dropIfExists('reserved_admission_nos');
    }
}
