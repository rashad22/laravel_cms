    @extends('admin.master')

    @section('content')
    <aside class="right-side">
    <link href="{{asset('public/admin/vendors/nestable_files/jquery.nestable.css')}}" rel="stylesheet" />

        <section class="content-header">
            <h1>{{$data['title']}}</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#">
                        <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                        Dashboard
                    </a>
                </li>
                <li>Pages</li>
                <li class="active">{{$data['title']}}</li>
            </ol>
        </section>
        <section class="content">
         <?php if(Session::get('message')){?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                       {{Session::get('message')}}
                    </div>
                        <?php }?>
            <div class="col-md-12 content-bg">
                <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="livicon" data-name="bell" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                        Page List
                                    </h3>
                                </div>
                                <div class="panel-body ">
                                    <div class="dd" id="nestable_list_1">
                                        <ol class="dd-list">
                                        <?php foreach($data['post_list'] as $menu){?>
                                            <li class="dd-item" data-id="{{$menu->post_id}}">
                                            <input type="hidden" name="menu_item[]" value="{{$menu->post_id}}">
                                                <div class="dd-handle">{{$menu->post_name}}</div>
                                            </li>
                                            <?php }?>
                                            
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="livicon" data-name="bell" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                        Menu List
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div class="dd" id="nestable_list_2">
                                    <form action="{{ URL::to('menu-update') }}" method="post">
                                    
                                        <ol class="dd-list">

                                            <?php foreach ($data['active_menu'] as $key => $value) {?>
                                                <li class="dd-item" data-id="{{$menu->post_id}}">
                                            <input type="hidden" name="menu_item[]" value="{{$menu->post_id}}">
                                                <div class="dd-handle">{{$value->post_name}}</div>
                                            </li>
                                         <?php    }

                                            ?>
                                            <div class="dd-empty">
                                             </div>
                                        </ol>
                                       
                                    <input type="hidden" name="_token" value="<?php echo csrf_token();?>"/>

                                        <button type="submit" class="btn btn-success">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               
            </div>
        </section>
<script src="{{asset('public/admin/vendors/nestable_files/jquery.nestable.min.js')}}"></script>
    <script src="{{asset('public/admin/vendors/nestable_files/ui-nestable.js')}}"></script>
    <script>
    jQuery(document).ready(function() {
        UINestable.init();
    });
    </script>
    </aside>
    @endsection