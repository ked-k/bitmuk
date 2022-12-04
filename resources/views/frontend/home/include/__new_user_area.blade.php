@php
    $content = json_decode($section->content,true);
    $bestUser = \App\Models\BestUser::all();
@endphp

<section class="section-padding blue-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 centered">
                <div class="section-title">
                    <h4><span>{{$content['span']}}</span>{{$content['span_title']}}</h4>
                    <h2>{{$content['title']}}</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">

            @foreach($bestUser as $user)
                <div class="col-xl-1 col-lg-1 col-md-2 col-sm-3 col-4">
                    <div class="single-new-user" data-toggle="tooltip" data-placement="top" title=""
                         data-original-title="{{$user->name}}">
                        <img src="{{asset('img/'.$user->image)}}" alt="">
                    </div>
                </div>
            @endforeach

            <div class="col-xl-6 centered">
                <a href="{{$content['button_link']}}" class="bttn-small btn-fill">{{$content['button_text']}}</a>
            </div>
        </div>
    </div>
</section>
