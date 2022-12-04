@extends('backend.layouts.app')
@section('title')
    {{ __('Support Ticket') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Tickets') }}</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">{{ __('Help Your Customer') }}</h2>
            <p class="section-lead">
                {{ __('Some customers need your help.') }}
            </p>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Tickets') }}</h4>
                        </div>
                        <div class="card-body">

                            <div class="mb-3">
                                <a href="{{route('admin.ticket')}}"
                                   class="btn btn-icon icon-left btn-primary {{is_active('admin.ticket')}}"><i
                                        class="fas fa-info-circle"></i> Pending</a>
                                <a href="{{route('admin.close.ticket')}}"
                                   class="btn btn-icon icon-left btn-danger {{is_active('admin.close.ticket')}}"><i
                                        class="fas fa-times"></i> Closed</a>
                            </div>


                            <div class="tickets">
                                <div class="row">

                                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                    <div class="ticket-items" id="ticket-items">
                                        @foreach($closeTickets ?? $tickets as $ticket)

                                            @if($ticket->status == true)
                                                <a href="{{route('admin.ticket.close',$ticket->id)}}"
                                                   class="support-ticket-close"><i class="fas fa-times"></i></a>
                                            @endif


                                            <a href="{{route('admin.ticket.details',$ticket->id)}}">
                                                <div
                                                    class="ticket-item {{ Request::routeIs('admin.ticket.details')? (Request::route()->parameters['id'] == $ticket->id ? 'active' : ''):'' }}">
                                                    <div class="ticket-title">
                                                        <h4>{{$ticket->title}}</h4>
                                                    </div>
                                                    <div class="ticket-desc">
                                                        <div>{{$ticket->user->full_name}}</div>
                                                        <div class="bullet"></div>
                                                        <div>{{$ticket->created_at->diffForHumans() }}</div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>

                                @yield('ticket-content')

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
