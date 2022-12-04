@extends('backend.ticket.index')
@section('ticket-content')


<div class="col-xl-8 col-lg-8 col-md-8 col-12">
    <div class="card chat-box card-success" id="mychatbox2">
        <div class="card-header">
            <h4>{{ __('Title:') }} {{ $ticket->title }}</h4>
            <h4> {{ __('Department:') }} {{$ticket->category->name}}</h4>
            <h4> {{ __('Message:') }} {{$ticket->message}}</h4>
        </div>
        <div class="card-body chat-content" tabindex="3" style="overflow: hidden; outline: none;">
            @foreach($ticket->comments as $comment)



            @if($comment->user_id != 0 )
            <div class="chat-item chat-left" style=""><img src="{{ avatar($comment->user->avatar) }}" alt="">
                <div class="chat-details">
                    <div class="chat-text">{{ $comment->comment }}</div>
                    <div class="chat-time">{{ $comment->created_at->diffForHumans() }}</div>
                </div>
             </div>
            @endif
            @if($comment->user_id == 0)
              <div class="chat-item chat-right" style="">
                <img src="{{ asset('assets/images/avatar/avatar-1.png') }}">
                <div class="chat-details">
                    <div class="chat-text">{{ $comment->comment }} </div>
                    <div class="chat-time">{{ $comment->created_at->diffForHumans() }}</div>
                </div>
            </div>
            @endif
            @endforeach
        <div class="card-footer chat-form">
            <form id="chat-form2" action="{{ route('admin.ticket.comment') }}" method="post">
                @csrf
                <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                <input type="text" class="form-control" placeholder="Type a message" name="comment">
                <button class="btn btn-primary">
                    <i class="far fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</div>

@endsection

