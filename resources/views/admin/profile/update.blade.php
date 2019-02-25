@extends('admin.layout.app')



@section('main-content')
  

       <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Add New Product </h1>
          <p>Sample product</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">product</li>
          <li class="breadcrumb-item"><a href="#">add product</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
           @include('admin.errors.error')
              @include('admin.errors.success')
            <div class="tile-body">

              <form  method="post" action="{{ route('profile.update',$users->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                   {{method_field('PUT')}}
                <div class="form-group">
                  <label class="control-label">Name</label>
                  <input class="form-control" type="text" name="name"  value="{{$users->name}}">
                </div>          

                 <div class="form-group">
                  <label class="control-label">Email</label>
                  <input class="form-control" type="email" name="email"  value="{{$users->email}}">
                </div>

                <div class="form-group">
                  <label class="control-label">User Details</label>
                  <textarea id="editor1" class="ckeditor" name="body" value="{{ old('body') }}" >
                    
                   {{$users->description}}

                  </textarea>          
                </div>
                 
                <div class="form-group">
                  <label class="control-label">Choose Product Image</label>
                  <input class="form-control" type="file" name="image">
                  <img src="/{{$users->image}}" style="height: 50px;" width="50px;">
                </div>     

           <div class="tile-footer">
             <input type="submit" class="btn btn-primary" value="Update Profile" class="fa fa-fw fa-lg fa-check-circle">    
            </div>

              </form>

            </div>
          </div>
        </div>

 
      </div>
       
      

@endsection


@section('ckEditor')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
    <script src="{{asset('templateEditor/ckeditor/ckeditor.js')}}"></script> 

  <script type="text/javascript">  
       CKEDITOR.replace( 'editor1' );  
    </script>

@endsection

