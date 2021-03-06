<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnfermedadsTable extends Migration
{
    public function up()
    {
        // create table
        Schema::create('enfermedads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->text('descripcion');
            $table->unsignedInteger('category_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        // drop table
        Schema::dropIfExists('enfermedads');
    }
}
