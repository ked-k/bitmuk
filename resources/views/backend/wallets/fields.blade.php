<!-- Rate Usd Field -->

<div class="form-group col-sm-6">
    {!! Form::label('currency', 'Currency:') !!}
    <select class="form-group row align-items-center form-control select2" name="currency">
        @foreach($currencies as $key => $value)
            <option value="{{ json_encode($value) }}"  @if(isset( $wallet->currency) && $wallet->currency == $value['currency']) selected @endif >{{ $value['name'] }}</option>
        @endforeach
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.wallets.index') }}" class="btn btn-light">Cancel</a>
</div>
