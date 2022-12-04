@extends('backend.layouts.app')

@section('title')
    {{ __('Manual Gateway') }}
@endsection

@section('content')




    <section class="section">
        <div class="section-header">
            <h1>{{ __('Manual Gateway') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{route('admin.manual.gateway.create')}}" class="btn btn-primary form-btn"
                   id="add-new-type">{{ __('Add New Gateway') }} <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Manual Gateway') }}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tbody>
                            <tr>
                                <th>{{ __('Logo') }}</th>
                                <th>{{ __('Gateway Name') }}</th>
                                <th>{{ __('Credentials') }}</th>
                                <th>{{ __('Active') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            @foreach($getaways as $raw)
                                <tr>
                                    <td>
                                        <figure class="avatar mr-2 avatar-l"><img src="{{asset($raw->logo)}}"></figure>
                                    </td>
                                    <td>{{$raw->name}}</td>

                                    <td>
                                        <ul>
                                            @foreach(json_decode($raw->credentials) as $key => $value)
                                                <li><strong>{{$key}}</strong> : {{$value}}</li>
                                            @endforeach
                                        </ul>
                                    </td>

                                    <td>
                                        <label>
                                            <input onclick="active({{ $raw->id }},{{ $raw->status }} )" type="checkbox"
                                                   name="custom-switch-checkbox"
                                                   class="custom-switch-input status" {{ $raw->status ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>

                                    <td>{{$raw->created_at->diffForHumans()}}</td>

                                    <td>
                                        <form action="{{ route('admin.manual.gateway.destroy', $raw->id) }}"
                                              method="POST">

                                            <a href=" {{route('admin.manual.gateway.edit', $raw->id)}}"
                                               class="btn btn-info">{{ __('Edit') }}</a>

                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit" title="delete">
                                                {{ __('Delete') }}
                                            </button>
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
        function active(id, status) {
            var active = status == 1 ? 0 : 1;

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/admin/manual/gateway/changeStatus',
                data: {'status': active, 'user_id': id},
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
