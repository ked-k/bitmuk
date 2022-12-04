@extends('backend.layouts.app')
@section('title')
    {{ __('Users Details') }}
@endsection
@section('content')

    <section class="section">
        <div class="section-header">
            @if($user->role == 'user')
                <h1>{{ __('Users Details') }}</h1>
            @else
                <h1>{{ __('Merchant Details') }}</h1>
            @endif

            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.users.index') }}"
                   class="btn btn-primary form-btn float-right">{{ __('Back') }}</a>
            </div>
        </div>


        @include('stisla-templates::common.errors')
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="{{avatar($user->avatar)}}"
                                 class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">{{ __('Total Transactions') }}</div>
                                    <div class="profile-widget-item-value">{{ $user->successTransition() }}</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">{{ __('Referred Users') }}</div>
                                    <div
                                        class="profile-widget-item-value">{{ $user->getReferrals()->first()->relationships()->count() }}</div>
                                </div>

                            </div>
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label"> {{ __('Name') }}</div>
                                    <div class="profile-widget-item-value">{{ $user->full_name }}</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">{{ __('Created At') }}</div>
                                    <div class="profile-widget-item-value">{{ $user->created_at->diffForHumans() }}</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">{{ __('Status') }}</div>
                                    <div class="profile-widget-item-value">
                                        @if($user->status == 1)
                                            <div class="badge badge-success">{{ __('Active') }}</div>
                                        @else
                                            <div class="badge badge-danger">{{ __('Not Active') }}</div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="profile-widget-description">

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>{{ __('Wallet information') }}</h4>
                                </div>
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-striped table-md">
                                            <tbody>
                                            @foreach($user->balance as $raw)
                                                <tr>
                                                    <td>{{ $raw->wallet_name }}</td>
                                                    <td>{{$raw->amount}}</td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            @if($user->withdrawAccount)
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h4>{{ __('Withdraw Account') }}</h4>
                                    </div>
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table class="table table-striped table-md">
                                                <tbody>
                                                @foreach($user->withdrawAccount as $account)
                                                    <tr>
                                                        <td>{{ __('Account Type') }}</td>
                                                        <td>{{$account->account_type}}</td>
                                                    </tr>
                                                    @foreach($account->acfs()->get() as $value )
                                                        <tr>
                                                            <td>{{  $value->key }}</td>
                                                            <td>{{$value->value}}</td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="card card-danger">
                                <div class="card-header">
                                    <h4>{{ __('Add/Subtract Balance') }}</h4>
                                </div>
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-striped table-md">
                                            <tbody>

                                            <tr>
                                                <td>{{ __('Add Balance') }}</td>
                                                <td><a href="{{ route('admin.add.balance.view',$user->id) }}"
                                                       class="btn btn-success"><i class="far fa-file"></i></a></td>
                                                <td>{{ __('Subtract Balance') }}</td>
                                                <td><a href="{{ route('admin.remove.balance.view',$user->id) }}"
                                                       class="btn btn-danger"><i class="far fa-file"></i></a></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-info">
                                <div class="card-header">
                                    <h4>{{ __('KYC Verification') }}</h4>
                                </div>
                                <div class="card-body">

                                    @php
                                        $kyc = $user->kyc->first()
                                    @endphp

                                    <div class="mb-3">
                                        <div class="budget-price justify-content-center">
                                            <div class="budget-price-square bg-primary"></div>
                                            <div class="budget-price-label">{{ __('Selfe') }}</div>
                                        </div>
                                        <div class="chocolat-parent mb-3">
                                            <a href="{{avatar($kyc->selfe ?? null)}}" class="chocolat-image"
                                               title="Selfe">
                                                <div data-crop-image="285">
                                                    <img alt="image" src="{{avatar($kyc->selfe ?? null)}}"
                                                         class="img-fluid">
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="budget-price justify-content-center">
                                            <div class="budget-price-square bg-warning"></div>
                                            <div class="budget-price-label">{{ __('Passport/Driving license') }}</div>
                                        </div>
                                        <div class="chocolat-parent mb-3">
                                            <a href="{{avatar($kyc->driving_or_passport ?? null)}}"
                                               class="chocolat-image" title="Passport/Driving license">
                                                <div data-crop-image="285">
                                                    <img alt="image"
                                                         src="{{avatar($kyc->driving_or_passport ?? null )}}"
                                                         class="img-fluid">
                                                </div>
                                            </a>
                                        </div>
                                    </div>


                                    @if(isset($kyc->status) && $kyc->status == \App\Models\Kyc::APPROVED)
                                        <button class="btn btn-success"><i
                                                class="far fa-file"></i> {{ __('Account Verified') }}
                                        </button>
                                    @else
                                        <a href="{{ route('admin.kyc.update',['id' => $user->id, 'status' =>\App\Models\Kyc::APPROVED]) }}"
                                           class="btn btn-success"><i class="far fa-file"></i> {{ __('Approve Now') }}
                                        </a>
                                    @endif
                                    <a href="{{ route('admin.kyc.update',['id' => $user->id, 'status' =>\App\Models\Kyc::REJECTED]) }}"
                                       class="btn btn-danger"><i class="far fa-file"></i> {{ __('Reject Now') }} </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'patch', 'files' => true, 'class' => 'needs-validation']) !!}
                        <div class="card-header">
                            <h4>{{ __('Edit Profile') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @include('backend.users.fields')
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">{{ __('Save Changes') }}</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


