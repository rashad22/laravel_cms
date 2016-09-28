@extends('admin.master')

@section('content')
<link rel="stylesheet" href="{{asset('admin/css/pages/blog.css')}}" />

<aside class="right-side">
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

        <div class="col-md-12">
            <?php if (Session::get('message')) { ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('message')}}
                </div>
            <?php } ?>
            <?php if ($errors->all()) { ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p>{{$errors->first('site_name')}}</p>
                    <p>{{$errors->first('site_email')}}</p>
                    <p>{{$errors->first('site_contact')}}</p>
                </div>
            <?php } ?>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="<?php echo ($data['active_tab'] == 'tab_1') ? 'active' : '' ?>">
                        <a href="#tab_1" data-toggle="tab">Theme Logo</a>
                    </li>
                    <li class="<?php echo ($data['active_tab'] == 'tab_2') ? 'active' : '' ?>">

                        <a href="#tab_2" data-toggle="tab">Theme Options</a>
                    </li>

                </ul>
                <div class = "tab-content content-bg" id = "slim2">
                    <div class = "tab-pane <?php echo ($data['active_tab'] == 'tab_1') ? 'active' : '' ?>" id = "tab_1">
                        <form action = "{{ URL::to('logo-uploads') }}" class = "form-horizontal" method = "post" enctype = "multipart/form-data">
                            <br/>
                            <input type = "hidden" name = "tab_id" value = "tab_1"/>
                            <input type = "hidden" name = "_token" value = "{{csrf_token()}}"/>
                            <div class = "row">
                                <div class = "col-sm-6">
                                    <div class = "form-group">
                                        <label for = "file" class = "col-sm-2 control-label">Logo </label>
                                        <div class = "col-sm-5">
                                            <span class = "btn btn-primary btn-file">
                                                <input type = "file" id = "file" name = "file"/>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class = "col-sm-6">
                                    <div class = "fileinput-new thumbnail">
                                        <img src = "<?php echo asset($data['site_logo']->med_path . $data['site_logo']->med_name); ?>" alt = "site logo"/>
                                    </div>
                                </div>
                            </div>
                            <div class = "form-group">
                                <label for = "file" class = "col-sm-2 control-label"> </label>
                                <div class = "col-sm-5">
                                    <input type = "submit" class = "btn btn-success" id = "submit" name = "submit" value = "Upload" />
                                </div>
                            </div>
                            <br/>
                        </form>
                    </div>
                    <!--/.tab-pane -->
                    <div class ="tab-pane <?php echo ($data['active_tab'] == 'tab_2') ? 'active' : '' ?>" id ="tab_2">
                        <form action = "{{ URL::to('save-theme-option') }}" class = "form-horizontal" method = "post" enctype = "multipart/form-data">
                            <br/>
                            <input type = "hidden" name = "tab_id" value = "tab_2"/>
                            <input type = "hidden" name = "_token" value = "{{csrf_token()}}"/>

                            <div class = "form-group">
                                <label for = "site_name" class = "col-sm-2 control-label">Site Name </label>
                                <div class = "col-sm-8">
                                    <input type = "text" id = "site_name" name = "site_name" value = "<?php echo isset($data['site_options_name']->meta_value) ? $data['site_options_name']->meta_value : ''; ?>" class = "form-control" />
                                </div>
                            </div>
                            <div class = "form-group">
                                <label for = "site_email" class = "col-sm-2 control-label">Site E-mail </label>
                                <div class = "col-sm-8">
                                    <input type = "text" id = "site_email" name = "site_email" value = "<?php echo isset($data['site_options_email']->meta_value) ? $data['site_options_email']->meta_value : ''; ?>" class = "form-control" />
                                </div>
                            </div>
                            <div class = "form-group">
                                <label for = "site_contact" class = "col-sm-2 control-label">Contact No </label>
                                <div class = "col-sm-8">
                                    <input type = "text" id = "site_contact" name = "site_contact" value = "<?php echo isset($data['site_options_contact']->meta_value) ? $data['site_options_contact']->meta_value : ''; ?>" class = "form-control" />
                                </div>
                            </div>
                            <div class = "form-group">
                                <label for = "site_address" class = "col-sm-2 control-label">Address </label>
                                <div class = "col-sm-8">
                                    <textarea id="site_address" name = "site_address" class = "form-control"><?php echo isset($data['site_options_contact_address']->meta_value) ? $data['site_options_contact_address']->meta_value : ''; ?></textarea>
                                </div>
                            </div>
                            <div class = "form-group">

                                <div class = "col-sm-5 col-sm-offset-2">
                                    <input type = "submit" class = "btn btn-success" id = "submit" name = "submit" value = "Submit" />
                                </div>
                            </div>
                            <br/>
                        </form>
                    </div>
                    <!--/.tab-pane -->
                </div>
                <!--/.tab-content -->
            </div>



        </div>
    </section>

</aside>
@endsection