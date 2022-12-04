@php
    $specialSection = json_decode($section->content,true);
    $specials = \App\Models\HomeSpecial::all();
@endphp

<section class="section-padding-3 blue-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 centered">
                <div class="section-title mb-60">
                    <h4><span>{{$specialSection['span']}}</span> {{$specialSection['span_title']}}</h4>
                    <h2>{{$specialSection['title']}}</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($specials as $special)
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-why-choose">
                        <div class="icon">
                            <i class="{{$special->icon}}"></i>
                        </div>
                        <div class="title">
                            <h3>{{$special->title}}</h3>
                        </div>
                        <p>{{$special->content}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
