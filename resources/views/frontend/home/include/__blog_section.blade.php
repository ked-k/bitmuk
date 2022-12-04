@php
    $content = json_decode($section->content,true);
    $blogs  = \App\Models\Blog::all();
@endphp

<section class="section-padding blue-bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 centered">
                <div class="section-title">
                    <h4><span>{{$content['span']}}</span> {{$content['span_title']}} </h4>
                    <h2>{{$content['title']}}</h2>
                </div>
            </div>
        </div>

        <!-- News Carousel -->
        <div class="news-carousel owl-carousel">
            <!-- News Block -->
            @foreach($blogs as $blog)
                <div class="news-block">
                    <div class="inner-box">
                        <ul class="info">
                            <li class="day"> {{$blog->created_at->format('jS')}}
                                <span>{{  $blog->created_at->format('M') }}</span></li>
                        </ul>
                        <div class="content">
                            <img class="mb-20" src="{{asset('img/'.$blog->image)}}" alt=""/>
                            <h3><a href="{{ route('blog.details',$blog->id) }}">{{$blog->title}}</a></h3>
                            <div class="text">{{ Str::limit(strip_tags($blog->details), 150) }}</div>
                            <div class="link-box"><a
                                    href="{{ route('blog.details',$blog->id) }}">{{ __('Read More') }}</a></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
