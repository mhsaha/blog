@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Supplier</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Supplier</li>
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
                            <h3>Add Supplier
                                <a class="btn btn-success float-right btn-sm" href="{{route('suppliers.view')}}">
                                    <i class="fa fa-list"></i> Supplier Lists</a>
                            </h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{route('suppliers.store')}}" id="myForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="name"> Supplier Name</label>
                                    <input type="text" name="name" class="from-control">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="mobile_no">Mobile No</label>
                                    <input type="text" name="mobile_no" class="from-control">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="from-control">
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="from-control">
                                </div>



                                <div class="form-group col-md-6">
                                    <input type="submit" value="Submit" class="btn btn-primary">
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
                            mobile_no: {
                                required: true,

                            },

                            email: {
                                required: true,
                                email: true,
                            },
                            address: {
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