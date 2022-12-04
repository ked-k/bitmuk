@php
    $content = json_decode($section->content,true);
    $team = \App\Models\Team::all();
@endphp

<section class="section-padding blue-bg-2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section-title">
                    <h4><span>{{$content['span']}}</span> {{$content['span_title']}}</h4>
                    <h2>{{$content['title']}}</h2>
                </div>
            </div>
        </div>
        <div id="team-carousel" class="team-carousel owl-carousel">
            @foreach($team as $member)
                <div class="team-box">
                    <img src="{{asset('img/'.$member->image)}}" alt="team">
                    <div class="hover">
                        <h4>{{$member->name}}</h4>
                        <p>{{$member->title}}</p>
                        <ul class="team-social">


                            @foreach(json_decode($member->social,true) as  $key => $value)

                                @if($value)
                                <li><a href="{{$value}}"><i class="fa fa-{{$key}}"></i></a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
