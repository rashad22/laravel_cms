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
            <?php if (Session::get('message')) { ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('message')}}
                </div>
            <?php } ?>




        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="uploads">
                    <div role="tabpanel" class="tab-pane" id="upload_media">
                        <input type="hidden" value="" id="image_place"/>
                        <form id="fileupload" action="" method="POST" enctype="multipart/form-data">

                            <div id="dropzone" class="">
                                <div class="upload_button">
                                    <h4>Select or drop image to upload.</h4>
                                    <input type="file" name="brows_file" id="brows_file">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>

        $(function () {
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
                            window.location.replace('media');
                        }
                    }
                });
            });

        });
        /**
         * empty function is to check input field's value
         * @param {type} str
         * @returns {Boolean}
         */
        function empty(str) {
            if (!str || str.length === 0 || str === "" || typeof str == 'undefined' || !/[^\s]/.test(str) || /^\s*$/.test(str) || str.replace(/\s/g, "") === "") {
                return true;
            } else {
                return false;
            }
        }
    </script>
</aside>
@endsection