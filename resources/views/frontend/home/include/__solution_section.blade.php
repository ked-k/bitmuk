@php
    $solution = json_decode($section->content,true);
    $solutions = \App\Models\HomeSolution::all();
@endphp

<section class="section-padding-2 blue-bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-md-12">
                <div class="section-title">
                    <h4><span>{{$solution['span']}}</span>{{$solution['span_title']}}</h4>
                    <h2>{{$solution['title']}}</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($solutions as $value)
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-product">
                        <div class="product-pro-img">
                            <img src="{{avatar($value->image)}}" alt="">
                        </div>
                        <div class="product-pro-title">
                            <h3>{{$value->title}}</h3>
                            <p>{{$value->content}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
