@extends('Backend.layouts.master')

@section('content')


    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header" style="padding-bottom: 40px;">
            <h1>
                Blog category create
                <small>Preview</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#" >Create Category</a></li>

            </ol>
        </section>

    <!-- Main content -->





    <section class="content" style="padding-top: 10px;background-color: #9f191f">
        <div class="row">



            <div class="col-md-12">


                <div class="panel">
                    <div class="panel-header">
                        <h2 class="text-center" style="background-color: #9f191f; color: white;"> Create Your Category</h2>
                    </div>



                    <div class="panel-body">




                            <!-- /.box-header -->
                            <div class="">
                                <form role="form">

                                    <div class="alert alert-success" role="alert">
                                        <span class="btn btn-xs btn-bitbucket"><i class="glyphicon glyphicon-check"></i></span><strong> your category create successfully done !</strong>
                                    </div>

                                    <div class="alert alert-danger" role="alert">
                                        <span class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-exclamation-sign"></i></span><strong> your category create successfully done !</strong>
                                    </div>
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Catgeory name</label>
                                        <input type="text" class="form-control" placeholder="Enter ...">
                                    </div>

                                    <div class="form-group">
                                        <label>Category description</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Blog Image</label>
                                        <input type="file" name="blog_image">
                                    </div>

                                    <div class="form-group">
                                        <div class="radio">
                                            <label><input type="radio" name="publication_status" class="flat-red">Published</label>
                                            <label><input type="radio" name="publication_status" class="flat-red">Unpublished</label>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-success">Create Category</button>
                                    </div>



                                </form>
                            </div>
                            <!-- /.box-body -->





                    </div>
                </div>






                <!-- /.box -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>



    @endsection