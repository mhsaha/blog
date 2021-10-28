@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User</li>
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
              <h3>Edit User
                <a class="btn btn-success float-right btn-sm" href="{{route('users.view')}}">
                  <i class="fa fa-list"></i> User List</a>
              </h3>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            {{$editData->id}}
            <form method="post" action="{{route('users.update',$editData->id)}}" id="myForm">
              {{csrf_field()}}
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="usertype">User Role</label>
                  <select name="usertype" id="usertype" class="from-control">
                    <option value="">Select Role</option>
                    <option value="Admin" {{($editData->usertype=="Admin")?"selected":""}}>Admin</option>
                    <option value="User" {{($editData->usertype=="User")?"selected":""}}>User</option>
                  </select>
                </div>

                <div class="form-group col-md-4">
                  <label for="name">Name</label>
                  <input type="text" name="name" value="{{$editData->name}}" class="from-control">
                  <font style="color: red">
                    {{($errors->has('name'))?($errors->first('name')):''}}
                  </font>
                </div>
                <div class="form-group col-md-4">
                  <label for="email">Email</label>
                  <input type="text" name="email" value="{{$editData->email}}" class="from-control">
                  <font style="color: red">
                    {{($errors->has('email'))?($errors->first('email')):''}}
                  </font>
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

<script>
  $(function() {
        $('#myForm').validate({
            rules: {
              email: {
                required: true,
                email: true,
              },
              password: {
                required: true,
                minlength: 6
              },
              password2: {
                required: true,
                equalTo: '#password'
              },
            },
            messages: {
              name: {
                required: "Please enter username",
              },
              usertype: {
                required: "Please select user role",
              },
              email: {
                required: "Please enter email address",
                email: "Please enter a  <em>vaild</em> email address",
              },
              password: {
                required: "Please enter password",
                equalTo: "password will be 6 characters or numbers",
              },

              password 2: {
                required: "Please enter confirm password",
                minlength: "Confirm password does not match",
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
              },
            });
        });
</script>
@endsection