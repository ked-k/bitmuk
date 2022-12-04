@extends('backend.layouts.app')

@section('title')
    {{ __('Account Type') }}
@endsection

@section('content')



    <section class="section">
        <div class="section-header">
            <h1>{{ __('Account Type') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="#" class="btn btn-primary form-btn" id="add-new-type">{{ __('Add new type') }} <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Account Type') }}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tbody>
                            <tr>
                                <th>{{ __('Account Type') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            @foreach($accountType as $raw)
                                <tr>
                                    <td>{{$raw->account_type}}</td>
                                    <td>{{$raw->created_at->diffForHumans()}}</td>
                                    <td><a href=" {{route('admin.withdraw.account.type.delete', $raw->id)}}"
                                           class="btn btn-danger">{{ __('Delete') }}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>



    <form class="modal-part" id="modal-add-new-type" action="{{route('admin.withdraw.account.type.store')}}"
          method="post">
        @csrf
        <div class="form-group">
            <label>Account Type</label>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Account Type" name="account_type">
            </div>
        </div>

    </form>

@endsection

@section('scripts')
    <script>
        $("#add-new-type").fireModal({
            title: 'Add new type',
            body: $("#modal-add-new-type"),
            footerClass: 'bg-whitesmoke',
            autoFocus: false,
            buttons: [
                {
                    text: 'Add new +',
                    submit: true,
                    class: 'btn btn-primary btn-shadow',
                    handler: function (modal) {
                    }
                }
            ]
        });
    </script>
@endsection
