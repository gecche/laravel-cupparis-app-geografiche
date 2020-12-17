<?php

use Gecche\Breeze\Facades\Schema;
use Gecche\Breeze\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCupGeoAreeMondialiTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cup_geo_aree_mondiali', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codice', 3)->unique();
            $table->string('nome_it')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cup_geo_aree_mondiali');
    }

}
