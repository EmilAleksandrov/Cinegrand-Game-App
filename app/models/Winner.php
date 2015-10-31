<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Winners
 *
 */
class Winner extends Eloquent {

    public function user() {
        return $this->belongsTo('User');
    }

}
