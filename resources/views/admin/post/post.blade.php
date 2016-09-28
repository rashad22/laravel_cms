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
         <?php if(Session::get('message')){?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                       {{Session::get('message')}}
                    </div>
                        <?php }?>
            <div class="col-md-12 content-bg">
                <!--md-6 starts-->
                <!--form control starts-->
               
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Post Name</th>
                                    <th>Post Title</th>
                                    <th>Date</th>
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data['result'] as $key=>$row) { ?>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$row->post_name}} <label class="label label-{{($row->post_status==1)?'success':'warning'}}"> {{($row->post_status==1)?'Publich':'Unpublish'}}</label></td>
                                    <td>{{$row->post_title}}</td>
                                    <td>{{$row->post_datetime}}</td>
                                    
                                    <td>
                                    <button type="button" class="btn btn-{{($row->post_status==1)?'success':'warning'}}"><i class="fa fa-check"></i></button>
                                        <a class="btn btn-sm btn-success" href="post-details/{{$row->post_id}}"><i class="fa fa-eye"></i> View</a>
                                        <a class="btn btn-sm btn-success" href="edit-post/{{$row->post_id}}"><i class="fa fa-edit"></i> Edit</a>
                                        <a class="btn btn-sm btn-success" href="delete-post/{{$row->post_id}}"><i class="fa fa-trash"></i> Delete</a>
                                        
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <?php echo $data['result']->render(); ?>
            </div>
        </section>

    </aside>
    @endsection