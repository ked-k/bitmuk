@extends('frontend.blog.layouts')
@section('title')
    {{ __('Blog') }}
@endsection
@section('blog-content')

    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">

        @foreach($blogs as $blog)
            <div class="single-blog-block">
                <a href="{{ route('blog.details',$blog->id) }}">
                    <div class="thumb">
                        <img src="{{ asset('img/'.$blog->image) }}" alt="">
                    </div>
                    <div class="title">
                        <h2>{{$blog->title}}</h2>
                    </div>
                    <div class="meta">
                        <div class="date">
                            {{$blog->created_at->format('jS M Y')}}
                        </div>
                    </div>
                    <div class="content">

                        {{ Str::limit(strip_tags($blog->details), 200) }}

                    </div>
                    <div class="read-more mt-20">
                        <span href="{{ route('blog.details',$blog->id) }}"
                              class="bttn-small btn-fill">{{ __('Continue Reading') }}</span>
                    </div>
                </a>
            </div>
        @endforeach

        @if($blogs->isEmpty())
                <h4 class="color-yellow centered">{{ __('Blog Not Found') }}</h4>
        @endif
    </div>
@endsection

