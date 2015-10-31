@extends('layouts.master')

@section('content')
<section id="question-number">
    <p class="question-font"> 
        <span id="success-question">ЧЕСТИТО</span>
    </p>
    <img src="images/Lines-for-question-number.png" alt="left-line" />
</section>
<section id="question">
    <article id="confirm-participation"> 
        <h1 class="question-font"> ПОТВЪРДИ УЧАСТИЕТО СИ В ТОМБОЛАТА </h1> 
    </article> 
    <section class="confirm-submit-container">
        <form method="POST" action="{{URL::route('postConfirme')}}">
            {{Form::token()}}
            <input type="submit" name="confirm" class="image-button" value />
        </form>
        <input type="submit" name="confirm" class="image-button" value />
    </section> 
    <section id="annual-voucher-container">
        <img src="images/Annual-voucher-logo.png" alt="annual-voucher-logo" />
    </section>
</section>
@stop