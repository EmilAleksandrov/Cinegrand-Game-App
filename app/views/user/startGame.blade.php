@extends('layouts.master')
@section('content')
<section class="begin-text-logo">
    <img src="images/Select-correct-answers-text.png" alt="select-correct-answer-text" />
</section>
<section class="begin-btn">
    <a href="{{URL::route('getQuestions')}}">
        <span id="btn-start-game" class="image-button"></span>
    </a>
    <!--<input type="submit" id="btn-start-game" class="image-button" value="" />-->
</section>
@stop