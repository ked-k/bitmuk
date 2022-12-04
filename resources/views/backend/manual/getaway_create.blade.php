@extends('backend.layouts.app')

@section('title')
    {{ __('Manual Gateway') }}
@endsection

@section('content')



    <section class="section">
        <div class="section-header">
            <h1>{{ __('Manual Gateway') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{route('admin.manual.gateway.index')}}" class="btn btn-primary form-btn" id="add-new-type"><i
                        class="fas fa-list"></i> {{ __('Gateway List') }} </a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <form id="setting-form" action="{{route('admin.manual.gateway.store')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h4>{{ __('Add New Gateway') }}</h4>
                                </div>
                                <div class="card-body">

                                    <div class="form-group row align-items-center">
                                        <label for="site-description"
                                               class="form-control-label col-sm-2 text-md-left">{{ __('Gateway Name') }}</label>
                                        <div class="col-sm-7 col-md-9">
                                            <input class="form-control" name="getaway_name" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="site-description"
                                               class="form-control-label col-sm-2 text-md-left">{{ __('Gateway Logo') }}</label>
                                        <div class="col-sm-7 col-md-9">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload"
                                                       id="image-label">{{ __('Choose File') }}</label>
                                                <input type="file" name="image" id="image-upload"/>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="table-responsive">
                                    <table class="table table-bordered" id="dynamicTable">
                                        <tr>
                                            <th>{{ __('Field Name') }}</th>
                                            <th>{{ __('Field Value') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="addmore[0][name]"
                                                       placeholder="Enter Field Name" class="form-control"/></td>
                                            <td><input type="text" name="addmore[0][value]"
                                                       placeholder="Enter Field Value" class="form-control"/></td>
                                            <td>
                                                <button type="button" name="add" id="add"
                                                        class="btn btn-success">{{ __('Add More') }}</button>
                                            </td>
                                        </tr>
                                    </table>
                                    </div>
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
                '<td><input type="text" name="addmore[' + i + '][name]" placeholder="Enter Field Name" class="form-control" /></td>' +
                '<td><input type="text" name="addmore[' + i + '][value]" placeholder="Enter Field Value" class="form-control" /></td>' +
                '<td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
        });

        $(document).on('click', '.remove-tr', function () {
            $(this).parents('tr').remove();
        });
    </script>



@endsection
