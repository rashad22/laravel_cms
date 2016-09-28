<!DOCTYPE html>
<html>
    <head>
        <title>{{ config('app.name', 'Laravel').'-'.$data['title'] }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Mobile support -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="public/website/images/favicon.ico">


        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
        <meta name="keywords" content="Assistance Consultancy, Consultancy, Consultancy in Bangladesh, Consulting, Bank Cccount Consultency, Bangladesh,Consultants,Consultant,Consultancy,Research,Development,Management,Financial Analyst,Trainer,Survey,SSIL,NGO,Firm,ssibd,Dhaka,Asia" />
        <meta name="description" content="Home" />
        <meta name="author" content="Assistance Consultancy" />
        <meta name="rating" content="general" />
        <meta name="robots" content="index, follow" />
        <meta name="revisit-after" content="1 days" />
        <meta name="distribution" content="global" />
        <meta property="og:url" content="http://assistanceconsultancy.com/" />
        <meta property="og:title" content="Assistance & Consultancy BD LLC" />
        <meta name="description" content="We are professional step by step guidance through the flat buy or sale or rent or management in Bangladesh. We are also able to assistant with Birth Certificate, Passport, National ID card, Power of attorney and Open a bank account in Bangladesh." />
        <meta property="og:site_name" content="Assistance Consultancy" />
        <meta property="og:description" content="We are professional step by step guidance through the flat buy or sale or rent or management in Bangladesh. We are also able to assistant with Birth Certificate, Passport, National ID card, Power of attorney and Open a bank account in Bangladesh." />

        <!-- Material Design fonts -->
        <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" type="text/css">
        <link rel="stylesheet" href="{{asset('public/website/bower_components/font-awesome/css/font-awesome.min.css')}}" />

        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{asset('public/website/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">

        <!-- Bootstrap Material Design -->
        <link rel="stylesheet" href="{{asset('public/website/bower_components/bootstrap-material-design/dist/css/bootstrap-material-design.css')}}">
        <link rel="stylesheet" href="{{asset('public/website/bower_components/bootstrap-material-design/dist/css/ripples.min.css')}}">

        <link rel="stylesheet" href="{{asset('public/website/css/style.css')}}" />

        <!-- jQuery -->
        <script src="{{asset('public/website/bower_components/jQuery/jquery-1.11.1.min.js')}}"></script>

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <?php
        $site_name = isset($GLOBALS['theme_options'][0]['meta_value']) ? $GLOBALS['theme_options'][0]['meta_value'] : 'Demo Site';
        $site_email = isset($GLOBALS['theme_options'][1]['meta_value']) ? $GLOBALS['theme_options'][1]['meta_value'] : 'rashed@versatileitbd.com';
        $site_contact = isset($GLOBALS['theme_options'][2]['meta_value']) ? $GLOBALS['theme_options'][2]['meta_value'] : '+880 xx xx xx xx';
        $site_address = isset($GLOBALS['theme_options'][3]['meta_value']) ? $GLOBALS['theme_options'][3]['meta_value'] : 'versatileitbd Narda Dhaka-1212';
        ?>
        <header>
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main_menu" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand visible-md visible-lg" href="{{URL::to('/')}}">
                            <img height="100" width="356" src="<?php echo asset(isset($GLOBALS['site_logo']) ? $GLOBALS['site_logo']->med_path . $GLOBALS['site_logo']->med_name : ''); ?>" alt="{{$site_name}}" title="{{$site_name}}" />
                        </a>
                        <a class="navbar-brand visible-xs visible-sm" href="{{URL::to('/')}}">
                            <img height="100" width="356" src="<?php echo asset(isset($GLOBALS['site_logo']) ? $GLOBALS['site_logo']->med_path . $GLOBALS['site_logo']->med_name : ''); ?>" alt="{{$site_name}}" title="{{$site_name}}" />
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="main_menu">
                        <div class="contact_info visible-sm visible-md visible-lg">
                            <ul>
                                <li><a href="{{$site_contact}}"> <i class="fa fa-mobile"></i>{{$site_contact}}</a></li>
                            </ul>
                        </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="{{($data['meta'])=='home'?'active':''}}"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li class="{{($data['meta'])=='services'?'active':''}}"><a href="{{ URL::to('services') }}">Service</a></li>
                            <?php foreach ($data['main_menu'] as $menu) { ?>
                                <li class="{{($data['meta'])=="$menu->post_slug"?'active':''}}"><a href="{{ URL::to('page') }}/{{$menu->post_slug}}/{{$menu->post_id}}">{{$menu->post_name}}</a></li>
                            <?php } ?>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>
        @yield('content')
        <!-- Footer Section -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-5 col-lg-4">
                        <div class="item find_us">
                            <h3> <i class="fa fa-phone"></i>FIND US</h3>
                            <address>
                                <dl class="info">
                                    <dt>Office</dt>
                                    <dd>{{$site_address==''?'No Address':$site_address}}</dd>
                                </dl>
                                <dl class="info">
                                    <dt>Phone</dt>
                                    <dd><a href="callto:{{$site_contact}}">{{$site_contact}}</a></dd>
                                </dl>
                                <dl class="info">
                                    <dt>E-mail</dt>
                                    <dd><a href="mailto:{{$site_email}}">{{$site_email}}</a></dd>
                                </dl>
                                <dl class="info">
                                    <dt>Website</dt>
                                    <dd><a href="http://www.AssistanceConsultancy.com">www.AssistanceConsultancy.com</a></dd>
                                </dl>
                            </address>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-7 col-lg-8">
                        <div class="item keep_in_touch">
                            <h3><i class="fa fa-envelope"></i>Contact Us</h3>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="form-group label-floating">
                                            <label for="name" class="control-label">Name</label>
                                            <input type="text" class="form-control" id="name">
                                            <span class="help-block">Field should not be empty.</span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="form-group label-floating">
                                            <label for="email" class="control-label">Email</label>
                                            <input type="email" class="form-control" id="email">
                                            <span class="help-block">Field should not be empty.</span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="form-group label-floating">
                                            <label for="phone" class="control-label">Phone</label>
                                            <input type="text" class="form-control" id="phone">
                                            <span class="help-block">Field should not be empty.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group label-floating">
                                            <label for="message" class="control-label">Message</label>
                                            <textarea class="form-control" id="message"></textarea>
                                            <span class="help-block">Field should not be empty.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-info btn-raised sign_up_btn" value="Send">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_last">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="copy_text">&copy; 2016 {{$site_name}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- JS for Twitter Bootstrap -->
        <script src="{{asset('public/website/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

        <!-- Material Design for Bootstrap -->
        <script src="{{asset('public/website/bower_components/bootstrap-material-design/dist/js/material.min.js')}}"></script>
        <script src="{{asset('public/website/bower_components/bootstrap-material-design/dist/js/ripples.min.js')}}"></script>

        <!-- Placeholder JS-->
        <script>

$.material.init();
        </script>

    </body>
</html>
