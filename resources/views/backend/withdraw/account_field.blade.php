@extends('backend.layouts.app')

@section('title')
    {{ __('Account Type') }}
@endsection

@section('content')




    <section class="section">
        <div class="section-header">
            <h1>{{ __('Account Field')}} </h1>
            <div class="section-header-breadcrumb">
                <a href="#" class="btn btn-primary form-btn" id="add-new-field">{{ __('Add new type') }} <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Account Field')}}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tbody>
                            <tr>
                                <th>{{ __('Account Type') }}</th>
                                <th>{{ __('Account Field') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            @foreach($accountField as $raw)
                                <tr>
                                    <td>{{$raw->accountType->account_type}}</td>
                                    <td>{{$raw->field_name}}</td>
                                    <td>{{$raw->created_at->diffForHumans()}}</td>
                                    <td><a href=" {{route('admin.withdraw.account.field.delete', $raw->id)}}"
                                           class="btn btn-danger">Delete</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </section>



    <form class="modal-part" id="modal-add-new-field" action="{{route('admin.withdraw.account.field.store')}}"
          method="post">
        @csrf


        <div class="form-group">
            <label>{{ __('Account Type') }}</label>
            <select class="input-group" name="type_id">
                @foreach($accountType as $raw)
                    <option value="{{ $raw->id }}">{{$raw->account_type}}</option>.
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Account Field</label>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Account Field" name="account_field">
            </div>
        </div>

    </form>

@endsection

@section('scripts')
    <script>
        $("#add-new-field").fireModal({
            title: 'Add new Field',
            body: $("#modal-add-new-field"),
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
