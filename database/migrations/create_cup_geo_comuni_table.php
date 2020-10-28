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
			$table->string('nome_it');
			$table->boolean('capoluogo')->nullable();
			$table->string('codice_istat',6)->unique();
            $table->string('codice_catastale',6)->unique();
			$table->integer('provincia_id')->unsigned()->index();
			$table->foreign('provincia_id')->references('id')->on('cup_geo_province')->onDelete('restrict')->onUpdate('cascade');
            $table->string('sigla_provincia',2);
            $table->integer('regione_id')->unsigned()->index();
            $table->foreign('regione_id')->references('id')->on('cup_geo_regioni')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('area_id')->unsigned()->index();
            $table->foreign('area_id')->references('id')->on('cup_geo_aree')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('nazione_id')->unsigned()->index()->nullable()->default(null);
            $table->foreign('nazione_id')->references('id')->on('cup_geo_nazioni')->onDelete('restrict')->onUpdate('cascade');
			$table->string('cap',6)->nullable();
            $table->string('prefisso',6)->nullable();
            $table->decimal('lat',10,8)->nullable();
            $table->decimal('lng',11,8)->nullable();
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
		Schema::drop('cup_geo_comuni');
	}

}
