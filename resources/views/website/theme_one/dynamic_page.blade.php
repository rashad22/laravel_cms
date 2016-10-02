@extends('website.theme_one.layout')
@section('content')
<div class="about-us-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 about-us-text wow fadeInLeft">
                <?php if (isset($data['content_meta'])) { ?>
                    <div class="col-md-4">
                        <img src="<?php echo asset($data['content_meta']->med_path . $data['content_meta']->med_name); ?>" class="img-responsive" alt="" />
                    </div>
                <?php } ?>
                <div class="col-md-8">
                    <h1 class="main_title">{{$data['content']->post_title}}</h1>
                    <p>

                        {!!$data['content']->post_content!!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
