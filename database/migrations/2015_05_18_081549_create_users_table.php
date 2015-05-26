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
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('password');
            $table->string('prefixname_th');
            $table->string('firstname_th');
            $table->string('lastname_th');
            $table->string('firstname_en');
            $table->string('lastname_en');
            $table->string('prefixname_en');
            $table->bigInteger('faculty_id');
            $table->bigInteger('major_id');
            $table->bigInteger('type_id');
            $table->bigInteger('position_id');
            $table->bigInteger('degree_id');
            $table->string('user_education');
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
