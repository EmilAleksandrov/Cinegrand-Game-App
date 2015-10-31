@extends('admin.layouts.master')

@section('content')
<h1 class='page-header'> 
    Създаване на въпрос
</h1>

<form action="{{URL::route('postAdminCreateQuestions')}}"  method='POST'>
    {{Form::token()}}
    <div class='form-group '>
        <label for='question'>Въпрос:</label>
        <input id='question' class='form-control' type='text' name='question'>
    </div>
    <div class='form-group '>
        <label for='question'>Тип:</label>
        <select  class='form-control' name='type' id="questionType" >
            <option value="0">Обикновен</option>
            <option value="1">Бонус</option>
        </select>    
    </div>
    <div class='form-group '>
        <label for='question'>Отговор а): </label>
        <input id='question' class='form-control' type='text' name='answers[]' value=''>
    </div>

    <div class='form-group '>
        <label for='question'>Отговор б): </label>
        <input id='question' class='form-control' type='text' name='answers[]' value=''>
    </div>

    <div class='form-group '>
        <label for='question'>Отговор в): </label>
        <input id='question' class='form-control' type='text' name='answers[]' value=''>
    </div>

    <div class='form-group' id="bonusQuestionAnswer" style="display: none;">
        <label for='question'>Отговор г): </label>
        <input id='question' class='form-control' type='text' name='answers[]' value=''>
    </div>

    <button class='btn btn-default'>Запиши</button>

</form>

<script>
    $("#questionType").change(function () {
        if($('select[name=type]').val() == 0){
            $('#bonusQuestionAnswer').fadeOut(400);
        }else{
            $('#bonusQuestionAnswer').fadeIn(400);            
        }
    });
</script>

@stop