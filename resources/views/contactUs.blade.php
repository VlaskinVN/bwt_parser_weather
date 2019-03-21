@extends('layouts.app')

@section('content')

<form method="POST" action="{{ url('contactus') }}">

    {{ csrf_field() }}

    <input type="text" name="text" id="text">


    <button type="submit" class="btn btn-primary">
        {{ __('send') }}
    </button>
    </form>
@endsection