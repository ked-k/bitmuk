@extends('frontend.pages.faq')

@section('faq-content')

    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
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

@endsection
