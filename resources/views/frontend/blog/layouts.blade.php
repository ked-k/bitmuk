@extends('frontend.layouts.app')
@section('content')

    @php
        $data = \App\Models\Page::where('url', '/blog')->first();
        $content = json_decode($data->component, true);
    @endphp

    <!--breadcrumb area-->
    <section class="breadcrumb-area dark-overlay"
             style="background: url({{avatar( $content['breadcrumb_image'] ?? '' )}});">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-breadcrumb">
                        <h2>{{ $content['breadcrumb_title'] ?? ''}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/breadcrumb area-->

    <!--Blog-->
    <section class="section-padding blue-bg">
        <div class="container">
            <div class="row justify-content-center">

                @include('frontend.blog.__sidebar')

                @yield('blog-content')

            </div>
        </div>
    </section><!--/Blog-->

@endsection

