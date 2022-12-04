@php
    $tags = \App\Models\Blog::pluck('tags')->map(function ($item, $key) {
        return explode(",",$item);
    })->collapse()->all();
@endphp

<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
    <div class="site-sidebar">
        <div class="single-sidebar">
            <h3>{{ __('Search') }}</h3>
            <form action="{{ route('blog.index')}}" method="GET">
                @php
                  $search = Request::get('search') ? Request::get('search') : '';
                @endphp
                <input type="text" placeholder="Search" required name="search" value="{{$search}}">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="single-sidebar">
            <h3>{{ __('Important topic') }}</h3>
            <ul>
                @foreach($tags as $tag)

                    <li class=" {{ Request::get('topic') == $tag ? 'active' : '' }} "><a href="{{ route('blog.index','topic='.$tag)}}" >{{$tag}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
