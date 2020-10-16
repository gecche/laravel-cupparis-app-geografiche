<?php

use Gecche\Breeze\Facades\Schema;
use Gecche\Breeze\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCupGeoComuniTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cup_geo_comuni', function(Blueprint $table)
		{
            			$table->increments('id');
			$table->string('descrizione');
			$table->boolean('capoluogo')->nullable();
			$table->string('codice_istat',6)->unique();
            $table->string('codice_catastale',6)->unique();
			$table->integer('provincia_id')->unsigned()->index();
			$table->foreign('provincia_id')->references('id')->on('cup_geo_province')->onDelete('restrict')->onUpdate('cascade');
			
			

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cup_geo_comuni');
	}

}
