<?php

use Illuminate\Database\Migrations\Migration;
use Gecche\Breeze\Database\Schema\Blueprint;

class CreateDatafileCupGeoComuniAggiuntive extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('datafile_cup_geo_comuni_aggiuntive', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('row')->unsigned()->nullable();
			$table->integer('datafile_id')->unsigned()->nullable();

            $table->string('codice_istat')->nullable();

            $table->string('cap')->nullable();
            $table->string('prefisso')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('datafile_cup_geo_comuni_aggiuntive');
	}

}
