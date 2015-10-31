<?php

use \Illuminate\Support\Facades;

class AdminController extends BaseController {

    public function getAdminHome() {
        return View::make('admin.home');
    }

    public function getAdminQuestions() {
        $questions = Question::get();
        return View::make('admin.questions.all')
                        ->with('questions', $questions);
    }

    public function getAdminCreateQuestions() {
        return View::make('admin.questions.create');
    }

    public function getAdminEditQuestions($question_id) {
        $question = Question::with('answers')->OrderBy('id', 'DESC')->findOrFail($question_id);
        return View::make('admin.questions.edit')
                        ->with('question', $question);
    }

    public function getUsers() {
        $users = User::where('isConfirmed',1)->get();
        return View::make('admin.users.all')
                        ->with('users', $users);
    }

    public function getEditUser($user_id) {
        $user = User::findOrFail($user_id);
        $winner = Winner::where('user_id', $user_id)->first();
        return View::make('admin.users.show')
                        ->with('user', $user)
                        ->with('winner', $winner);
    }

    public function postAdminCreateQuestions() {

        $validate = Validator::make(Input::all(), array(
                    'question' => 'required',
                    'type' => 'required'
        ));

        if ($validate->fails()) {
            return Redirect::route('getAdminEditQuestions', $question->id)->withErrors($validate)->withInput();
        } else {
            $question = new Question();
            $question->text = Input::get('question');
            $question->type = Input::get('type');
            try {
                $question->save();

                $formAnswers = Input::get('answers');
                $answers = array();
                $countOfAnswers = 0;
                if (Input::get('type') == 0) {
                    $countOfAnswers = 3;
                } else {
                    $countOfAnswers = 4;
                }
                for ($i = 0; $i < $countOfAnswers; $i++) {
                    $answers[] = new Answer(array('text' => $formAnswers[$i]));
                }
                $question->answers()->saveMany($answers);
                return Redirect::route('getAdminEditQuestions', $question->id);
            } catch (Exception $ex) {
                return Redirect::route('getAdminEditQuestions', $question->id);
            }
        }
    }

    public function postAdminEditQuestions($question_id) {
        $question = Question::with('answers')->findOrFail($question_id);
        $question->text = Input::get('question');
        $question->correct_answer_id = Input::get('correct_answer');
        foreach ($question->answers as $answer) {
            $answer->text = Input::get('answers')[$answer->id];
            $answer->save();
        }
        if ($question->save()) {
            return Redirect::route('getAdminEditQuestions', $question_id)
                            ->with('success', 'You have edit question successfully.');
        } else {
            return Redirect::route('getAdminEditQuestions', $question_id)
                            ->with('fail', 'Error. Please try again later.');
        }
    }

    public function postEditUser($user_id) {
        $winner = new Winner();
        $winner->user_id = $user_id;
        $winner->position = Input::get('position');
        $winner->save();
        return Redirect::route('getEditUser',$user_id);
    }

}
