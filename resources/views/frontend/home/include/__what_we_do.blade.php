@php
    $content = json_decode($section->content,true);
    $steps = \App\Models\HomeStep::all();
@endphp
<section class="section-padding-2 blue-bg-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-7 col-md-12 centered">
                <div class="section-title">
                    <h4><span>{{$content['span']}}</span> {{$content['span_title']}}</h4>
                    <h2>{{$content['title']}}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($steps as $step)
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-what-we-do">
                        <div class="icon">
                            <i class="{{$step->icon}}"></i>
                        </div>
                        <div class="title">
                            <h3>{{$step->title}}</h3>
                        </div>
                        <p>{{$step->content}}</p>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</section>
