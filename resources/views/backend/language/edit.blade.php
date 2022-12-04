@extends('backend.layouts.app')
@section('title')
    {{ __('Edit Language') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading m-0">{{ __('Update') }}</h3>
            <div class="filter-container section-header-breadcrumb row justify-content-md-end">
                <a href="{{ route('admin.languages.index') }}" class="btn btn-primary">@lang('crud.back')</a>
            </div>
        </div>
        <div class="content">
            @include('stisla-templates::common.errors')
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body ">
                                {!! Form::open(['route' => ['admin.languages.update',$language->id],'method'=>'put']) !!}

                                <div class="row">
                                    @include('backend.language.fields')
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section">
        <div class="section-body">
            <div class="card">
                <div class="section-header-breadcrumb text-right">
                    <a href="#" class="btn btn-primary form-btn " data-toggle="modal"
                       data-target="#languageDetailsCreate">{{ __('add_new') }} <i class="fas fa-plus"></i></a>
                    @include('backend.language.language_details.datatables_key')
                </div>
                <div class="card-body">
                    @include('backend.language.language_details.table')
                </div>
            </div>
        </div>

        @include('backend.language.language_details.create')
        @include('backend.language.language_details.edit')


    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {

            //Create Language Details
            $(document).on('click', '.add-language-details', function (e) {
                e.preventDefault();

                var data = {
                    'key': $('.key').val(),
                    'value': $('.value').val(),
                    'language_id': $('.language-id').val(),
                }
                console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{route('admin.languages.details.store')}}",
                    data: data,
                    success: function (response) {
                        $('#dataTableBuilder').DataTable().ajax.reload();
                        $('.key').val('')
                        $('.value').val('')
                        $('#languageDetailsCreate').modal('hide')
                    }
                })
            });


            //Edit Language Details
            $(document).on('click', '.edit-language-details', function (e) {
                e.preventDefault();


                var id = $(this).attr("data-id");


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.languages.details.get')}}",
                    data: {
                        id
                    },
                    success: function (response) {
                        // console.log(response)
                        if (response) {
                            $('.edit-key').val(response.key);
                            $('.edit-value').val(response.value);
                            $('.language-details-id').val(response.id);
                        }


                    }
                })

            })

            $(document).on('click', '.update-language-details', function () {
                var data = {
                    'key': $('.edit-key').val(),
                    'value': $('.edit-value').val(),
                    'language_id': $('.language-id').val(),
                    'language_detail_id': $('.language-details-id').val(),
                }
                //console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{route('admin.languages.details.update')}}",
                    data: data,
                    success: function (response) {
                        $('#dataTableBuilder').DataTable().ajax.reload();
                        $('.edit-key').val('')
                        $('.edit-value').val('')
                        $('language-details-id').val('')
                        $('#languageDetailsUpdate').modal('hide')
                    }
                })

            });


        })
    </script>
@endpush
