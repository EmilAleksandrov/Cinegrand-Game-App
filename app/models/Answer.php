<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Answers
 *
 */
use \Illuminate\Database;

class Answer extends Eloquent {

    protected $fillable = array('text');

    public function question() {
        return $this->belongsTo('Question');
    }

}
