@php
    $content = json_decode($section->content,true);
    $gateways = \App\Models\HomeGateway::all();
@endphp
<section class="section-padding-3 blue-bg-2 dots-after">
    <div class="container">
        <div class="row justify-content-center">
            @foreach($gateways as $gateway)
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
                    <div class="single-payments">
                        <a><img src="{{avatar($gateway->image)}}" alt=""></a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
