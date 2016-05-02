<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionPagesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sessionPages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('parent_id');
			$table->string('name');
			$table->string('url');
			$table->boolean('newpage');
			$table->text('content');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sessionPages');
	}

}
