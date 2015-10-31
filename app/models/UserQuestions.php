<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserQuestions
 *
 */
use \Illuminate\Database;

class UserQuestions extends Eloquent {

    protected $table = 'user_questions';

    public function user() {
        return $this->belongsTo('User');
    }

    public function question() {
        return $this->belongsTo('Question');
    }

    public function answer() {
        return $this->belongsTo('Answer');
    }

    //put your code here
}
