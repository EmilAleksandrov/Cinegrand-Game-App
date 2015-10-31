@extends('layouts.master')

@section('content')
<?php
$arrayOfChars = array('а)', 'б)', 'в)', 'г)');
?>
<section id="question-number">
    <p class="question-font"> 
        <?php if (Auth::user()->correct_answers_count == 3): ?>
            <span>ВЪПРОС Бонус</span>
        <?php else: ?>
            Въпрос {{Auth::user()->correct_answers_count+1}}
        <?php endif; ?>
    </p>
    <img src="images/Lines-for-question-number.png" alt="left-line" />
</section>
<?php
//echo $answerIds;
?>
<section id="question">
    <article id="question-text"> 
        <h1 class="question-font"> {{{$question->text}}} </h1> 
        <?php if (Auth::user()->correct_answers_count == 3): ?>
            <img src="images/Cine-grand-text.png" alt="cine-grand-text" /> 
            <div>
                <p> ? </p>
            </div>

        <?php endif; ?>
    </article> 
    <?php
    $i = 0;
    foreach ($question->answers as $key => $answer) {
        ?> 
        <article> 
            <p class="question-font">
                <?= $arrayOfChars[$i] . ' ' ?> 
                <span class="answer-underline" onclick="selectAnswer({{$answer->id}}, $(this))">
                    {{{$answer->text}}}
                </span>
            </p>
        </article> 
        <?php
        $i++;
    }
    ?>
    <section id="question-result">
        <p class="question-font">Твоите верни отговори</p>
        <div id="game-score">
            <p class="question-font"> <span id="{{(Auth::user()->correct_answers_count > 0)?'green-id-num':''}}">{{Auth::user()->correct_answers_count}} </span>/ 3</p>
        </div>
    </section>
</section>
{{Form::token()}}
<script>
            isClickable = true;
            function selectAnswer(answer_id, answerObj){
            if (isClickable){
            ajaxData = {
            'answer_id':answer_id,
                    'question_id':'{{$question->id}}',
                    '_token':$('input[name=_token]').val()
            }
            $.ajax({
            type: "POST",
                    url : "{{URL::route('checkAnswer')}}",
                    data : ajaxData,
                    success : function(data){
                    if (data.isValid){
                    $('#popup-success').fadeIn(400);
                    } else{
                    $('#popup-error').fadeIn(400);
                    }
                    isClickable = false;
                    }
            }, "json");
            }

            }
</script>

@stop

