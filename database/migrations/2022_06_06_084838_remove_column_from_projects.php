<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnFromProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->removeColumn('language_use');
            $table->removeColumn('server_use');
            $table->integer('language_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('languages')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('server_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('servers')
            ->delete('restrict')
            ->update('cascade');
        });

        Schema::table('school_projects', function (Blueprint $table) {
            $table->removeColumn('topic');
            $table->removeColumn('language_use');
            $table->removeColumn('server_use');
            $table->removeColumn('case_study');
            $table->removeColumn('status');
            $table->removeColumn('year');
            $table->removeColumn('refferal_token');
            $table->removeColumn('refferal_token');
        }); 

    }
}
