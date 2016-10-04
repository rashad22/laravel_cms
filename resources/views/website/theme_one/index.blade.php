@extends('website.theme_one.layout')
@section('content')
<div class="slider-2-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 slider-2-text wow fadeInUp">
                <h1>We are <span class="violet">HILLBD</span></h1>
                <p> " একটি ভাল বই বন্ধু অপেক্ষা শ্রেষ্ঠতম</p>
            </div>
        </div>
    </div>
</div>
<!-- Services -->
<div class="services-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 services-title wow fadeIn">
                <h2>নতুন বইসমূহ </h2>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($data['content'] as $key => $service) {
                ?>
                <div class="col-sm-4">
                    <div class="service wow fadeInUp">
                        <div class="service-icon">
                            <?php if (isset($service->post_featured_image)) { ?>
                                <img height="318" width="370" src="<?php echo asset($service->post_featured_image->med_path . $service->post_featured_image->med_name); ?>" class="img-responsive" alt="" data-at2x="<?php echo asset($service->post_featured_image->med_path . $service->post_featured_image->med_name); ?>" />
                            <?php } ?>
                        </div>
                        <h3>{{$service->post_title}}</h3>
                        {!!$service->post_content!!}
                        <a class="big-link-1" href="{{ URL::to('book-details') }}/{{$service->post_slug}}/{{$service->post_id}}">Read more</a>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>

<!-- Testimonials -->
<div class="testimonials-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 testimonials-title wow fadeIn">
                <h2>Testimonials</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 testimonial-list">
                <div role="tabpanel">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="tab1">
                            <div class="testimonial-image">
                                <img src="{{asset('public/website/theme_one/img/testimonials/1.jpg')}}" alt="" data-at2x="{{asset('public/website/theme_one/img/testimonials/1.jpg')}}">
                            </div>
                            <div class="testimonial-text">
                                <p>
                                    "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                                    Lorem ipsum dolor sit amet, consectetur..."<br>
                                    <a href="#">Lorem Ipsum, dolor.co.uk</a>
                                </p>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab2">
                            <div class="testimonial-image">
                                <img src="{{asset('public/website/theme_one/img/testimonials/2.jpg')}}" alt="" data-at2x="{{asset('public/website/theme_one/img/testimonials/2.jpg')}}">
                            </div>
                            <div class="testimonial-text">
                                <p>
                                    "Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip
                                    ex ea commodo consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit
                                    lobortis nisl ut aliquip ex ea commodo consequat..."<br>
                                    <a href="#">Minim Veniam, nostrud.com</a>
                                </p>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab3">
                            <div class="testimonial-image">
                                <img src="{{asset('public/website/theme_one/img/testimonials/3.jpg')}}" alt="" data-at2x="{{asset('public/website/theme_one/img/testimonials/3.jpg')}}">
                            </div>
                            <div class="testimonial-text">
                                <p>
                                    "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                                    Lorem ipsum dolor sit amet, consectetur..."<br>
                                    <a href="#">Lorem Ipsum, dolor.co.uk</a>
                                </p>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab4">
                            <div class="testimonial-image">
                                <img src="{{asset('public/website/theme_one/img/testimonials/1.jpg')}}" alt="" data-at2x="{{asset('public/website/theme_one/img/testimonials/1.jpg')}}">
                            </div>
                            <div class="testimonial-text">
                                <p>
                                    "Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip
                                    ex ea commodo consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit
                                    lobortis nisl ut aliquip ex ea commodo consequat..."<br>
                                    <a href="#">Minim Veniam, nostrud.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"></a>
                        </li>
                        <li role="presentation">
                            <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab"></a>
                        </li>
                        <li role="presentation">
                            <a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab"></a>
                        </li>
                        <li role="presentation">
                            <a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
