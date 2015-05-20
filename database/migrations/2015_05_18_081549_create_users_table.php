<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('users', function($table)
        {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->string('prefixname_th');
            $table->string('firstname_th');
            $table->string('lastname_th');
            $table->string('firstname_en');
            $table->string('lastname_en');
            $table->string('prefixname_en');
            $table->string('user_faculty');
            $table->string('user_major');
            $table->string('user_type');
            $table->string('user_position');
            $table->string('user_education');
            $table->string('user_degree');
            $table->string('user_institution');
            $table->timestamps();
            $table->rememberToken();
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
		Schema::dropIfExists('users');
	}

}
