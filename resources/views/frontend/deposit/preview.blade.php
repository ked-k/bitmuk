@extends('frontend.user.dashboard')
@section('title')
    {{ __('Deposit') }}
@endsection
@section('user-dashboard-content')

    <div class="card">
        <div class="card-header">
            {{ __('Deposit Preview') }}
        </div>
        <div class="card-body">
            <div class="site-form">
                <form method="get" action="{{ route('user.deposit.confirm') }}">
                    @csrf
                    <div class="row">

                        <div class="col-12">
                            <div class="transaction-list table-responsive depositPreviewTable">
                                <table class="table">
                                    <tbody>

                                           <tr>
                                               <td>{{ __('Deposit Amount') }}</td>
                                               <td>{{$preview['amount']}}</td>
                                           </tr>
                                           <tr>
                                               <td>{{ __('Wallet Name') }}</td>
                                               <td>{{$preview['wallet_name']}}</td>
                                           </tr>
                                           <tr>
                                               <td>{{ __('Payment Description (Optional)') }}</td>
                                               <td>{{$preview['description']}}</td>
                                           </tr>
                                           <tr>
                                               <td>{{ __('Payment gateway') }}</td>
                                               <td><img  class="depositGatewayImage" src="{{ asset($preview['gateway_logo']) }}" alt="{{$preview['gateway_name']}}"></td>
                                           </tr>

                                           @if($preview['gateway_name'] == 'MTN Money')
                                               <tr>
                                                   <td>{{ __('MTN Number') }}</td>
                                                   <td><input type="number" name="mtn_number" required style="color: black !important;"></td>
                                               </tr>
                                           @endif


                                           @if($preview['gateway_name'] == 'Airtel Money')
                                               <tr>
                                                   <td>{{ __('Airtel Number') }}</td>
                                                   <td><input type="number" name="airtel_number" required style="color: black !important;"></td>
                                               </tr>
                                           @endif

                                    </tbody>
                                </table>
                                <div class="mt-30">
                                    <button type="submit" id="checkout-button"
                                            class="bttn-mid btn-fill">{{ __('Deposit Confirm') }}</button>
                                </div>
                            </div>
                        </div>



                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
