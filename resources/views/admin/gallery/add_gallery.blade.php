@extends('admin.master')

@section('content')
<aside class="right-side">
    <link href="{{ asset('public/admin/vendors/dropzone-master/downloads/css/dropzone.css') }}" rel="stylesheet" type="text/css" />

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
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    This plugins works only on Latest Chrome, Firefox, Safari, Opera & Internet Explorer 10.
                </div>
                <!-- First Basic Table strats here-->
                <div class="panel panel-info" style="overflow:auto;">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="upload-alt" data-size="20" data-loop="true" data-c="#fff" data-hc="white"></i>
                            File Drop Zone
                        </h3>
                    </div>
                    <div class="panel-body" style="padding:0px !important;">
                        <div class="col-md-12" style="padding:30px; float:center;">
                            <form action="target" class="dropzone" id="myDropzone">
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="{{ asset('public/admin/vendors/dropzone-master/downloads/dropzone.js') }}"></script>
    <script>
var FormDropzone = function () {
    return {
        //main function to initiate the module
        init: function () {

            Dropzone.options.myDropzone = {
                init: function () {
                    this.on("addedfile", function (file) {
                        // Create the remove button
                        var removeButton = Dropzone.createElement("<button>Remove file</button>");

                        // Capture the Dropzone instance as closure.
                        var _this = this;

                        // Listen to the click event
                        removeButton.addEventListener("click", function (e) {
                            // Make sure the button click doesn't submit the form:
                            e.preventDefault();
                            e.stopPropagation();

                            // Remove the file preview.
                            _this.removeFile(file);
                            // If you want to the delete the file on the server as well,
                            // you can do the AJAX request here.
                        });

                        // Add the button to the file preview element.
                        file.previewElement.appendChild(removeButton);
                    });
                }
            }
        }
    };
}();
jQuery(document).ready(function () {

    FormDropzone.init();
});
    </script>
</aside>
@endsection