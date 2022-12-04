{!! Form::open(['route' => ['admin.subscribes.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('admin.subscribes.show', $id) }}" class='btn btn-icon icon-left btn-info'>
        <i class="far fa-eye"></i>
    </a>
    <a href="{{ route('admin.subscribes.edit', $id) }}" class='btn btn-icon icon-left btn-primary'>
        <i class="far fa-edit"></i>
    </a>
    {!! Form::button('<i class="fas fa-times"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}

