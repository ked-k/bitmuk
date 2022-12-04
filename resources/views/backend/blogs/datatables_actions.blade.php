{!! Form::open(['route' => ['admin.blogs.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>

    <a href="{{ route('admin.blogs.edit', $id) }}" class='btn btn-icon icon-left btn-primary'>
        <i class="far fa-edit"></i>
    </a>
    {!! Form::button('<i class="fas fa-times"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-icon icon-left btn-danger',
        'onclick' => 'return confirm("'.__('are_you_sure').'")'
    ]) !!}
</div>
{!! Form::close() !!}

