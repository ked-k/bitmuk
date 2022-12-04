@extends('frontend.'. $notify['view'] . '.dashboard')
@section('title')
    {{ __('Notify') }}
@endsection
@section($notify['view'].'-dashboard-content')
    <div class="card">
        <div class="card-header">
            {{$notify['card-header']}}
        </div>
        <div class="card-body">
            <div class="sent-success">
                <div class="icon">
                    <i class="ti-check"></i>
                </div>
                <h3>{{ $notify['title'] }}</h3>
                <h3>{{ $notify['title2']?? '' }}</h3>
                <p>{{$notify['p']}}</p>
                <p>{{$notify['strong'] ?? ''}}</p>
                <a href="{{$notify['action']}}" class="bttn-small btn-fill">{{$notify['a']}}</a>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        setTimeout(function () {
            window.location.href;
        }, 1000);
    </script>
@endsection
