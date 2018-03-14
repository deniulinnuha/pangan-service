<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComoditiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comodities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_categories')->unsigned();
            $table->string('name');
            $table->timestamps();

            $table->foreign('id_categories')->references('id')->on('categories');          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comodities');
    }
}
