<div class="form-group">
    <label class="custom-switch mt-2">

        @if($status == 'pending')
            <a href="{{route('admin.withdraw.approve',$id)}}" class="btn btn-primary">{{ __('Approve Now') }}</a> &nbsp &nbsp
            <a href="{{route('admin.withdraw.reject', $id )}}" class="btn btn-warning">{{ __('Reject Now') }}</a>
        @elseif($status == 'fail')
            <a href="#" class="btn btn-danger">{{$status}}</a>
        @else
            <a href="#" class="btn btn-info">{{$status}}</a>
        @endif
    </label>
</div>
