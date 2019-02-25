@extends('admin.layout.app')


@section('main-content')
  

       <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Creade New Card </h1>
          <p>Sample crad add</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">crad</li>
          <li class="breadcrumb-item"><a href="#">add crad</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
           @include('admin.errors.error')
              @include('admin.errors.success')
            <div class="tile-body">

              <form  method="post" action="{{ route('card.store') }}">
                  {{ csrf_field() }}
                <div class="form-group">
                  <label class="control-label">Card Number</label>
                  <input class="form-control" type="text" placeholder="Enter how many card you want to create" name="number">
                </div>

                 <div class="form-group">
                  <label class="control-label">Card Price</label>
                  <input class="form-control" type="text" placeholder="Enter card price" name="price">
                </div>
      

            <div class="tile-footer">
              <input type="submit" class="btn btn-primary" value="Create card" class="fa fa-fw fa-lg fa-check-circle">        
            </div>

              </form>
            </div>        
          </div>
        </div>

 
      </div>
       
      

@endsection