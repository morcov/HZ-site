<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('name_en')->nullable();
			$table->string('name_ua')->nullable();
			$table->text('description')->nullable();
			$table->integer('year')->nullable();
			$table->float('time')->nullable();
			$table->integer('series')->nullable();
			$table->boolean('enabled')->default(1);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
