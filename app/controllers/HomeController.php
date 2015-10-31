<?php

use \Illuminate\Support\Facades;

class HomeController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |
      | You may wish to use controllers instead of, or in addition to, Closure
      | based routes. That's great! Here is an example controller method to
      | get you started. To route to this controller, just add the route:
      |
      |	Route::get('/', 'HomeController@showWelcome');
      |
     */

    public function home() {
        return View::make('user.home');
    }

    public function rules() {
        return View::make('user.rules');
    }

    public function awards() {
        return View::make('user.awards');
    }

    public function getConfirme() {
        if (Auth::user()->isConfirmed == 1) {
            return Redirect::to('winners');
        }
        if (Auth::user()->correct_answers_count == 4) {

            return View::make('user.confirme');
        } else {
            return Redirect::to('getQuestions');
        }
    }

    public function winners() {
        $winners = Winner::with('user')->get();
        return View::make('user.winners')
                ->with('winners',$winners);
    }

    public function conditions() {

        return View::make('user.conditions');
    }

    public function startGame() {
        if (Auth::user()->correct_answers_count == 4) {
            return Redirect::to('confirme');
        } else {
            return View::make('user.startGame');
        }
    }

    public function questions() {
        if (Auth::user()->correct_answers_count < 3) {
            $result = Question::where('type', 0)->get();
        } else if (Auth::user()->correct_answers_count == 3) {
            $result = Question::where('type', 1)->get();
        } else {
            return Redirect::to('confirme');
        }
        $rand = rand(0, count($result) - 1);
        $question = Question::with('answers')->find($result[$rand]->id);
        return View::make('user.questions')
                        ->with('question', $question);
    }

    public function checkAnswer() {
        $question = Question::findOrFail(Input::get('question_id'));
        if ($question->correct_answer_id == Input::get('answer_id')) {
            $user = User::findOrFail(Auth::user()->id);
            $user->correct_answers_count++;
            $user->save();
            return ['isValid' => true];
        } else {
            return ['isValid' => false];
        }
    }

    public function postConfirme() {
        if (Auth::user()->isConfirmed == 1) {
            return Redirect::to('winners');
        } else {
            $user = User::find(Auth::user()->id);
            $user->isConfirmed = 1;
            $user->save();
            return Redirect::to('winners');
        }
    }

}
