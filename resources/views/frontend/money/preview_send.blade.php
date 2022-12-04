@extends('frontend.user.dashboard')

@section('title')
    {{ __('Send Money') }}
@endsection

@section('user-dashboard-content')

    <div class="card">
        <div class="card-header">
            {{ __('Send money') }}
        </div>
        <div class="card-body">
            <div class="site-form mb-30">
                <form action="{{route('user.send.money.store')}}" method="post">
                    @csrf


                    <input type="hidden" name="id" value="{{$previewData['user_id']}}">
                    <input type="hidden" name="wallet_name" value="{{$previewData['wallet_name']}}">
                    <input type="hidden" name="amount" value="{{$previewData['amount']}}">
                    <input type="hidden" name="msg" value="{{$previewData['msg']}}">
                    <input type="hidden" name="fee" value="{{$previewData['fee']}}">

                    <div class="row">
                        <div class="col-12">
                            <div class="transaction-list table-responsive depositPreviewTable">
                                <table class="table">
                                    <tbody>

                                    <tr>
                                        <td>{{ __('Recipient Full Name') }}</td>
                                        <td>{{ $previewData['full_name']}}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Recipient Email') }}</td>
                                        <td>{{ $previewData['email'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Recipient Wallet') }}</td>
                                        <td>{{ $previewData['wallet_name'] }}</td>
                                    </tr>

                                    <tr>
                                        <td>{{ __('Fee') }}</td>
                                        <td>{{ $previewData['fee'] }}</td>
                                    </tr>


                                    <tr>
                                        <td>{{ __('Total Amount') }}</td>
                                        <td>{{ $previewData['amount'] }}</td>
                                    </tr>


                                    <tr>
                                        <td>{{ __('Payment Description (Optional)') }}</td>
                                        <td>{{ $previewData['msg'] }}</td>
                                    </tr>

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


