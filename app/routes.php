<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */
Route::get('/rules', array('uses' => 'HomeController@rules', 'as' => 'rules'));
Route::get('/awards', array('uses' => 'HomeController@awards', 'as' => 'awards'));
Route::get('/winners', array('uses' => 'HomeController@winners', 'as' => 'winners'));
Route::get('/conditions', array('uses' => 'HomeController@conditions', 'as' => 'conditions'));


Route::group(array('before' => 'guest'), function() {

    Route::get('/', array('uses' => 'HomeController@home', 'as' => 'home'));
    Route::post('/', 'HomeController@home');
    Route::group(array('before' => 'csrf'), function() {

        Route::post('/user/create', array('uses' => 'UserController@postCreate', 'as' => 'postCreate'));
    });
});


Route::group(array('before' => 'auth'), function() {

    Route::get('/startGame', array('uses' => 'HomeController@startGame', 'as' => 'startGame'));
    Route::get('/confirme', array('uses' => 'HomeController@getConfirme', 'as' => 'confirme'));
    Route::get('/questions', array('uses' => 'HomeController@questions', 'as' => 'getQuestions'));
    Route::get('/user/logout', array('uses' => 'UserController@getLogout', 'as' => 'getLogout'));

    Route::group(array('before' => 'csrf'), function() {
        Route::post('/answer/check', array('uses' => 'HomeController@checkAnswer', 'as' => 'checkAnswer'));
        Route::post('/confirme', array('uses' => 'HomeController@postConfirme', 'as' => 'postConfirme'));
    });
});



Route::group(array('before' => 'admin'), function() {

    Route::group(['prefix' => 'admin'], function() {

        Route::get('/', array('uses' => 'AdminController@getAdminHome', 'as' => 'getAdminHome'));
        Route::get('/questions', array('uses' => 'AdminController@getAdminQuestions', 'as' => 'getAdminQuestions'));
        Route::get('/questions/create', array('uses' => 'AdminController@getAdminCreateQuestions', 'as' => 'getAdminCreateQuestions'));
        Route::get('/questions/{question_id}/edit', array('uses' => 'AdminController@getAdminEditQuestions', 'as' => 'getAdminEditQuestions'));

        Route::get('/users', array('uses' => 'AdminController@getUsers', 'as' => 'getUsers'));
        Route::get('/user/{user_id}/edit', array('uses' => 'AdminController@getEditUser', 'as' => 'getEditUser'));


        Route::group(array('before' => 'csrf'), function() {
            Route::post('/questions/create', array('uses' => 'AdminController@postAdminCreateQuestions', 'as' => 'postAdminCreateQuestions'));
            Route::post('/questions/{question_id}/edit', array('uses' => 'AdminController@postAdminEditQuestions', 'as' => 'postAdminEditQuestions'));
            Route::post('/user/{user_id}/edit', array('uses' => 'AdminController@postEditUser', 'as' => 'postEditUser'));
        });
    });
});
