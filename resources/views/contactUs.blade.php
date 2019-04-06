@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">        
        @if(Session::has('flash-message'))
            <div class="alert alert-success">{{ Session::get('flash-message') }}</div>
        @endif
        <div class=" {{ $errors->any() ? 'panel-header alert alert-danger' : '' }}">
            @if ($errors->has('nameUser'))
                <span class="help-block" style='margin-left:10px'>* {{ $errors->first('nameUser') }}</span><br>
            @endif 
            @if ($errors->has('email'))
                <span class="help-block" style='margin-left:10px'>* {{ $errors->first('email') }}</span><br>
            @endif 
            @if ($errors->has('feedbackText'))
                <span class="help-block" style='margin-left:10px'>* {{ $errors->first('feedbackText') }}</span>
            @endif
        </div>        
        <form method="POST" action="{{ route('contactus.addNewFeedback') }}">
            {{ csrf_field() }}
            <div class="panel-body">
                <div class="form-group">
                    <label for="nameUser">Username : </label><br>
                    <input type="text" name="nameUser" id="nameUser" class="form-control" style="margin:10px" placeholder="User name">   
                </div>
                
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">E-mail : </label><br>
                    <input type="email" name="email" id="email" class="form-control" style="margin:10px" placeholder="E-mail">
                </div>
                <div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
                    <label for="feedbackText">Question : </label><br>
                    <textarea name="feedbackText" id="feedbackText" cols="30" rows="10" class="form-control" style="margin:10px" placeholder="Input text"></textarea>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary" style="margin:10px">
                {{ __('send') }}
            </button>
        </form>
    </div>
</div>
@endsection