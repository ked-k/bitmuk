@extends('frontend.blog.layouts')
@section('title')
    {{ __('Blog Details') }}
@endsection
@section('blog-content')
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
        <div class="blog-details">
            <img class="big-thumb" src="{{asset('img/'.$blog->image)}}" alt="">
            <h2>{{$blog->title}}</h2>
            <div>
                <div class="rich-content">
                    {!! $blog->details !!}
                </div>
            </div>

        </div>


    </div>

@endsection
