@if($default)
    <span class="badge badge-primary">{{ __('Default') }}</span>
@else
    <span class="badge badge-warning">{{ __('Selectable') }}</span>
@endif
