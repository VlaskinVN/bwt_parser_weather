@extends('layouts.app')

@section('content')
<h1>{{ $text }}</h1>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class=" {{ $errors->has('username') ? 'panel-header alert alert-danger' : '' }}">
            @if ($errors->has('username'))
                <span class="help-block" style='margin-left:10px'>* {{ $errors->first('username') }}</span><br>
            @endif 
            @if ($errors->has('email'))
                <span class="help-block" style='margin-left:10px'>* {{ $errors->first('email') }}</span><br>
            @endif 
            @if ($errors->has('text'))
                <span class="help-block" style='margin-left:10px'>* {{ $errors->first('text') }}</span>
            @endif
        </div>        
        <form method="POST" action="{{ url('contactus') }}">
            {{ csrf_field() }}
            <div class="panel-body">
                <div class="form-group">
                    <input type="text" name="username" id="username" class="form-control" style="margin:10px" placeholder="User name">   
                </div>
                
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" id="email" class="form-control" style="margin:10px" placeholder="E-mail">
                </div>
                <div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
                    <textarea name="text" id="text" cols="30" rows="10" class="form-control" style="margin:10px" placeholder="Input text"></textarea>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary" style="margin:10px">
                {{ __('send') }}
            </button>
        </form>
    </div>
</div>
@endsection