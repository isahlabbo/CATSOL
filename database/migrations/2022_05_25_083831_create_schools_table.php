<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->integer('lga_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('lgas')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('school_type_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('school_types')
            ->delete('restrict')
            ->update('cascade');
            $table->string('name');
            $table->string('title');
            $table->string('address')->nullable();
            $table->timestamps();
        });

        $schools = [
            ['name'=>'Usmanu Danfodiyo University Sokoto','title'=>'UDUS'],
            ['name'=>'Sokoto State University of Education','title'=>'SSUE'],
            ['name'=>'Sokoto State University','title'=>'SSU'],
            ['name'=>'Umaru Ali Shinkafi Polytechnic Sokoto','title'=>'UASPOLY'],
        ];
        foreach ($schools as $school) {
            App\Models\School::firstOrCreate($school);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
}
