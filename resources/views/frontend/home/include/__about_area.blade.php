@php
    $aboutSection = json_decode($section->content,true);
@endphp

<section class="section-padding-2 blue-bg-2 dots-after">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 mb-30">
                <div class="section-title">
                    <h4><span>{{$aboutSection['span']}}</span>{{$aboutSection['span_title']}}</h4>
                    <h2>{{$aboutSection['title']}}</h2>
                </div>
                <p>{{$aboutSection['content']}}</p>
                <div class="row mb-20">
                    <div class="col-xl-6 col-md-12">
                        <h5 class="mb-10">{{$aboutSection['paragraph_title_1']}}</h5>
                        <p>{{$aboutSection['paragraph_content_1']}}</p>
                    </div>
                    <div class="col-xl-6 col-md-12">
                        <h5 class="mb-10">{{$aboutSection['paragraph_title_2']}}</h5>
                        <p>{{$aboutSection['paragraph_content_2']}}</p>
                    </div>
                </div>
                <a href="{{$aboutSection['button_link']}}"
                   class="bttn-small btn-fill">{{$aboutSection['button_text']}}</a>

            </div>
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                <div class="about-img">
                    <img src="{{asset($aboutSection['image'])}}" alt="">
                    <a href="{{$aboutSection['video_link']}}" class="video-popup"><i class="fa fa-play"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
