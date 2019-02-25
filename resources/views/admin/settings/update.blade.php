@extends('admin.layout.app')

@section('main-content')
  

       <div class="app-title">
        <div>
          <h1 style="font-family: impact;"><i class="fa fa-edit"></i> Update User Password </h1>
          <p>update password page</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">password</li>
          <li class="breadcrumb-item"><a href="#">update password</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
           @include('admin.errors.error')
              @include('admin.errors.success')
            <div class="tile-body">

              <form  method="post" action="{{ route('settings.update',$users->id) }}">
                  {{csrf_field()}}
                  {{method_field('PUT')}}
                <div class="form-group">
                  <label class="control-label">Old Password</label>
                  <input type="password" class="form-control" placeholder="Enter old password" name="oldpassword">
                </div>

                <div class="form-group">
                  <label class="control-label">New Password</label>
                  <input type="password" class="form-control" placeholder="Enter new password" name="newpassword">
                </div>
          
                <div class="form-group">
                  <label class="control-label">Password Confirmation</label>
                  <input type="password" class="form-control" placeholder="Enter new password" name="password_confirmation">
                </div>

            <div class="tile-footer">
              <input type="submit" class="btn btn-primary" value="Update Password" class="fa fa-fw fa-lg fa-check-circle">        
            </div>

              </form>
            </div>        
          </div>
        </div>

 
      </div>
       
      

@endsection