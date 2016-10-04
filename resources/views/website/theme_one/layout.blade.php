<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel').'-'.$data['title'] }}</title>


        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
        <link rel="stylesheet" href="{{asset('public/website/theme_one/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/website/theme_one/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/website/theme_one/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('public/website/theme_one/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('public/website/theme_one/flexslider/flexslider.css')}}">
        <link rel="stylesheet" href="{{asset('public/website/theme_one/css/form-elements.css')}}">
        <link rel="stylesheet" href="{{asset('public/website/theme_one/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('public/website/theme_one/css/media-queries.css')}}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="{{asset('public/website/theme_one/ico/favicon.ico')}}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('public/website/theme_one/ico/apple-touch-icon-144-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('public/website/theme_one/ico/apple-touch-icon-114-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('public/website/theme_one/ico/apple-touch-icon-72-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" href="{{asset('public/website/theme_one/ico/apple-touch-icon-57-precomposed.png')}}">

    </head>

    <body>
        <?php
        $site_name = isset($GLOBALS['theme_options'][0]['meta_value']) ? $GLOBALS['theme_options'][0]['meta_value'] : 'Demo Site';
        $site_email = isset($GLOBALS['theme_options'][1]['meta_value']) ? $GLOBALS['theme_options'][1]['meta_value'] : 'rashed@versatileitbd.com';
        $site_contact = isset($GLOBALS['theme_options'][2]['meta_value']) ? $GLOBALS['theme_options'][2]['meta_value'] : '+880 xx xx xx xx';
        $site_address = isset($GLOBALS['theme_options'][3]['meta_value']) ? $GLOBALS['theme_options'][3]['meta_value'] : 'versatileitbd Narda Dhaka-1212';
        ?>
        <!-- Top menu -->
        <nav class="navbar" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{URL::to('theme-one')}}">
                        <img height="63" width="167" src="<?php echo asset(isset($GLOBALS['site_logo']) ? $GLOBALS['site_logo']->med_path . $GLOBALS['site_logo']->med_name : ''); ?>" alt="{{$site_name}}" title="{{$site_name}}" />
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="top-navbar-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="{{($data['meta'])=='home'?'active':''}}"><a href="{{ URL::to('theme-one') }}">হোম </a></li>
                        <li class="{{($data['meta'])=='books'?'active':''}}"><a href="{{ URL::to('all-books') }}">বইসমূহ</a></li>
                        <li class="{{($data['meta'])=='gallery'?'active':''}}"><a href="{{ URL::to('image-gallery') }}">ফটো গ্যালারি</a></li>
                        <?php foreach ($data['main_menu'] as $menu) { ?>
                            <li class="{{($data['meta'])=="$menu->post_slug"?'active':''}}"><a href="{{ URL::to('book-details') }}/{{$menu->post_slug}}/{{$menu->post_id}}">{{$menu->post_name}}</a></li>
                        <?php } ?>
                        <li class="{{($data['meta'])=='contact'?'active':''}}"><a href="{{ URL::to('contact-us') }}">যোগাযোগ</a></li>

                    </ul>
                </div>
            </div>
        </nav>

        <!-- Slider 2 -->


        @yield('content')
        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 footer-box wow fadeInUp">
                        <h4>About Us</h4>
                        <div class="footer-box-text">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                            </p>
                            <p><a href="about.html">Read more...</a></p>
                        </div>
                    </div>
                    <div class="col-sm-3 footer-box wow fadeInDown">
                        <h4>Email Updates</h4>
                        <div class="footer-box-text footer-box-text-subscribe">
                            <p>Enter your email and you'll be one of the first to get new updates:</p>
                            <form role="form" action="{{asset('public/website/theme_one/subscribe.php')}}" method="post">
                                <div class="form-group">
                                    <label class="sr-only" for="subscribe-email">Email address</label>
                                    <input type="text" name="email" placeholder="Email..." class="subscribe-email" id="subscribe-email">
                                </div>
                                <button type="submit" class="btn">Subscribe</button>
                            </form>
                            <p class="success-message"></p>
                            <p class="error-message"></p>
                        </div>
                    </div>
                    <div class="col-sm-3 footer-box wow fadeInUp">
                        <h4>Flickr Photos</h4>
                        <div class="footer-box-text flickr-feed"></div>
                    </div>
                    <div class="col-sm-3 footer-box wow fadeInDown">
                        <h4>Contact Us</h4>
                        <div class="footer-box-text footer-box-text-contact">
                            <p><i class="fa fa-map-marker"></i> Address: {{$site_address==''?'No Address':$site_address}}</p>
                            <p><i class="fa fa-phone"></i> Phone: {{$site_contact}}</p>
                            <p><i class="fa fa-envelope"></i> Email: <a href="mailto:{{$site_email}}">{{$site_email}}</a></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 wow fadeIn">
                        <div class="footer-border"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-7 footer-copyright wow fadeIn">
                        <p>Copyright 2016  {{$site_name}} <a target="_blank" href="http://www.versatileitbd.com">VersatileIT Ltd.</a></p>
                    </div>
                    <div class="col-sm-5 footer-social wow fadeIn">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Javascript -->
        <script src="{{asset('public/website/theme_one/js/jquery-1.11.1.min.js')}}"></script>
        <script src="{{asset('public/website/theme_one/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/website/theme_one/js/bootstrap-hover-dropdown.min.js')}}"></script>
        <script src="{{asset('public/website/theme_one/js/jquery.backstretch.min.js')}}"></script>
        <script src="{{asset('public/website/theme_one/js/wow.min.js')}}"></script>
        <script src="{{asset('public/website/theme_one/js/retina-1.1.0.min.js')}}"></script>
        <script src="{{asset('public/website/theme_one/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('public/website/theme_one/flexslider/jquery.flexslider-min.js')}}"></script>
        <script src="{{asset('public/website/theme_one/js/masonry.pkgd.min.js')}}"></script>
        <script src="{{asset('public/website/theme_one/js/scripts.js')}}"></script>

    </body>

</html>