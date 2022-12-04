@extends('frontend.user.dashboard')

@section('title')
    {{ __('Support') }}
@endsection

@section('user-dashboard-content')

    <div class="card">
        <div class="card-header">
            {{ __('New support ticket') }}
        </div>
        <div class="card-body">
            <div class="site-form mb-30">
                <form method="post" action="{{ route('user.support.ticket.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-sm-12 mb-10">
                            <label for="title">{{ __('Subject') }}</label>
                            <input name="title" type="text" placeholder="Subject" required>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-sm-12 mb-10">
                            <label for="deposit-currency">{{ __('Support Department') }}</label>
                            <select name="department_id" required>
                                <option value="0">{{ __('Select Department') }}</option>
                                @foreach($department as $raw)
                                    <option value="{{$raw->id}}">{{$raw->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-sm-12 mb-10">
                            <label for="payment-note">{{ __('Message') }}</label>
                            <textarea name="message" rows="4" placeholder="Message" id="payment-note"></textarea>
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


