@php
    $content = json_decode($section->content,true);
    $features =  \App\Models\HomeFeature::get()->chunk(4);

@endphp

<section class="section-padding-2 blue-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-12 centered">
                <div class="section-title">
                    <h4><span>{{$content['span']}}</span>{{$content['span_title']}}</h4>
                    <h2>{{$content['title']}}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
                <div class="app-content">
                    @foreach($features[0] as $feature1)
                        <div class="single-app-content">
                            <h3>{{$feature1->title}}</h3>
                            <p>{{$feature1->content}}</p>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
                <div class="app-content">
                    <div class="app-content-slider owl-carousel">
                        <img class="middle-img" src="{{ asset($content['image']) }}" alt="">
                        <img class="middle-img" src="{{ asset($content['image_2']) }}" alt="">
                        <img class="middle-img" src="{{ asset($content['image_3']) }}" alt="">
                        <img class="middle-img" src="{{ asset($content['image_4']) }}" alt="">
                        <img class="middle-img" src="{{ asset($content['image_5']) }}" alt="">
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
                <div class="app-content">
                    @foreach($features[1] as $feature2)
                        <div class="single-app-content">
                            <h3>{{$feature2->title}}</h3>
                            <p>{{$feature2->content}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
