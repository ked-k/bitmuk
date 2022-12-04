@extends('frontend.merchant.dashboard')

@section('title')
    {{ __('KYC update') }}
@endsection

@section('merchant-dashboard-content')


    <div class="card mb-30">
        <div class="card-header">
            {{ __('KYC Update') }}
        </div>
        <div class="card-body">
            @if(!$kyc || $kyc->status === \App\Models\Kyc::REJECTED)
                <div class="profile-card-body">
                    <form action="{{ route('merchant.kyc.update') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach

                        <div class="row">
                            <div class="col-12">
                                <div class="right-info">
                                    <div class="row">

                                        <div class="col-xl-12 col-lg-12 col-md-12">

                                            @foreach($fields as  $key => $value)

                                                <div class="single mb-20">
                                                    <label>{{ $value['label'] }}</label>
                                                    <div id="image-preview-{{$key}}" class="image-preview">
                                                        <label for="image-upload"
                                                               id="image-label">{{ __('Choose File') }}</label>
                                                        <input type="file" name="{{$value['name']}}"
                                                               id="image-upload-{{$key}}"/>
                                                    </div>

                                                    @include('backend.include.__image_script')
                                                </div>
                                            @endforeach


                                        </div>


                                    </div>


                                </div>
                            </div>
                        </div>

                        <button class="bttn-small btn-fill" type="submit">{{ __('Submit KYC') }}</button>
                    </form>

                </div>
            @elseif($kyc->status === \App\Models\Kyc::PENDING)
               <p>{{ __('KYC Pending') }}</p>
            @else
             <p>{{ __('KYC Approved') }}</p>
            @endif
        </div>
    </div>

@endsection

