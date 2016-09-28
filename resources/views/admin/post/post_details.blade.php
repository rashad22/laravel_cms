@extends('admin.master')

@section('content')
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
            <section class="content">
                <!--main content-->
                <div class="row content-bg">
                    <div class="col-sm-8 col-md-9 col-full-width-right">
                        <div class="title">
                            <h2>{{$data['row']->post_title}}</h2>
                        </div>
                        <!-- /.blog-detail-image -->
                        <div class="the-box no-border blog-detail-content">
                            <p>
                                <span class="label label-danger square">{{$data['row']->post_datetime}}</span>
                            </p>
                            <div class="text-justify">
                                {!!$data['row']->post_content!!}
                            </div>


                        </div>
                        <!-- /the.box .no-border -->
                    </div>
                    <!-- /.col-sm-9 -->
                    <div class="col-sm-4 col-md-3 col-full-width-left">
                        <div class="the-box bg-primary no-border text-center no-margin more-padding">
                            <h4 style="color:black">Fitured Image</h4>
                            <?php if (isset($data['post_featured_image'])) { ?>

                                <img src="<?php echo asset($data['post_featured_image']->med_path . $data['post_featured_image']->med_name); ?>" class="img-responsive" alt="" />

                            <?php } ?>
                            <button class="btn btn-primary btn-block">Read more</button>
                        </div>

                    </div>
                    <!-- /.col-sm-3 -->
                </div>
                <!--main content ends-->
            </section>
        </div>
    </section>

</aside>
@endsection