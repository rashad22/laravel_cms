@extends('website.theme_one.layout')
@section('content')
<div class="services-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 services-title wow fadeIn">
                <h2>Our Books</h2>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($data['content'] as $key => $service) {
                ?>
                <div class="col-sm-3">
                    <div class="service wow fadeInUp">
                        <div class="service-icon">
                            <?php if (isset($service->post_featured_image)) { ?>

                                <img height="318" width="370" src="<?php echo asset($service->post_featured_image->med_path . $service->post_featured_image->med_name); ?>" class="img-responsive" alt="" data-at2x="<?php echo asset($service->post_featured_image->med_path . $service->post_featured_image->med_name); ?>" />

                            <?php } ?>
                        </div>
                        <h3>{{$service->post_name}}</h3>
                        <?php if (isset($service->post_file)) { ?>
                            <a class="big-link-1" target="_blank" href="<?php echo asset($service->post_file->med_path . $service->post_file->med_name); ?>" download="<?php echo asset($service->post_file->med_path . $service->post_file->med_name); ?>"><i class="fa fa-download"></i> Download</a>
                        <?php } ?>
                        <a class="big-link-1" href="{{ URL::to('book-details') }}/{{$service->post_slug}}/{{$service->post_id}}">Read more</a>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
@endsection
