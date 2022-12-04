@php
    $content = json_decode($section->content,true);
    $testimonials = \App\Models\HomeTestimonial::all();
@endphp

<section class="section-padding blue-bg-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-12 centered">
                <div class="section-title">
                    <h4><span>{{$content['span']}}</span>{{$content['span_title']}}</h4>
                    <h2>{{$content['title']}}</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-12 centered">
                <div class="testimonials owl-carousel">
                    @foreach($testimonials as $testimonial)
                        <div class="single-testimonial">
                            <div class="text">
                                {{$testimonial->content}}
                            </div>
                            <div class="person">
                                <img src="{{ avatar($testimonial->image) }}" alt="">
                                <h4>{{ $testimonial->name }}</h4>
                                <p>{{$testimonial->title}}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
