@extends('frontend.user.dashboard')

@section('title')
    {{ __('Merchant Apply') }}
@endsection

@section('user-dashboard-content')

    <div class="card mb-30">
        <div class="card-header">
            {{ __('Merchant Form') }}
        </div>
        <div class="card-body">
            <div class="site-form mb-30">
                <form action="{{route('user.apply.merchant.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-sm-12 mb-10">
                            <label for="deposit-amount">{{ __('Merchant Name') }}</label>
                            <input type="text" name="merchant_name" id="deposit-amount" required>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-sm-12 mb-10">
                            <label for="fee-generate">{{ __('Merchant Email') }}</label>
                            <input type="email" name="merchant_email" id="fee-generate" required>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-sm-12 mb-10">
                            <label for="fee-generate">{{ __('Merchant Address') }}</label>
                            <input type="text" name="merchant_address" id="fee-generate" required>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-sm-12 mb-10">
                            <label for="fee-generate">{{ __('Merchant Proof') }}</label>
                            <input type="text" name="merchant_proof" id="fee-generate" required>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-sm-12">
                            <button type="submit" class="bttn-mid btn-fill">{{ __('Apply Now') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

