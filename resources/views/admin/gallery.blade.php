@extends('admin.master')

@section('content')
<aside class="right-side">

    <section class="content-header">
        <h1>
            <div class="col-sm-3">{{$data['title']}}</div>
            <form action="{{URL::to('save-gallery-name')}}" method="post">
                <div class="col-sm-3">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
                    <input type="hidden" name="opt_id" id="opt_id" value="{{$data['gallery_name']->opt_id}}"/>
                    <input type="text" value="{{$data['gallery_name']->opt_value}}" placeholder="Gallery Name Here" name="gallery_name" class="form-control" id="gallery_name" />
                </div>
                <div class="col-sm-3">
                    <input type="submit" name="submit" value="Save" class="btn btn-success" id="submit" />
                    <button onclick="all_media_grid(1)" data-target="#media_modal" data-toggle="modal" type="button" value="Media" class="btn btn-primary">Media</button>
                </div>
            </form>
        </h1>
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




        </div>
    </section>
    <section class="content content-bg">
        <div class="col-md-12 content-bg">

            <table class="table">
                <tr>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                <tbody class="files">
                    <?php
                    if (isset($data['gallerys'])) {
                        foreach ($data['gallerys'] as $key => $image) {
                            ?>
                            <tr class="template-download fade in">
                                <td>
                                    <span class="preview">
                                        <a href="">
                                            <img width="250" height="150" src="{{$image->med_path}}{{$image->med_name}}" />
                                        </a>
                                    </span>
                                </td>
                                <td><a href="{{URL::to('remove-gallery-item')}}/{{$image->med_id}}" class="btn btn-success">Remove</a></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <div class="modal fade" id="media_modal" tabindex="-1" role="dialog" aria-labelledby="select_media_modal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class=""><a href="#upload_media" aria-controls="home" role="tab" data-toggle="tab">Upload Media</a></li>
                        <li role="presentation" class="select_media_tab active"><a href="#existing_media" aria-controls="profile" role="tab" data-toggle="tab">Select Media</a></li>
                    </ul>
                </div>
                <div class="modal-body">
                    <!-- Tab panes -->
                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane" id="upload_media">
                            <input type="hidden" value="" id="image_place"/>
                            <form id="fileupload" action="admin/save_media" method="POST" enctype="multipart/form-data">
                                <div id="dropzone" class="">
                                    <div class="upload_button">
                                        <h4>Select or drop image to upload.</h4>
                                        <input type="file" name="brows_file" id="brows_file">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane active" id="existing_media">
                            <div class="row">
                                <div class="col-sm-9 all_media">
                                    <div class="all_items" id="gallery">

                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <form action="" id="media_details">
                                        <div class="demo_image">
                                            <img src="" alt="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" id="file_caption" class="form-control" placeholder="File Caption">
                                            <input type="hidden" id="media_id" name="media_id" value="">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="media_description" id="media_description" class="form-control" rows="5" placeholder="File Details"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <input class="" value="<?= $data['old_items'] ?>" type="hidden" name="img_id" id="modal_hidden_input" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default close_modal">Close</button>
                    <button type="button" class="btn btn-primary set_featured_image_button">Set Gallery Image</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function all_media_grid(active = null, image_place = null) {
            $('#image_place').val(image_place);
            var all_media_grid = '';
            var parent_id = 'set_featured_image';
            var multiple = 'true';
            var url = "{{URL::to('get-ajax-images')}}";

            status = '';
            $('.loading-img').show();
            $.ajax({
                type: 'post',
                url: url,
                dataType: 'text',
                success: function (data) {
                    $('.loading-img').hide();
                    var json = jQuery.parseJSON(data);
                    $.each(json, function (index, value) {
                        $('.loading-img').hide();
                        var src = value.med_path + value.med_name;
                        if (active == 1 && index == 0) {
                            status = 'selected';
                            var old_value = $('#modal_hidden_input').val();
                            $('#modal_hidden_input').val(old_value + ',' + value.med_id);
                        } else {
                            status = '';
                        }
                        if (/\.(jpe?g|png|gif|bmp)$/i.test(value.med_name)) {


                            all_media_grid += '<div class="item ' + status + '" data-id="' + value.med_id + '">' +
                                    '<div class="img_table">' +
                                    '<div class="img_row">' +
                                    '<div class="img_col">' +
                                    '<img src="' + src + '" alt=" ">' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="check_icon"><span class="glyphicon glyphicon-ok"></span></div>' +
                                    '</div>';
                        }
                    });
                    $('#gallery').html(all_media_grid);
                    $('.modal .all_media .all_items .item').click(function () {
                        var demo_image_src = $(this).children().children().children().children().attr('src');
                        var med_id = $(this).attr('data-id');
                        $('.modal .all_media .all_items .item').removeClass('current');
                        if (multiple == 'false') {
                            $('.modal .all_media .all_items .item').removeClass('selected');
                        }
                        $(this).toggleClass('selected');
                        $(this).addClass('current');
                        $('#media_details .demo_image img').attr('src', demo_image_src);
                        modal_hidden_input = $('#modal_hidden_input').val();
                        if ($(this).hasClass('selected')) {
                            if (modal_hidden_input.length == 0) {
                                $('#modal_hidden_input').val(',' + med_id);
                            } else {
                                if (multiple == 'true') {
                                    $('#modal_hidden_input').val(modal_hidden_input + ',' + med_id);
                                } else {
                                    $('#modal_hidden_input').val(',' + med_id);
                                }
                            }
                        } else {
                            $('#modal_hidden_input').val(modal_hidden_input.replace(',' + med_id, ''));
                        }

                        media_details_function(med_id);
                    });
                    $("#media_details").submit(function (event) {
                        event.preventDefault();
                        var med_id = $('#media_details').find('#media_id').val();
                        var med_caption = $('#media_details').find('#file_caption').val();
                        var med_description = $('#media_details').find('textarea#media_description').val();
                        var url = "{{URL::to('ajax-caption-update')}}";

                        $.ajax({
                            type: "POST",
                            url: url,
                            data: {med_id: med_id, med_caption: med_caption, med_description: med_description},
                            success: function (result) {
                                $('.alert_msg.updated').fadeIn().delay(3000).fadeOut("fast", 0);
                            }
                        });
                    });
                    $('.set_featured_image_button').click(function () {
                        media_ids = $('#modal_hidden_input').val().slice(1);
                        media_id_array = media_ids.split(',');
                        var opt_id = $('#opt_id').val();
                        last_img_src = $('[data-id="' + media_id_array[0] + '"]').children().children().children().children().attr('src');
                        if (media_ids == '') {
                            $('.' + parent_id + ' .media_id_hidden').val('null');
                        } else {
                            $('#' + image_place).attr('src', last_img_src);
                            $('#' + image_place).parent().parent().find('.media_id_hidden').val(media_ids);
                        }
                        image_place = '';
                        var url = "{{URL::to('ajax-gallery-update')}}";
                        $.ajax({
                            url: url,
                            type: 'post',
                            dataType: 'text',
                            data: {media_ids: media_ids, opt_id: opt_id},
                            success: function (data) {
                                $('#media_modal').modal('hide');
                                location.reload();
                            }
                        });

                    });
                }

            });
        }

        function media_details_function(media_id) {
            var url = "{{URL::to('ajax-media-caption')}}";
            $.ajax({
                url: url,
                type: 'post',
                dataType: 'text',
                data: {media_id: media_id},
                success: function (data) {
                    data = $.parseJSON(data);
                    $('#file_name').html(data.med_name);
                    if (Number(data.med_caption)) {
                        $('#file_caption').attr('disabled', true);
                    } else {
                        $('#file_caption').removeAttr('disabled');
                    }
                    $('#file_caption').val(data.med_caption);
                    $('#media_description').text(data.med_description);
                    $('#media_description').val(data.med_description);
                    $('#media_id').val(data.med_id);
                }
            });
        }
        $('#brows_file').change(function () {
            var file_data = $(this).prop("files")[0];
            var form_data = new FormData();
            form_data.append("file", file_data);
            $('.loading-img').show();
            var url = "{{URL::to('ajax-uploads')}}";
            $.ajax({
                url: url,
                cache: false,
                contentType: false,
                processData: false,
                type: 'post',
                data: form_data,
                success: function (data) {
                    if (data == 'error') {
                        alert('Upload Failed');
                    } else {
                        $('#select_media .nav-tabs li,.tab-pane').removeClass('active');
                        $('#select_media .nav-tabs li.select_media_tab,#existing_media').addClass('active');
                    }
                }
            });
        });
    </script>

</aside>
@endsection