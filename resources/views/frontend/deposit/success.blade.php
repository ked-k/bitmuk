@extends('frontend.user.dashboard')
@section('title')
    {{ __('Deposit') }}
@endsection
@section('user-dashboard-content')
    <div class="card">
        <div class="card-header">
            {{ __('Deposit money') }}
        </div>
        <div class="card-body">
            <div class="sent-success">
                <div class="icon">
                    <i class="ti-check"></i>
                </div>
                <h3>{{ __('Successfully Deposited') }}</h3>
                <p>{{ __("You've Successfully deposited money to your account") }}</p>
                <a href="{{route('user.deposit.now')}}" class="bttn-small btn-fill">{{ __('Deposit money again') }}</a>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        setTimeout(function () {
            window.location.href;
        }, 1000);
    </script>

@endsection
