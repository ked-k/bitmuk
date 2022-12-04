<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Category', 'Category:') !!}
    {!! Form::select('faq_category_id',$faqCategory, null, ['class' => 'form-control']) !!}
</div>


<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Details Field -->
<div class="form-group col-sm-6">
    {!! Form::label('details', 'Details:') !!}
    {!! Form::textarea('details', null, ['class' => 'form-control', "style"=>"height:150px;"]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.faqs.index') }}" class="btn btn-light">{{ __('Cancel') }}</a>
</div>
