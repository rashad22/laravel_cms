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
    <section class="content content-bg">
        <div class="col-md-12 content-bg">
            <!--md-6 starts-->
            <!--form control starts-->

            <table class="table">
                <tr>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                <tbody class="files">
                    <?php
                    foreach ($data['gallerys'] as $key => $image) {
                        $string = $image->med_name;
                        if (!preg_match("/\b(\.jpg|\.JPG|\.png|\.PNG|\.gif|\.GIF)\b/", $string, $output_array)) {

                        } else {
                            ?>
                            <tr class="template-download fade in">
                                <td>
                                    <span class="preview">
                                        <a href="{{$image->med_path}}{{$image->med_name}}" download="{{$image->med_path}}{{$image->med_name}}">
                                            <img width="250" height="150" src="{{$image->med_path}}{{$image->med_name}}" />
                                        </a>
                                    </span>
                                </td>
                                <td><a href="{{URL::to('remove-media')}}/{{$image->med_id}}" class="btn btn-success"><i class="fa fa-trash-o"></i> Delete</a></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>



</aside>
@endsection