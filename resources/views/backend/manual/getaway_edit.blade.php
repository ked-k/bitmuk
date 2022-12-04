@extends('backend.layouts.app')

@section('title')
    {{ __('Manual Getaway') }}
@endsection

@section('content')

    @php
        $i = count(json_decode($gateway->credentials, true));
    @endphp


    <section class="section">
        <div class="section-header">
            <h1>{{ __('Manual Getaway') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{route('admin.manual.gateway.index')}}" class="btn btn-primary form-btn" id="add-new-type"><i
                        class="fas fa-list"></i> {{ __('Getaway List') }} </a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <form id="setting-form" action="{{route('admin.manual.gateway.update',$gateway->id)}}"
                              method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h4>{{ __('Edit Getaway') }}</h4>
                                </div>
                                <div class="card-body">

                                    <div class="form-group row align-items-center">
                                        <label for="site-description"
                                               class="form-control-label col-sm-2 text-md-left">{{ __('Getaway Name') }}</label>
                                        <div class="col-sm-7 col-md-9">
                                            <input class="form-control" name="getaway_name" type="text"
                                                   value="{{$gateway->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="site-description"
                                               class="form-control-label col-sm-2 text-md-left">{{ __('Getaway Logo') }}</label>
                                        <div class="col-sm-7 col-md-9">
                                            <div id="image-preview" class="image-preview"
                                                 style="background-image: url( {{asset($gateway->logo)}} );
                                                     background-size: cover;
                                                     background-position: center center;
                                                     ">
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

                                            @foreach(json_decode($gateway->credentials) as $key => $value)
                                                <tr>
                                                    <td><input type="text" name="addmore[{{$loop->iteration}}][name]"
                                                               placeholder="Enter Field Name" value="{{$key}}"
                                                               class="form-control"/></td>
                                                    <td><input type="text" name="addmore[{{$loop->iteration}}][value]"
                                                               placeholder="Enter Field Value" value="{{$value}}"
                                                               class="form-control"/></td>
                                                    <td>
                                                        <button type="button"
                                                                class="btn btn-danger remove-tr">{{ __('Remove') }}</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer bg-whitesmoke text-md-right">
                                    <button class="btn btn-primary" id="save-btn">{{ __('Update') }}</button>
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
        var i = @json($i);

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


    <script type="text/javascript">
        $(document).ready(function () {
            $.uploadPreview({
                input_field: "#image-upload",   // Default: .image-upload
                preview_box: "#image-preview",  // Default: .image-preview
                label_field: "#image-label",    // Default: .image-label
                label_default: "Choose File",   // Default: Choose File
                label_selected: "Change File",  // Default: Change File
                no_label: false                 // Default: false
            });
        });
    </script>
@endsection
