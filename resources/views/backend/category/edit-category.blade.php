@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-md-12">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3>Edit Category
                                <a class="btn btn-success float-right btn-sm" href="{{route('categories.view')}}">
                                    <i class="fa fa-list"></i> Edit Category Lists</a>
                            </h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{route('categories.update',$editData->id)}}" id="myForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="name"> Category Name</label>
                                    <input type="text" name="name" value="{{$editData->name}}" class="from-control">
                                </div>

                                <div class="form-group col-md-6" style="padding-right: 800px;">
                                    <input type="submit" value="Update" class="btn btn-primary">
                                </div>
                            </div>

                        </form>
                    </div> <!-- /.card-body-->
            </div>
            <!-- /.card -->
    </section>
    <!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.contentainer-fluid-->
</section>

<!-- /.content-->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
    $(document).ready(function() {
                    $('#myForm').validate({
                        rules: {
                            name: {
                                required: true,

                            },
                            


                        },
                        messages: {

                        },
                        errorElement: 'span',
                        errorPlacement: function(error, element) {
                            error.addClass('invalid-feedback');
                            element.closest('.form-group').append(error);
                        },
                        highlight: function(element, errorClass, validClass) {
                            $(element).addClass('is-invalid');
                        },
                        unhighlight: function(element, errorClass, validClass) {
                            $(element).removeClass('is-invalid');
                        }
                    });
                });
</script>


@endsection