<?php

use Gecche\Breeze\Facades\Schema;
use Gecche\Breeze\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCupGeoNazioniTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cup_geo_nazioni', function(Blueprint $table)
		{
		    $table->increments('id');// int(11) NOT NULL,
            $table->string('codice')->unique();// varchar(4) DEFAULT NULL,
            $table->string('nome_it',255);// varchar(50) DEFAULT NULL,
            $table->string('nome_en',255)->nullable();// varchar(50) DEFAULT NULL,

            $table->nullableOwnerships();
            $table->nullableTimestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cup_geo_nazioni');
	}

}
