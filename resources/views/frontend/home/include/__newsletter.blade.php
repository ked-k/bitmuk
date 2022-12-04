@php
    $content = json_decode($section->content,true);
@endphp

<section class="section-padding blue-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="call-to-action centered">
                    <div class="section-title">
                        <h4><span>{{$content['span']}}</span>{{$content['span_title']}}</h4>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-6 col-sm-12">
                            <div class="newslatter">
                                <form action="{{ route('subscribe.now') }}" method="post">
                                    @csrf
                                    <input type="email" placeholder="Email Address" required name="email">
                                    <button type="submit">{{$content['button_text']}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
