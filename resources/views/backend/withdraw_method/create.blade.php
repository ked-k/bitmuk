@extends('backend.layouts.app')

@section('title')
    {{ __('Add New withdraw method') }}
@endsection

@section('content')



    <section class="section">
        <div class="section-header">
            <h1>{{ __('Add New withdraw method') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{route('admin.withdraw.method.index')}}" class="btn btn-primary form-btn" id="add-new-type"><i
                        class="fas fa-list"></i> {{ __('Withdraw method List') }} </a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <form id="setting-form" action="{{route('admin.withdraw.method.store')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h4>{{ __('Details') }}</h4>
                                </div>
                                <div class="card-body">


                                    <div class="row">
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>{{ __('Method Name') }}</label>
                                            <input type="text" class="form-control" name="getaway_name" required>
                                            <div class="invalid-feedback">
                                                {{ __('Oh no! Name is invalid.') }}
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>{{ __('Currency') }}</label>
                                            <select class="form-control" name="currency">
                                                @foreach($currency as $raw)
                                                    <option value="{{ $raw }}">{{$raw}}</option>.
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>{{ __('Minimum Amount ') }}</label>
                                            <input type="number" class="form-control" name="min_amount" required>
                                            <div class="invalid-feedback">
                                                {{ __('Oh no! amount is invalid.') }}
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>{{ __('Maximum Amount ') }}</label>
                                            <input type="number" class="form-control" name="max_amount" required>
                                            <div class="invalid-feedback">
                                                {{ __('Oh no! amount is invalid.') }}
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>{{ __('Fixed Charge') }}</label>
                                            <input type="number" class="form-control" name="fixed_fee" required>
                                            <div class="invalid-feedback">
                                                {{ __('Oh no! Charge is invalid.') }}
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>{{ __('Percentage Charge (%)') }}</label>
                                            <input type="number" class="form-control" name="percentage_fee" required>
                                            <div class="invalid-feedback">
                                                {{ __('Oh no! Charge is invalid.') }}
                                            </div>
                                        </div>

                                    </div>

                                    <table class="table table-bordered" id="dynamicTable">
                                        <tr>
                                            <th>{{ __('Field Name') }}</th>
                                            <th>{{ __('Field Type') }}</th>
                                            <th>{{ __('Field Required') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="fields[0][name]"
                                                       placeholder="Enter Field Name" class="form-control"/></td>
                                            <td>
                                                <select class="form-control" name="fields[0][field_type]">
                                                        <option value="text">{{ __('Text') }}</option>
                                                        <option value="number">{{ __('Number') }}</option>
                                                        <option value="email">{{ __('Email') }}</option>
                                                </select>
                                            </td>

                                            <td>
                                                <label class="custom-switch mt-2">
                                                    <input  type="checkbox" name="fields[0][field_required]" value="required" class="custom-switch-input" checked>
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <button type="button" name="add" id="add"
                                                        class="btn btn-success">{{ __('Add More') }}</button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="card-footer bg-whitesmoke text-md-right">
                                    <button class="btn btn-primary" id="save-btn">{{ __('Add New') }}</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>

    </section>


@endsection

@section('scripts')
    <script>
        var i = 0;

        $("#add").click(function () {

            ++i;

            $("#dynamicTable").append('<tr>' +
                '<td><input type="text" name="fields[' + i + '][name]" placeholder="Enter Field Name" class="form-control" /></td>' +
                '<td>' +
                '<select class="form-control" name="fields[' + i + '][field_type]">' +
                '<option value="text">Text</option>'+
                '<option value="number">Number</option>'+
                '<option value="email">Email</option>'+
                ' </select>'+
                '</td>' +
                '<td> <label class="custom-switch mt-2"><input  type="checkbox" value="required" name="fields[' + i + '][field_required]" class="custom-switch-input twofa">'+
                '<span class="custom-switch-indicator"></span></label>'+
                '<td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
        });

        $(document).on('click', '.remove-tr', function () {
            $(this).parents('tr').remove();
        });
    </script>



@endsection
