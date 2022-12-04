@if($status == 'pending')
    <div class="badge badge-warning">{{ ucfirst($status)  }}</div>
@elseif($status == 'fail')
    <div class="badge badge-danger">{{ __('Failed') }}</div>
@else
    <div class="badge badge-success">{{ ucfirst($status) }}</div>
@endif
