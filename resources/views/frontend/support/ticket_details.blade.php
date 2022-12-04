@extends('frontend.user.dashboard')

@section('title')
    {{ __('Support') }}
@endsection

@section('user-dashboard-content')

    <div  class="card">
        <div class="card-header">
            {{ __('Ticket Details') }}
        </div>
        <div class="card-body">


            <div class="profile-card-body">

                <h5 class="mb-20">{{ __('Ticket Topic') }}</h5>
                <div class="row mb-40">
                    <div class="col-sm-3 col-3">
                        <div class="left-info">
                            <p>{{ __('Name') }}</p>
                            <p>{{ __('Subject') }}</p>
                            <p>{{ __('Department') }}</p>
                            <p>{{ __('Message') }}</p>
                        </div>
                    </div>
                    <div class="col-sm-9 col-9">
                        <div class="right-info">
                            <p>{{$user->full_name}}</p>
                            <p>{{$ticket->title }}</p>
                            <p>{{$ticket->category->name }}</p>

                            <p>{{$ticket->message}}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <h5 class="mb-20" >{{ __('Ticket Replies') }}</h5>
                @foreach($ticket->comments as $comment)
                    <div class="row {{ $comment->user->full_name == " " ? 'admin'  : 'user' }}-ticket-single-reply">
                        <div class="col-sm-2 col-2">
                            <div class="left-info">
                                <p>{{$comment->user->full_name == " " ? 'admin'  : $comment->user->full_name }}</p>
                            </div>
                        </div>
                        <div class="col-sm-10 col-10">
                            <div class="right-info">
                                <p>{!! $comment->comment !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="site-form mb-30">
                <form method="post" action="{{ route('user.support.ticket.comment') }}">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                        <div class="col-xl-12 col-lg-12 col-sm-12 mb-10">
                            <label for="payment-note">{{ __('Write reply') }}</label>
                            <textarea name="comment" rows="4" placeholder="Message" id="payment-note"></textarea>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-12">
                            <button type="submit" class="bttn-mid btn-fill">{{ __('Submit') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
