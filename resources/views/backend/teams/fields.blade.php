<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->

<div class="form-group col-sm-6">
    {!! Form::label('title', 'Image:') !!}
    <div id="image-preview" class="image-preview"
         style="background-image: url( {{  isset($team->image) ? asset('img/'. $team->image): '' }} );
             background-size: cover;
             background-position: center center;
             ">
        <label for="image-upload" id="image-label">{{ __('Choose File') }}</label>
        {!! Form::file('image', ['id' => 'image-upload']) !!}
    </div>
</div>

<div class="clearfix"></div>

<!-- facebook Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Facebook', 'Facebook:') !!}
    {!! Form::text('facebook', null, ['class' => 'form-control']) !!}
</div>


<!-- twitter Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Twitter', 'Twitter:') !!}
    {!! Form::text('twitter', null, ['class' => 'form-control']) !!}
</div>

<!-- instagram Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Instagram', 'Instagram:') !!}
    {!! Form::text('instagram', null, ['class' => 'form-control']) !!}
</div>

<!-- pinterest Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Pinterest', 'Pinterest:') !!}
    {!! Form::text('pinterest', null, ['class' => 'form-control']) !!}
</div>

<!-- linkedin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('linkedin', 'Linkedin:') !!}
    {!! Form::text('linkedin', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.teams.index') }}" class="btn btn-light">Cancel</a>
</div>
