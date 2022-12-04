{!! Form::open(['route' => ['admin.bestUsers.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('admin.bestUsers.show', $id) }}" class='btn btn-icon icon-left btn-info'>
        <i class="far fa-eye"></i>
    </a>
    <a href="{{ route('admin.bestUsers.edit', $id) }}" class='btn btn-icon icon-left btn-primary'>
        <i class="far fa-edit"></i>
    </a>
    {!! Form::button('<i class="fas fa-times"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('are_you_sure').'")'
    ]) !!}
</div>
{!! Form::close() !!}


