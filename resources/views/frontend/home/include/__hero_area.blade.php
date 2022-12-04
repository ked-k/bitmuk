@php
    $bannerSection = json_decode($section->content,true);
@endphp

<section class="hero-area dark-overlay"
         style="background: url( {{ asset($bannerSection['background_image']) }} ) no-repeat center center;">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-6">
                <div class="hero-content">
                    <h4>{{$bannerSection['span_title']}}</h4>
                    <h1>{{ $bannerSection['title'] }}</h1>
                    <ul>
                        @foreach($bannerSection['line'] as $line)
                            <li> {{ $line }} </li>
                        @endforeach
                    </ul>
                    <div class="hero-btn">
                        <a href="{{url($bannerSection['button_link'])}}" class="bttn-mid btn-fill"><i
                                class="ti-announcement"></i> {{ $bannerSection['button_text'] }}</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-5 col-sm-6">
                <div class="hero-right-img" style="background: url( {{ asset($bannerSection['foreground_image']) }} ) no-repeat center center;"></div>
            </div>
        </div>
    </div>

</section>
