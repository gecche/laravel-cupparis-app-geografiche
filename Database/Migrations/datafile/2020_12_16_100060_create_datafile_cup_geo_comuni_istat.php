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

            $table->string('codice_regione')->nullable();
            $table->string('codice_provincia_nuovo')->nullable();
            $table->string('codice_provincia')->nullable();
            $table->string('progressivo_comune')->nullable();
            $table->string('codice_istat')->nullable();
            $table->string('nome_all')->nullable();
            $table->string('nome_it')->nullable();
            $table->string('nome_altra_lingua')->nullable();

            $table->string('codice_area')->nullable();
            $table->string('area')->nullable();
            $table->string('regione')->nullable();
            $table->string('provincia')->nullable();

            $table->string('tipo_provincia')->nullable();
            $table->string('capoluogo')->nullable();
            $table->string('sigla_provincia')->nullable();

            $table->string('codice_istat_numerico')->nullable();
            $table->string('codice_istat_numerico_110')->nullable();
            $table->string('codice_istat_numerico_107')->nullable();
            $table->string('codice_istat_numerico_103')->nullable();

            $table->string('codice_catastale')->nullable();
            $table->string('codice_nuts_1')->nullable();
            $table->string('codice_nuts_2')->nullable();
            $table->string('codice_nuts_3')->nullable();

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
