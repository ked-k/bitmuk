<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_name', 'First Name') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', 'Last Name') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email','Email') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'phone') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Avatar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Avatar', 'Avatar') !!}

<div id="image-preview" class="image-preview"
     style="background-image: url( {{  isset($user->avatar) ? asset('img/'. $user->avatar): '' }} );
         background-size: cover;
         background-position: center center;
         ">
    <label for="image-upload" id="image-label">{{ __('Choose File') }}</label>
    {!! Form::file('image', ['id' => 'image-upload']) !!}
</div>
</div>
<div class="clearfix"></div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    <div class="mb-3">
        {!! Form::label('address','Address') !!}
        {!! Form::text('address', null, ['class' => 'form-control']) !!}
    </div>


    <div class="mb-3">
    {!! Form::label('city', 'City') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
    </div>

    <div class="mb-3">
    {!! Form::label('state', 'State') !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
    </div>

    <div class="mb-3">
    {!! Form::label('zip', 'Zip') !!}
    {!! Form::text('zip', null, ['class' => 'form-control']) !!}
    </div>
</div>

{{-----------------}}

@if($user->role == 'merchant')

<!-- Merchant name -->
<div class="form-group col-sm-6">
    {!! Form::label('Merchant Name','Merchant Name') !!}
    {!! Form::text('merchant_name', null, ['class' => 'form-control']) !!}
</div>


<!-- Merchant email -->
<div class="form-group col-sm-6">
    {!! Form::label('Merchant email','Merchant email') !!}
    {!! Form::text('merchant_email', null, ['class' => 'form-control']) !!}
</div>

<!-- Merchant address -->
<div class="form-group col-sm-6">
    {!! Form::label('Merchant address','Merchant address') !!}
    {!! Form::text('merchant_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Merchant proof -->
<div class="form-group col-sm-6">
    {!! Form::label('Merchant proof','Merchant proof') !!}
    {!! Form::text('merchant_proof', null, ['class' => 'form-control']) !!}
</div>

@endif



<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country', 'Country') !!}
    <select class="form-control select2"  name="country">
        @foreach( array_column(countries(),'name') as $key => $value)
            <option value="{{ $value }}" {{ $value == $user->country ? 'selected' : '' }}>{{ $value }}</option>
        @endforeach
    </select>
</div>




<!-- Status Field -->
<div class="form-group col-sm-6">
    <label class="status-label" for="status">{{ __('Status') }}</label>
    <label class="checkbox-inline">
        <label class="custom-switch mt-2">
            <input onclick="status({{$user->id}} ,{{$user->status}})" type="checkbox" name="status"
                   class="custom-switch-input status" {{ $user->status ? 'checked' : '' }}>
            <span class="custom-switch-indicator"></span>
        </label>
    </label>
</div>




<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password') !!}
    {!! Form::text('password', null, ['class' => 'form-control']) !!}
</div>


