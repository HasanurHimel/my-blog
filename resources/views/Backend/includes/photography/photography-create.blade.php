@extends('Backend.layouts.master')

@section('css')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
    @endsection
@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="padding-bottom: 40px;">
            <h1>
                Photography
                <small>Preview</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#" >Create Photography</a></li>

            </ol>
        </section>

        <!-- Main content -->





        <section class="content" style="padding-top: 10px;background-color: #9f191f">
            <div class="row">



                <div class="col-md-12">


                    <div class="panel">
                        <div class="panel-header">
                            <h2 class="text-center" style="background-color: #9f191f; color: white;"> Create Your Photography</h2>
                        </div>



                        <div class="panel-body">


                            @include('Backend.errors.errors')


                            <!-- /.box-header -->
                            <div class="">
                                <form role="form" action="{{ route('photography.store') }}" id="myImageDropzone" class="dropzone"  files = true method="post" enctype="multipart/form-data">
                                @csrf



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
