{!! Form::open(['route' => ['admin.languages.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('admin.languages.edit', $id) }}" class='btn btn-icon icon-left btn-primary'>
        <i class="far fa-edit"></i>
    </a>
    {!! Form::button('<i class="fas fa-times"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-icon icon-left btn-danger',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
</div>
{!! Form::close() !!}
