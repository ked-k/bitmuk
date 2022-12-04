@extends('frontend.user.dashboard')

@section('title')
    {{ __('Change Password') }}
@endsection

@section('user-dashboard-content')


    <div class="card mb-30">
        <div class="card-header">
            {{ __('Change Password') }}
        </div>
        <div class="card-body">
            <div class="profile-card-body">
                <form action="{{ route('user.new.password') }}" method="post">
                    @csrf

                    @foreach ($errors->all() as $error)
                        @php
                            notify()->warning($error);
                        @endphp
                    @endforeach

                    <div class="row">
                        <div class="col-12">
                            <div class="right-info profile-form">

                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="single">
                                            <label>{{ __('Current Password') }}</label>
                                            <input class="box-input" type="password" name="current_password">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="single">
                                            <label>{{ __('New Password') }}</label>
                                            <input class="box-input" name="new_password" type="password">
                                        </div>
                                    </div>


                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="single">
                                            <label>{{ __('New Confirm Password') }}</label>
                                            <input class="box-input" name="new_confirm_password" type="password">
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>

                    <button class="bttn-small btn-fill" type="submit">{{ __('Change Password Now') }}</button>
                </form>

            </div>
        </div>
    </div>

@endsection

