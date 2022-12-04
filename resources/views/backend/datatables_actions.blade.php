{!! Form::open(['route' => ['admin.howItWorks.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('admin.howItWorks.show', $id) }}" class='btn btn-icon icon-left btn-info'>
        <i class="far fa-eye"></i>
    </a>
    <a href="{{ route('admin.howItWorks.edit', $id) }}" class='btn btn-icon icon-left btn-primary'>
        <i class="far fa-edit"></i>
    </a>
    {!! Form::button('<i class="fas fa-times"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
