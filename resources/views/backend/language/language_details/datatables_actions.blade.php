{!! Form::open(['route' => ['admin.languages.details.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a class='btn btn-icon icon-left btn-primary edit-language-details' data-toggle="modal"
       data-target="#languageDetailsUpdate" data-id={{$id}}>
        <i class="far fa-edit"></i>
    </a>
    {!! Form::button('<i class="fas fa-times"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-icon icon-left btn-danger',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
</div>
{!! Form::close() !!}

<script>

</script>
