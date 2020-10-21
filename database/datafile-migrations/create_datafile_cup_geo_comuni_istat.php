<?php

use Illuminate\Database\Migrations\Migration;
use Gecche\Breeze\Database\Schema\Blueprint;

class CreateDatafileCupGeoComuniIstat extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('datafile_cup_geo_comuni_istat', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('row')->unsigned()->nullable();
			$table->integer('datafile_id')->unsigned()->nullable();

            $table->string('codice_area')->nullable();
            $table->string('area')->nullable();
            $table->string('codice_regione')->nullable();
            $table->string('regione')->nullable();
            $table->string('codice_provincia')->nullable();
            $table->string('provincia')->nullable();
            $table->string('codice_provincia_nuovo')->nullable();
            $table->string('sigla_provincia')->nullable();
            $table->string('codice_comune')->nullable();
            $table->string('capoluogo_comune')->nullable();
            $table->string('codice_catastale_comune')->nullable();
            $table->string('comune')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('datafile_cup_geo_comuni_istat');
	}

}
