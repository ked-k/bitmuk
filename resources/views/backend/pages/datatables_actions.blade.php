{!! Form::open(['route' => ['admin.pages.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('admin.pages.edit', $id) }}" class='btn btn-icon icon-left btn-primary'>
        <i class="far fa-edit"></i>
    </a>
    @if($type == 'dynamic')

        {!! Form::button('<i class="fas fa-times"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-icon icon-left btn-danger',
            'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
        ]) !!}
    @endif
</div>
{!! Form::close() !!}
