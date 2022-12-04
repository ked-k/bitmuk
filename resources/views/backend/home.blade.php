@extends('backend.layouts.app')

@section('title')
    {{ __('Dashboard') }}
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">{{ __('Dashboard') }}</h3>
        </div>
        <div class="section-body">
            <div class="row">

                @foreach($counts as $count)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon {{$count['bg']}}">
                                <i class="{{$count['icon']}}"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>{{ $count['level'] }}</h4>
                                </div>
                                <div class="card-body">
                                    {{$count['count']}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Last 7 Days Deposit') }}</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart" height="182"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Recent Activities') }}</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">

                                @foreach($recentUser as $value)
                                    <li class="media">
                                        <img class="mr-3 rounded-circle" width="50" src="{{avatar($value->avatar)}}"
                                             alt="avatar">
                                        <div class="media-body">
                                            <div
                                                class="float-right text-primary">{{$value->created_at->diffForHumans()}}</div>
                                            <div class="media-title">{{$value->full_name}}</div>
                                            <span class="text-small text-muted">{{$value->email}}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="text-center pt-1 pb-1">
                                <a href="{{route('admin.users.index')}}" class="btn btn-primary btn-lg btn-round">
                                    {{ __('View All') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        var statistics_chart = document.getElementById("myChart").getContext('2d');

        var diposit = @json($deposit)

        const dipositKey = Object.keys(diposit);
        const dipositValue = Object.values(diposit);


        var myChart = new Chart(statistics_chart, {
            type: 'line',
            data: {
                labels: dipositKey,
                datasets: [{
                    label: 'Deposit',
                    data: dipositValue,
                    borderWidth: 5,
                    borderColor: '#6777ef',
                    backgroundColor: 'transparent',
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#6777ef',
                    pointRadius: 4
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                            stepSize: 150
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            color: '#fbfbfb',
                            lineWidth: 2
                        }
                    }]
                },
            }
        });
    </script>
@endsection

