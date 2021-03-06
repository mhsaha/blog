@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Customer Update</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Customer Update</li>
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
                            <h3>Edit Update
                                <a class="btn btn-success float-right btn-sm" href="{{route('customers.view')}}">
                                    <i class="fa fa-list"></i> Customer Update Lists</a>
                            </h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{route('customers.update',$editData->id)}}" id="myForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="name"> customer Name</label>
                                    <input type="text" name="name" value="{{$editData->name}}"  class="from-control">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="mobile_no">Mobile No</label>
                                    <input type="text" name="mobile_no" value="{{$editData->mobile_no}}"  class="from-control">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" value="{{$editData->email}}" class="from-control">
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" value="{{$editData->address}}" class="from-control">
                                </div>



                                <div class="form-group col-md-6">
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