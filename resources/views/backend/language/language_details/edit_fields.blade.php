<!-- Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Key', 'Key') !!}
    {!! Form::text('edit_key',  null, ['class' => 'form-control edit-key']) !!}
</div>

<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Value', 'Value') !!}
    {!! Form::text('edit_value',   null, ['class' => 'form-control edit-value']) !!}
</div>

<!-- hidden value -->
{!! Form::hidden('language_id',$language->id,['class' => 'language-id']) !!}
{!! Form::hidden('language_id',null,['class' => 'language-details-id']) !!}



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary update-language-details']) !!}
    <a class="btn btn-light" data-dismiss="modal">{{ __('Cancel') }}</a>
</div>
