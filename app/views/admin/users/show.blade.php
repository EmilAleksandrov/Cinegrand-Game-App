@extends('admin.layouts.master')

@section('content')
<h1 class='page-header'> 
    Преглед на потребител!
</h1>
<ul>
    <li>Имена: {{{$user->firstname}}} {{{$user->lastname}}}</li>
    <li>Имейл:  {{{$user->email}}}</li>
    <li>Facebook id:  {{{$user->facebook_id}}}</li>
    <li>Потвърдил участие:{{{$user->isConfirmed?'Да':'Не'}}}</li>

</ul>
@if(is_null($winner))
<p>Направи победител</p>
<form method="POST" action="{{URL::route('postEditUser',$user->id)}}" role="form">
    {{Form::token()}}
    <label>   
        <input type="radio" name="position" value="1"> Първо място
    </label>
    <br>
    <label>   
        <input type="radio" name="position" value="2"> Второ място
    </label>
    <br>
    <label>   
        <input type="radio" name="position" value="3"> Трето място
    </label>
    <br>
    <button class="btn btn-info">Направи победител</button>
</form>
@else
Този потребител вече е награден
@endif

@stop