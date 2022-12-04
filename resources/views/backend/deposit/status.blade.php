
        @if($status == 'pending')
            <a href="{{route('admin.manual.deposit.approve',$id)}}" class="btn btn-primary">{{ __('Approve Now') }}</a>
            &nbsp &nbsp
            <a href="{{route('admin.manual.deposit.reject', $id )}}" class="btn btn-warning">{{ __('Reject Now') }}</a>
        @elseif($status == 'fail')
            <div class="badge badge-danger">{{ __('Failed') }}</div>
        @else
            <div class="badge badge-info">{{ ucfirst($status) }}</div>
        @endif

