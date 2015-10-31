@extends('admin.layouts.master')

@section('content')
<h1 class='page-header'> 
    Въпроси!
</h1>
<div class='row'>
    <div class='col-md-12'>
        <a class='btn btn-info' href='{{URL::route('getAdminCreateQuestions')}}'>
            <span class='glyphicon glyphicon-plus'></span>
            Създай нов въпрос
        </a>
    </div>
</div>

<div class='row'>
    <div class='col-md-12'>
        <br>
        <ul class="list-group">
            @foreach($questions as $question)
            <li class="list-group-item">
                <div class='row'>
                    <div class='col-md-12'>
                        <a href='{{URL::route('getAdminEditQuestions',$question->id)}}' class='pull-left'>{{{$question->text}}}</a>
                        <a href='{{URL::route('getAdminEditQuestions',$question->id)}}' class='btn btn-info btn-sm pull-right'>Проемни</a>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>

@stop