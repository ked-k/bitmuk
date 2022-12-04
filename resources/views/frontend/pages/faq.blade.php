@extends('frontend.layouts.app')
@section('title')
    {{ __('Faq') }}
@endsection
@section('content')

    @php
        $category = \App\Models\FaqCategory::all();
        $faqs = \App\Models\Faq::all();
    @endphp


    <!--breadcrumb area-->
    <section class="breadcrumb-area dark-overlay"
             style="background: url({{ avatar($content['breadcrumb_image'] ?? '') }});">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-breadcrumb">
                        <h2>{{$content['breadcrumb_title']}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/breadcrumb area-->

    <!-- Faq Section -->
    <section class="section-padding blue-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="faq-content mb-30">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">


                            <li class="nav-item" role="presentation">
                                <a class="bttn-small btn-fill  {{  request()->categoryId == null ? 'active' : ''  }}"
                                   href="{{ url('/page/faq')}}">All</a>
                            </li>

                            @foreach($category as $cat)
                                <li class="nav-item" role="presentation">
                                    <a class="bttn-small btn-fill  {{  request()->categoryId == $cat->id ? 'active' : ''  }}"
                                       href="{{route('faq.category',$cat->id)}}">{{$cat->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">

                            @hasSection('faq-content')

                                @yield('faq-content')
                            @else

                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                     aria-labelledby="pills-home-tab">
                                    <div class="row">
                                        @foreach($faqs as $faq)
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                                <div class="single-faq-box">
                                                    <h4>{{$faq->title}}</h4>
                                                    <p>{{$faq->details}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>


                            @endif


                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 centered">
                    <a href="{{url('/page/contact')}}" class="bttn-mid btn-fill">{{$content['button-text']}}</a>
                </div>
            </div>
        </div>
    </section>
    <!-- /Faq Section -->

@endsection
