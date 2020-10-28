<?php

use Gecche\Breeze\Facades\Schema;
use Gecche\Breeze\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCupGeoRegioniTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cup_geo_regioni', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codice', 3)->unique();
            $table->string('nome_it')->unique();
            $table->integer('area_id')->unsigned()->index();
            $table->foreign('area_id')->references('id')->on('cup_geo_aree')->onDelete('restrict')->onUpdate('cascade');
            $table->boolean('attivo')->default(1);// varchar(50) DEFAULT NULL,
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cup_geo_regioni');
    }

}
