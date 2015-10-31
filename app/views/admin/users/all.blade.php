@extends('admin.layouts.master')

@section('content')
<h1 class='page-header'> 
    Потребители!
</h1>
<div class="list-group">

    @forelse($users as $user)
    <a href="{{URL::route('getEditUser',$user->id)}}" class="list-group-item ">
        {{{$user->firstname}}} {{{$user->lastname}}}
    </a>

    @empty
    <div class="alert alert-info">
        Няма потребители
    </div>

    @endforelse
</div>

@stop