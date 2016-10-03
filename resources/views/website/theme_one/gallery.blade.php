@extends('website.theme_one.layout')
@section('content')
<div class="about-us-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 portfolio-masonry">
                <?php
                if (isset($data['gallery'])) {
                    foreach ($data['gallery'] as $key => $image) {
                        ?>
                        <div class="portfolio-box print-design">
                            <div class="portfolio-box-container">
                                <img src="{{$image->med_path}}{{$image->med_name}}" alt="" data-at2x="{{$image->med_path}}{{$image->med_name}}">
                                <div class="portfolio-box-text">
                                    <h3><?= ($image->med_caption != '') ? $image->med_caption : 'NO Caption' ?></h3>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
@endsection
