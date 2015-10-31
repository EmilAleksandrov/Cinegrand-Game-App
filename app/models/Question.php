<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Question
 *
 */
use \Illuminate\Database;

class Question extends Eloquent {

    protected $fillable = array('text', 'type','correct_answer');

    public function answers() {
        return $this->hasMany('Answer');
    }

}
