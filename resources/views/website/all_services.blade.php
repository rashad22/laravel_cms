@extends('layouts.layout')
@section('content')
<h1 title="Assistance Consultancy" class="hidden">Dynamic Page</h1>
<!-- Breadcrumb Start -->
<div class="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul>
                    <li><a href="\index">Home</a></li>
                    <li>{{$data['meta']}}</li>
                </ul>
            </div>
        </div>
    </div>
</div><!-- End Breadcrumb- -->
<div class="section services">
    <div class="container">
        <div class="row">
            <?php
            foreach ($data['content'] as $key => $service) {
                if ($key % 4 == 0) {
                    $bg = 'bg-danger';
                } else if ($key % 4 == 1) {
                    $bg = 'bg-primary';
                } else {
                    $bg = 'bg-success';
                }
                ?>
                <div class="max_400_767 col-xs-12 col-sm-6 col-md-4">
                    <div class="thumbnail {{$bg}}">
                        <h3>{{$service->post_title}}</h3>
                        <?php if (isset($service->post_featured_image)) { ?>

                            <img height="318" width="370" src="<?php echo asset($service->post_featured_image->med_path . $service->post_featured_image->med_name); ?>" class="img-responsive" alt="" />

                        <?php } ?>
                        <div class="caption">
                            {!!$service->post_content!!}
                            <p class="btn_cont">
                                <a href="#" class="btn btn-success   btn-raised" role="button">Read More</a>
                            </p>
                        </div>
                    </div>
                </div>


            <?php } ?>

        </div>
    </div>
</div>
@endsection