<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('company_id')->unsigned()->index('users_company_id_foreign');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password');
			$table->boolean('admin')->default(0);
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			$table->boolean('status')->default(1);
			$table->string('image');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
