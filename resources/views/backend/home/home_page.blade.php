@extends('backend.layouts.app')

@section('title')
    {{ __('Home Page Section List') }}
@endsection

@section('content')



    <section class="section">
        <div class="section-header">
            <h1>{{ __('Home Page Section List') }}</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Home Page Section List') }}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">

                            <thead>
                            <tr>
                                <th>{{ __('Home Page Section Name') }}</th>
                                <th>{{ __('Section Status') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            </thead>

                            <tbody id="tablecontents">
                            @foreach($home as $raw)
                                <tr class="row1" data-id="{{ $raw->id }}">
                                    <td>{{ ucwords(str_replace('_',' ', $raw->name)) }}</td>
                                    <td>
                                        <label class="custom-switch mt-2">
                                            <input onclick="homeStatus({{$raw->id}}, {{$raw->status}} )" type="checkbox"
                                                   name="custom-switch-checkbox"
                                                   class="custom-switch-input status" {{ $raw->status ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                     @if($raw->name != 'payment_gateway')
                                        <td><a href="{{route('admin.home.section',$raw->name)}}"
                                               class="btn btn-info">{{ __('Edit') }}</a></td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>

    </section>


@endsection

@section('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#tablecontents").sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update: function () {
                    sendOrderToServer();
                }
            });

        });

        function sendOrderToServer() {
            let order = [];
            var token = $('meta[name="csrf-token"]').attr('content');
            $('tr.row1').each(function (index, element) {
                order.push({
                    id: $(this).attr('data-id'),
                    position: index + 1
                });
            });


            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ url('admin/update-page-order') }}",
                data: {
                    order: order,
                    _token: token
                },
                success: function (response) {
                    if (response.status == "success") {
                        console.log(response);
                    } else {
                        console.log(response);
                    }
                }
            });
        }


        function homeStatus(id, status) {
            var active = status == 1 ? 0 : 1;

            $.ajax({
                type: "GET",
                dataType: "json",
                url: 'home-page-status',
                data: {'status': active, 'id': id},
                success: function (data) {
                    iziToast.show({
                        animateInside: true,
                        theme: 'light',
                        color: 'green', // blue, red, green, yellow
                        progressBarEasing: 'linear',
                        position: 'topRight',
                        message: data.success
                    });

                }
            });
        }
    </script>
@endsection


