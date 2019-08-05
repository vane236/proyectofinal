<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosMaestrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos_maestros', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('cursos_id')->unsigned();
            //$table->foreign('cursos_id')->references('id')->on('academias')
            //                ->onDelete('set null');

            $table->integer('maestros_id')->unsigned();
            //$table->foreign('maestros_id')->references('id')->on('cursos')
            //                ->onDelete('set null');
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
        Schema::dropIfExists('cursos_maestros');
    }
}
