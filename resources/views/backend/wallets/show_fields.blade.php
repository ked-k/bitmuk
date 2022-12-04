<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $wallet->name }}</p>
</div>

<!-- Currency Field -->
<div class="form-group">
    {!! Form::label('currency', 'Currency:') !!}
    <p>{{ $wallet->currency }}</p>
</div>

<!-- Rate Usd Field -->
<div class="form-group">
    {!! Form::label('rate_usd', 'Rate Usd:') !!}
    <p>{{ $wallet->rate_usd }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $wallet->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $wallet->updated_at }}</p>
</div>

