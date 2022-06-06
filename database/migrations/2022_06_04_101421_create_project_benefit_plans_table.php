<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectBenefitPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_benefit_plans', function (Blueprint $table) {
            $table->id();
            $table->integer('management')->default(30);
            $table->integer('write_team')->default(25);
            $table->integer('development_team')->default(20);
            $table->integer('refferal_token')->default(5);
            $table->integer('supervisor_token')->default(15);
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
        Schema::dropIfExists('project_benefit_plans');
    }
}
