<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademiasCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academias_cursos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('academias_id')->unsigned();
            $table->foreign('academias_id')->references('id')
                ->on('academias')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('cursos_id')->unsigned();

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
        Schema::dropIfExists('academias_cursos');
    }
}
