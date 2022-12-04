@extends('backend.layouts.app')
@section('title')
    {{ __('Withdraw Method') }}
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Withdraw Method') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{route('admin.withdraw.method.create')}}" class="btn btn-primary form-btn" >{{ __('Add new method') }} <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Withdraw Method') }}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tbody>
                            <tr>
                                <th>{{ __('Withdraw Methods Name') }}</th>
                                <th>{{ __('Withdraw Methods Currency') }}</th>
                                <th>{{ __('Withdraw Methods Status') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            @foreach($methods as $raw)
                                <tr>
                                    <td>{{$raw->name}}</td>
                                    <td>{{$raw->currency}}</td>

                                    <td>
                                        <label class="custom-switch mt-2">
                                            <input onclick="statusWithdrawMethod({{$raw->id}} ,{{$raw->status}})"  type="checkbox" name="fields[0][field_required]" class="custom-switch-input" {{ $raw->status ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td>


                                        <form action="{{ route('admin.withdraw.method.destroy', $raw->id) }}" method="POST">

                                            <a href=" {{route('admin.withdraw.method.edit', $raw->id)}}"
                                               class="btn btn-info">{{ __('Edit') }}</a>

                                            <input type="hidden" name="_method" value="DELETE">
                                           @csrf
                                            <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                        </form>


                                    </td>
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

    <script>

        function statusWithdrawMethod(id, status) {
            var active = status === 1 ? 0 : 1;

            $.ajax({
                type: "GET",
                dataType: "json",
                url: 'method/changeStatus',
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


