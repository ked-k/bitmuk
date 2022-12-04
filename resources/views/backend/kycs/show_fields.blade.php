<!-- Nid Name Field -->
<div class="form-group">
    {!! Form::label('nid_name', 'Nid Name:') !!}
    <p>{{ $kyc->nid_name }}</p>
</div>

<!-- Nid Number Field -->
<div class="form-group">
    {!! Form::label('nid_number', 'Nid Number:') !!}
    <p>{{ $kyc->nid_number }}</p>
</div>

<!-- Nid Copy Field -->
<div class="form-group">
    {!! Form::label('nid_copy', 'Nid Copy:') !!}
    <p>{{ $kyc->nid_copy }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $kyc->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $kyc->updated_at }}</p>
</div>

