<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up() {
        Schema::create('users',function($table){
           $table->increments('id');
           $table->string('firstname');
           $table->string('lastname');
           $table->string('email')->unique();
           $table->integer('correct_answers_count')->default(0);
           $table->string('facebook_id')->unique();
           $table->enum('isActive',array(0,1))->default(0);
           $table->enum('isAdmin',array(0,1))->default(0);
           $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('users');
    }

}
