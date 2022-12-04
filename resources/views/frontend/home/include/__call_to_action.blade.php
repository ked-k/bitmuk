@php
    $content = json_decode($section->content,true);
    $winners = \App\Models\HomeReferral::all();
@endphp

<section class="section-padding-2 blue-bg-2 dots-before">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 mb-30">
                <div class="call-to-action">
                    <h4>{{$content['title']}}</h4>
                    <h1>{{ $winners->max('amount') }}<span>for</span></h1>
                    <div class="cat-btns">
                        <a href="{{$content['button_link']}}" class="bttn-mid btn-fill">{{$content['button_text']}}</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                <div class="last-winners">
                    <h4>{{$content['title_2']}}</h4>
                    @foreach($winners as $winner)
                        <div class="single-winner">
                            <div class="thumb">{{substr($winner->name,0,1)}}</div>
                            <div class="content">
                                <p> {{$winner->name}}
                                    <span>{{$winner->amount}}  </span> {{ __('from refer his friends') }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
