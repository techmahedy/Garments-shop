@extends('admin.layout.app')


@section('main-content')
  

       <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Update New Category </h1>
          <p>Sample brand add</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">brand</li>
          <li class="breadcrumb-item"><a href="#">add brand</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
           @include('admin.errors.error')
              @include('admin.errors.success')
            <div class="tile-body">

              <form  method="post" action="{{ route('brand.update',$brands->id) }}">
                  {{ csrf_field() }}
                   {{method_field('PUT')}}
                <div class="form-group">
                  <label class="control-label">Brand Title</label>
                  <input class="form-control" type="text" placeholder="Enter brand title" name="brand_name" value="{{$brands->brand_name}}">
                </div>
         
                <div class="form-group">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value="1" name="status" @if ($brands->status == 1)
                    {{'checked'}}
                  @endif>Do you want to publish it?
                    </label>
                  </div>
                </div>

            <div class="tile-footer">
              <input type="submit" class="btn btn-primary" value="Update Brand" class="fa fa-fw fa-lg fa-check-circle">      
               <a href="{{ route('brand.index') }}"  class="btn btn-primary" class="fa fa-fw fa-lg fa-check-circle">Back</a>  
            </div>

              </form>
            </div>        
          </div>
        </div>

 
      </div>
       
      

@endsection