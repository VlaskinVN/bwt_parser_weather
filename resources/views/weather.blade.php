@extends('layouts.app')

@section('content')
<div class="content">
    <div class="title" style="font-size: 64px">
        {{ $city }} <!--Переменная с название города-->
    </div>
    <hr>

    <div class="title" style="font-size: 30px;">
        <span>Дата : {{ $date }}</span><br>
    </div><br>

    @for($i = 0; $i < count($temperature) - 1; $i++)
        <div class="title" style="font-size: 20px; text-align: left; margin-left: 5%">
            <span>Время дня : {{ $time[$i] }}</span><br>
            <span>Температура : {{ $temperature[$i] }} C</span><br>
            <span>Характеристики погоды : {{ $weather[$i] }}</span><br>            
        </div>
        <br><br>
    @endfor

    
</div>
@endsection