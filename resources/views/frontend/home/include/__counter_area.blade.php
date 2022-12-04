@php
    $content = json_decode($section->content,true);
    $counters = \App\Models\HomeCounter::all();
@endphp

<section class="section-padding-2 dark-overlay"
         style="background: url({{asset($content['background_image'])}}) no-repeat fixed;">
    <div class="container">
        <div class="row">
            @foreach($counters as $counter)
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-new-counter">
                        <i class="{{$counter->icon}}"></i>
                        <h3 class="count">{{$counter->value}}</h3>
                        <h5>{{$counter->title}}</h5>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
