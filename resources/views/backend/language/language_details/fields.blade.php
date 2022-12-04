<!-- Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Key', 'Key') !!}
    {!! Form::text('key',  null, ['class' => 'form-control key']) !!}
</div>

<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Value', 'Value') !!}
    {!! Form::text('value',   null, ['class' => 'form-control value']) !!}
</div>

<!-- hidden value -->
{!! Form::hidden('language_id',$language->id,['class' => 'language-id']) !!}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary add-language-details']) !!}
    <a class="btn btn-light" data-dismiss="modal">{{ __('Cancel') }}</a>
</div>
