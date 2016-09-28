@extends('layouts.layout')
@section('content')
<h1 title="Assistance Consultancy" class="hidden">Assistance Consultancy</h1>
<main>
    <!-- Main Slider -->
    <div id="main_slider" class="carousel slide" data-ride="carousel" data-interval="false">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#main_slider" data-slide-to="0" class="active"></li>
            <li data-target="#main_slider" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="public/website/images/slide-1.jpg" alt="...">
                <div class="carousel-caption">
                    <h2 class="big_text">Assistance in Bangladesh</h2>
                    <p>We are professional step by step guidance through the flat buy or sale or rent or management in Bangladesh. We are also able to assistant with Birth Certificate, Passport, National ID card, Power of attorney and Open a bank account in Bangladesh</p>
                </div>
            </div>
            <div class="item">
                <img src="public/website/images/slide-2.jpg" alt="...">
                <div class="carousel-caption">
                    <h2 class="big_text">Personal Services</h2>
                    <p>Birth Certificate <br />
                        Open a bank account in Bangladesh <br />
                        National ID card<br />
                        Power of attorney </p>
                </div>
            </div>
        </div>
    </div><!-- End Main Slider -->

    <!-- Brochure Section-->
    <div class="section brochure visible-sm visible-md visible-lg">
        <div class="container">
            <div class="row">
                <div class="text_center_480 full_480 col-xs-8 col-sm-7 col-md-4">
                    <h3>Our Services</h3>
                </div>

            </div>
        </div>
    </div>
    <!-- End Brochure section -->

    <!-- Services section -->
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
    <!-- End services section-->

    <!-- Success Section -->
    <div class="section success">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <span class="big_text">Personal Services</span>
                    <ul>
                        <li>Birth Certificate </li>
                        <li>Open a bank account in Bangladesh </li>
                        <li>National ID card</li>
                        <li>Power of attorney</li>
                    </ul>

                </div>
            </div>
        </div>
    </div><!-- End Success Section-->
</main>
@endsection
