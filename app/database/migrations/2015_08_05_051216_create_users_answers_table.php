<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAnswersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('user_questions', function($table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('question_id');
            $table->integer('answer_id');
            $table->enum('isCorrect', array(0, 1))->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
         Schema::drop('users_questions');
    }

}
