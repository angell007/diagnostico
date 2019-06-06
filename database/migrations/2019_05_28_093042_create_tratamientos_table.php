<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTratamientosTable extends Migration
{
    public function up()
    {
        // create table
        Schema::create('tratamientos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->text('descripcion');
            $table->unsignedInteger('enfermedad_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        // drop table
        Schema::dropIfExists('tratamientos');
    }
}
