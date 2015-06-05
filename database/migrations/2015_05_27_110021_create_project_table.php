<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('project', function($table){
            $table->bigIncrements('id');
            $table->string('name_th');
            $table->string('name_en');
            $table->string('contract');
            $table->bigInteger('budget_id');
            $table->bigInteger('user_id');
            $table->bigInteger('faculty_id');
            $table->string('period');
            $table->double('projbudget');
            $table->text('problem');
            $table->text('purpose');
            $table->text('methodology');
            $table->text('plan');
            $table->text('publish');
            $table->text('coresearcher');
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
        Schema::dropIfExists('project');
    }

}
