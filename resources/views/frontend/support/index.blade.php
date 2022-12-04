@extends('frontend.user.dashboard')

@section('title')
    {{ __('Support') }}
@endsection

@section('user-dashboard-content')


    <div class="card mb-20">
        <div class="card-header">
            {{ __('Support Ticket') }}
            <a href="{{route('user.support.ticket.create')}}">{{ __('Create New Ticket') }}</a>
        </div>
        <div class="transaction-list table-responsive">
            <table class="table table-hover link-account-table">
                <thead>
                <tr>
                    <th scope="col">{{ __('Date') }}</th>
                    <th scope="col">{{ __('Title') }}</th>
                    <th scope="col">{{ __('Support department') }}</th>
                    <th scope="col">{{ __('Status') }}</th>
                    <th scope="col">{{ __('Action') }}</th>

                </tr>
                </thead>
                <tbody>


                @foreach($user->tickets->reverse() as $ticket)
                    <tr>
                        <td><span>{{$ticket->created_at->diffForHumans()}}</span></td>
                        <td> {{$ticket->title}}</td>
                        <td>{{$ticket->category->name }}</td>
                        <td><i class="{{ $ticket->status == 0 ? 'ti-flag-alt cl-yellow' : 'ti-check cl-primary' }}"
                               data-toggle="tooltip" data-placement="top" title=""></i></td>
                        <td>
                            <a class="bttn-small btn-fill" href="{{route('user.support.ticket.details',$ticket->id)}}"> {{ __('View') }}</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection

