@extends('backend.layouts.app')
@section('title')
    {{ __('Add New') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading m-0">{{ __('Add Balance') }}</h3>
            <div class="filter-container section-header-breadcrumb row justify-content-md-end">
                <a href="{{ route('admin.users.edit',$id) }}" class="btn btn-primary">{{ __('back') }}</a>
            </div>
        </div>
        <div class="content">
            @include('stisla-templates::common.errors')
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body ">
                                {!! Form::open(['route' => 'admin.add.balance']) !!}
                                <div class="row">

                                    <input type="hidden" name="id" value="{{$id}}">

                                    <!-- First Name Field -->
                                    <div class="form-group col-sm-6">
                                        {!! Form::label('Amount', 'Amount') !!}
                                        <input type="text" name="amount" oninput="this.value = onlyNumber(this.value)" class="form-control">
                                    </div>


                                    <!-- Country Field -->
                                    <div class="form-group col-sm-6">
                                        {!! Form::label('wallet', 'Wallet') !!}
                                        {!! Form::select('wallet', $wallet,null, ['class' => 'form-control']) !!}
                                    </div>


                                    <!-- Submit Field -->
                                    <div class="form-group col-sm-12">
                                        {!! Form::submit('Add Now', ['class' => 'btn btn-primary']) !!}
                                        <a href="{{ route('admin.users.edit',$id) }}"
                                           class="btn btn-light">{{ __('Cancel') }}</a>
                                    </div>

                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
