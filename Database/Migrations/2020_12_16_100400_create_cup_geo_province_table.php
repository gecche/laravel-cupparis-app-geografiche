<?php

use Gecche\Breeze\Facades\Schema;
use Gecche\Breeze\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCupGeoProvinceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cup_geo_province', function(Blueprint $table)
		{
            			$table->increments('id');
			$table->string('sigla',2)->nullable();
			$table->string('nome_it');
			$table->string('codice',3)->unique();
			$table->string('codice_nuovo',3)->unique();
			$table->integer('area_id')->unsigned()->index();
			$table->foreign('area_id')->references('id')->on('cup_geo_aree')->onDelete('restrict')->onUpdate('cascade');
			$table->integer('regione_id')->unsigned()->index();
			$table->foreign('regione_id')->references('id')->on('cup_geo_regioni')->onDelete('restrict')->onUpdate('cascade');
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
		Schema::drop('cup_geo_province');
	}

}
