<footer class="footer-area section-padding-2 blue-bg-2">
    <div class="container">
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-12">
                <div class="footer-logo">
                    <a href=""><img src="{{ asset('img/'.setting_get('logo')) }}" alt=""></a>
                </div>
            </div>
            <div class="col-xl-10 col-lg-10 col-md-9 col-sm-9 col-12">
                <div class="footer-nav">
                    <ul>
                        @foreach($footerMenu->items as $menu)
                            <li><a href="{{$menu->link}}">{{$menu->label}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row copyright">
            <div class="col-xl-6 col-sm-6 order-xl-1 order-lg-1 order-md-1 order-sm-1 order-2">
                <div class="copyright-text">
                    <p>{{setting_get('site_copyright')}}</p>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 order-xl-2 order-lg-2 order-md-2 order-sm-2 order-1">
                <div class="social">
                    <a href="{{ setting_get('facebook_link') }}"><i class="fa fa-facebook"></i></a>
                    <a href="{{ setting_get('instagram_link') }}"><i class="fa fa-instagram"></i></a>
                    <a href="{{ setting_get('twitter_link') }}"><i class="fa fa-twitter"></i></a>
                    <a href="{{ setting_get('pinterest_link') }}"><i class="fa fa-pinterest"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer><!--/Footer Area-->
