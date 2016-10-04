<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel').'-'.$data['title'] }}</title>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!-- global css -->
        <link href="{{ asset('public/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="{{ asset('public/admin/vendors/font-awesome-4.2.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/admin/css/styles/black.css') }}" rel="stylesheet" type="text/css" id="colorscheme" />
        <link href="{{ asset('public/admin/css/panel.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('public/admin/css/metisMenu.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('public/admin/css/custom_style.css') }}" rel="stylesheet" type="text/css"/>
        <!-- end of global css -->
        <script src="{{ asset('public/admin/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
        <script>
window.Laravel = <?php
echo json_encode([
    'csrfToken' => csrf_token(),
]);
?>

        </script>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
    </head>

    <body class="skin-josh">
        <header class="header">
            <a href="index.html" class="logo">
                <img src="{{ asset('public/admin/img/logo.png') }}" alt="logo">
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <div>
                    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                        <div class="responsive_nav"></div>
                    </a>
                </div>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="livicon" data-name="message-flag" data-loop="true" data-color="#42aaca" data-hovercolor="#42aaca" data-size="28"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages pull-right">
                                <li class="dropdown-title">4 New Messages</li>
                                <li class="unread message">
                                    <a href="javascript:;" class="message"> <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read"><span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span></i>
                                        <img data-src="holder.js/45x45/#000:#fff" class="img-responsive message-image" alt="icon">
                                        <div class="message-body">
                                            <strong>Riot Zeast</strong>
                                            <br>Hello, You there?
                                            <br>
                                            <small>8 minutes ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li class="unread message">
                                    <a href="javascript:;" class="message">
                                        <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read"><span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span></i>
                                        <img data-src="holder.js/45x45/#000:#fff" class="img-responsive message-image" alt="icon">
                                        <div class="message-body">
                                            <strong>John Kerry</strong>
                                            <br>Can we Meet ?
                                            <br>
                                            <small>45 minutes ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li class="unread message">
                                    <a href="javascript:;" class="message">
                                        <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read">
                                            <span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span>
                                        </i>
                                        <img data-src="holder.js/45x45/#000:#fff" class="img-responsive message-image" alt="icon">
                                        <div class="message-body">
                                            <strong>Jenny Kerry</strong>
                                            <br>Dont forgot to call...
                                            <br>
                                            <small>An hour ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li class="unread message">
                                    <a href="javascript:;" class="message">
                                        <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read">
                                            <span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span>
                                        </i>
                                        <img data-src="holder.js/45x45/#000:#fff" class="img-responsive message-image" alt="icon">
                                        <div class="message-body">
                                            <strong>Ronny</strong>
                                            <br>Hey! sup Dude?
                                            <br>
                                            <small>3 Hours ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li class="footer">
                                    <a href="#">View all</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="livicon" data-name="bell" data-loop="true" data-color="#e9573f" data-hovercolor="#e9573f" data-size="28"></i>
                                <span class="label label-warning">7</span>
                            </a>
                            <ul class=" notifications dropdown-menu">
                                <li class="dropdown-title">You have 7 notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <i class="livicon danger" data-n="timer" data-s="20" data-c="white" data-hc="white"></i>
                                            <a href="#">after a long time</a>
                                            <small class="pull-right">
                                                <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                                Just Now
                                            </small>
                                        </li>
                                        <li>
                                            <i class="livicon success" data-n="gift" data-s="20" data-c="white" data-hc="white"></i>
                                            <a href="#">Jef's Birthday today</a>
                                            <small class="pull-right">
                                                <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                                Few seconds ago
                                            </small>
                                        </li>
                                        <li>
                                            <i class="livicon warning" data-n="dashboard" data-s="20" data-c="white" data-hc="white"></i>
                                            <a href="#">out of space</a>
                                            <small class="pull-right">
                                                <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                                8 minutes ago
                                            </small>
                                        </li>
                                        <li>
                                            <i class="livicon bg-aqua" data-n="hand-right" data-s="20" data-c="white" data-hc="white"></i>
                                            <a href="#">New friend request</a>
                                            <small class="pull-right">
                                                <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                                An hour ago
                                            </small>
                                        </li>
                                        <li>
                                            <i class="livicon danger" data-n="shopping-cart-in" data-s="20" data-c="white" data-hc="white"></i>
                                            <a href="#">On sale 2 products</a>
                                            <small class="pull-right">
                                                <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                                3 Hours ago
                                            </small>
                                        </li>
                                        <li>
                                            <i class="livicon success" data-n="image" data-s="20" data-c="white" data-hc="white"></i>
                                            <a href="#">Lee Shared your photo</a>
                                            <small class="pull-right">
                                                <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                                Yesterday
                                            </small>
                                        </li>
                                        <li>
                                            <i class="livicon warning" data-n="thumbs-up" data-s="20" data-c="white" data-hc="white"></i>
                                            <a href="#">David liked your photo</a>
                                            <small class="pull-right">
                                                <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                                2 July 2014
                                            </small>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!--<img data-src="holder.js/35x35/#fff:#000" width="35" class="img-circle img-responsive pull-left" height="35" alt="riot">-->
                                <div class="riot">
                                    <div>
                                        {{ Auth::user()->name }}
                                        <span>
                                            <i class="caret"></i>
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img data-src="holder.js/90x90/#fff:#000" class="img-responsive img-circle" alt="User Image">
                                    <p class="topprofiletext">{{ Auth::user()->name }}</p>
                                </li>
                                <!-- Menu Body -->
                                <li>
                                    <a href="#">
                                        <i class="livicon" data-name="user" data-s="18"></i>
                                        My Profile
                                    </a>
                                </li>
                                <li role="presentation"></li>

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#">
                                            <i class="livicon" data-name="lock" data-s="18"></i>
                                            Lock
                                        </a>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-success" href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <section class="sidebar ">
                    <div class="page-sidebar  sidebar-nav">

                        <div class="clearfix"></div>
                        <!-- BEGIN SIDEBAR MENU -->
                        <ul id="menu" class="page-sidebar-menu">
                            <li class="{{$data['active']=='dashboard'?'active':''}}">
                                <a target="_blank" href="{{ url('/') }}">
                                    <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                    <span class="title">Web site</span>
                                </a>

                            </li>
                            <li class="{{$data['active']=='Post'?'active':''}}">
                                <a href="#">
                                    <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                    <span class="title">Post</span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="{{$data['meta']=='new Post'?'active':''}}">
                                        <a href="{{ URL::to('new-post') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            Add New Post
                                        </a>
                                    </li>
                                    <li class="{{$data['meta']=='all Post'?'active':''}}">
                                        <a href="{{ URL::to('all-post')}}">
                                            <i class="fa fa-angle-double-right"></i>
                                            All Post
                                        </a>
                                    </li>
                                    <li class="{{$data['meta']=='books'?'active':''}}">
                                        <a href="{{ URL::to('all-post/2')}}">
                                            <i class="fa fa-angle-double-right"></i>
                                            All Books
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="{{$data['active']=='settings'?'active':''}}">
                                <a href="#">
                                    <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                    <span class="title">Settings</span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="{{$data['meta']=='menu'?'active':''}}">
                                        <a href="{{ URL::to('menu') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            Menu
                                        </a>
                                    </li>
                                    <li class="{{$data['meta']=='theme_option'?'active':''}}">
                                        <a href="{{ URL::to('theme-option') }}/tab_1">
                                            <i class="fa fa-angle-double-right"></i>
                                            Theme Option
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="{{$data['active']=='media'?'active':''}}">
                                <a href="#">
                                    <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                    <span class="title">Media</span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="{{$data['meta']=='new_media'?'active':''}}">
                                        <a href="{{ URL::to('add-media') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            Add Media Image
                                        </a>
                                    </li>
                                    <li class="{{$data['meta']=='media_list'?'active':''}}">
                                        <a href="{{ URL::to('media') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            Media
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="{{$data['active']=='gallery'?'active':''}}">
                                <a href="{{ URL::to('gallery') }}">
                                    <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                    <span class="title">Gallery</span>
                                </a>
                            </li>
                        </ul>
                        <!-- END SIDEBAR MENU -->
                    </div>
                </section>
            </aside>
            @yield('content')
            <!-- right-side -->
        </div>
        <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
            <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
        </a>
        <!-- global js -->

        <script src="{{ asset('public/admin/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <!--livicons-->
        <script src="{{ asset('public/admin/vendors/livicons/minified/raphael-min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/admin/vendors/livicons/minified/livicons-1.4.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/admin/js/josh.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/admin/js/metisMenu.js') }}" type="text/javascript"></script>

        <!-- end of global js -->
    </body>
</html>
