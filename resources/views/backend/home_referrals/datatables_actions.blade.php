{!! Form::open(['route' => ['admin.homeReferrals.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('admin.homeReferrals.show', $id) }}" class='btn btn-icon icon-left btn-info'>
        <i class="far fa-eye"></i>
    </a>
    <a href="{{ route('admin.homeReferrals.edit', $id) }}" class='btn btn-icon icon-left btn-primary'>
        <i class="far fa-edit"></i>
    </a>
    {!! Form::button('<i class="fas fa-times"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-icon icon-left btn-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}


