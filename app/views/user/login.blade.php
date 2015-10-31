@extends('layouts.master')

@section('content')

<div class="row">
    <div class='col-md-12'>
        <h1>Login</h1>
        <form role='form' method="post" action="{{URL::route('postLogin')}}">
            <div class='form-group {{$errors->has('email')?'has-error':''}}'>
                <label for="email">Email: </label>
                <input id='email' name='email' type="text" class='form-control' >
                @if($errors->has('email'))
                {{$errors->first('email')}}
                @endif
            </div>
            <div class='form-group {{$errors->has('password')?'has-error':''}}'>
                <label for="password">Password: </label>
                <input id='password' name='password' type="password" class='form-control' >
                @if($errors->has('password'))
                {{$errors->first('password')}}
                @endif
            </div>
            <div class='form-group'>
                <label form='remeber'>
                    <input type="checkbox" name='remember' id='remeber'  >
                    Remember me!
                </label>
            </div>
            {{Form::token()}}
            <div class='form-group'>
                <button class='btn btn-default'>Register</button>
            </div>
        </form>
    </div>
</div>

@stop