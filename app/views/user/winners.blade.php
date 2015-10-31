@extends('layouts.master')

@section('content')

<section id="question-number">
    <p class="question-font"> 
        <span id="winnwers-text">ПОБЕДИТЕЛИ</span>
    </p>
    <img src="images/Lines-for-question-number.png" alt="left-line" />
</section>
<section id="winners-list">
    @forelse($winners as $winner)
    <div class="winner-container">
        <div class="winner-position-logo">
            <img src="images/{{$winner->position}}-winner-logo.png" alt="winner-logo"/>
        </div> <!-- winner-position-logo -->
        <section class="winners-image">
            <img src="http://graph.facebook.com/{{$winner->user->facebook_id}}/picture?type=large" />
        </section> <!-- winner-image -->
        <div class="winner-data">
            <div class="winner-info">
                <p>{{$winner->user->firstname}} {{$winner->user->lastname}}</p>
                <p>Печели</p>
            </div> <!-- winner-info -->
            @if($winner->position == 1)
            <div class="winner-gift">
                <p>ГОДИШЕН ВАУЧЕР</p>
                <p>с 12 посещения</p>
            </div> <!-- winner-gift -->
            @elseif($winner->position == 2)
            <div class="winner-gift">
                <p>Награда 2 </p>
                <p>с 12 посещения</p>
            </div> <!-- winner-gift -->      
            @else
            <div class="winner-gift">
                <p>Награда 3</p>
                <p>с 12 посещения</p>
            </div> <!-- winner-gift -->
            @endif
        </div><!-- winner-data -->
    </div>

    @empty
    <h1>Все още играта не е завършила!</h1>
    @endforelse

</section>
@if(count($winners)>0)
<section id="congratulations-container">
    <img src="images/Congratulations-to-the-winners.png" alt="congratulations"/>
</section>
@endif
@stop