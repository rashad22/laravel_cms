@extends('admin.master')

@section('content')
<link rel="stylesheet" href="{{asset('public/admin/css/pages/blog.css')}}" />
<link href="{{asset('public/admin/vendors/bootstrap-wysihtml5-rails-b3/src/bootstrap-wysihtml5.css')}}" rel="stylesheet" type="text/css" />
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
            <!--md-6 starts-->
            <!--form control starts-->
            <section class="content paddingleft_right15">
                <?php if ($errors->first('post_title') || $errors->first('post_details')) { ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{$errors->first('post_title')}}
                        {{$errors->first('post_dtails')}}
                    </div>
                <?php } ?>
                <!--main content-->
                <div class="row">
                    <div class="the-box no-border">
                        <form role="form" action="{{ URL::to('update') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
                            <input type="hidden" name="id" value="<?php echo $data['row']->post_id ?>"/>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text" name="post_name" id="post_name" value="<?php echo $data['row']->post_name ?>" class="form-control input-lg" placeholder="Post sort title here...">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="post_title" id="post_title" value="<?php echo $data['row']->post_title ?>" class="form-control input-lg" placeholder="Post title here...">
                                    </div>
                                    <div class='box-body pad'>

                                        <textarea class="textarea" name="post_details" id="post_details" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $data['row']->post_content ?></textarea>

                                    </div>
                                </div>
                                <!-- /.col-sm-8 -->
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Post Type</label>
                                        <select class="form-control" name="post_type" id="post_type">
                                            <option value="1">Page</option>
                                            <option value="2">Service</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Featured image</label>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <?php if (isset($data['post_featured_image'])) { ?>

                                                <div class="fileinput-new thumbnail">
                                                    <img src="<?php echo asset($data['post_featured_image']->med_path . $data['post_featured_image']->med_name); ?>" alt="...">
                                                </div>
                                                <br/>
                                            <?php } ?>

                                            <span class="btn btn-primary btn-file">
                                                <span class="fileupload-new">Select file</span>
                                                <span class="fileupload-exists">Change</span>
                                                <input type="file" name="file" />
                                            </span>
                                            <span class="fileupload-preview"></span>
                                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Update and post</button>
                                        <button type="reset" class="btn btn-danger">Discard</button>
                                    </div>
                                </div>
                                <!-- /.col-sm-4 -->
                            </div>
                            <!-- /.row -->
                        </form>
                    </div>
                </div>
                <!--main content ends-->
            </section>



        </div>
    </section>
    <script src="{{ asset('public/admin/vendors/holder-master/holder.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('public/admin/vendors/bootstrap-wysihtml5-rails-b3/vendor/assets/javascripts/bootstrap-wysihtml5/wysihtml5.js') }}"></script>
    <script type="text/javascript" src="{{asset('public/admin/vendors/bootstrap-wysihtml5-rails-b3/vendor/assets/javascripts/bootstrap-wysihtml5/core-b3.js')}}"></script>
    <script type="text/javascript">
$(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.

    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
});
    </script>
</aside>
@endsection