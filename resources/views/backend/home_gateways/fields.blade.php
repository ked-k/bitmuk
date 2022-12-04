<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    <div id="image-preview" class="image-preview"
         style="background-image: url( {{  isset($homeGateway->image) ? asset('img/'. $homeGateway->image): '' }} );
             background-size: cover;
             background-position: center center;
             ">
        <label for="image-upload" id="image-label">{{ __('Choose File') }}</label>
        {!! Form::file('image', ['id' => 'image-upload']) !!}
    </div>
</div>
<div class="clearfix"></div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.homeGateways.index') }}" class="btn btn-light">Cancel</a>
</div>
