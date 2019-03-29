@extends('layouts.app')

@section('content')

    <div class="conteiner">
        
            @foreach($feedbacks as $feed)
                <div class="card" style="margin:40px">
                    <div class="card-header"><h5>{{ $feed->nameUser }} - ({{ $feed->email }})</h5></div>
                    <div class="card-body"><h6>{{ $feed->feedbackText }}</h6></div>    
                </div>  
            @endforeach

            <div style="margin:40px">{{ $feedbacks->links() }}</div>
        
                 
    </div>    
@endsection