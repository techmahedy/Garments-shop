@extends('admin.layout.app')

@section('selectBoxFooter')
    <script type="text/javascript" src="{{asset('admin/js/plugins/select2.min.js')}}"></script>
    <script type="text/javascript">
      $('#demoSelect').select2();
      $('#demoSelect2').select2();
      $('#demoSelect3').select2();
    </script>
@endsection

@section('ckEditor')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
    <script src="{{asset('templateEditor/ckeditor/ckeditor.js')}}"></script> 

  <script type="text/javascript">  
       CKEDITOR.replace( 'editor1' );  
    </script>

@endsection




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

              <form  method="post" action="{{ route('product.update',$products->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                   {{method_field('PUT')}}
                <div class="form-group">
                  <label class="control-label">Product Title</label>
                  <input class="form-control" type="text" name="title"  value="{{$products->title}}">
                </div>          

                 <div class="form-group">
                  <label class="control-label">Price</label>
                  <input class="form-control" type="number" name="price"  value="{{$products->price}}">
                </div>

                <div class="form-group">
                  <label class="control-label">Product Details</label>
                  <textarea id="editor1" class="ckeditor" name="body" value="{{ old('body') }}" >
                    
                   {{$products->body}}

                  </textarea>          
                </div>
                 
                <div class="form-group">
                  <label class="control-label">Choose Product Image</label>
                  <input class="form-control" type="file" name="image">
                  <img src="/{{$products->image}}" style="height: 50px;" width="50px;">
                </div>

           <div class="clearfix"></div>       
              <h4>Category</h4>
              <select class="form-control" id="demoSelect" multiple="" name="selectcategory[]">
                <optgroup label="Select Category">
                   @foreach ($categories as $category)
                     <option value="{{$category->id}}" 
                        @foreach ($products->productRelateToCategory as $ProductCategory)
                          @if ($ProductCategory->id == $category->id)
                          {{'selected="selected"'}}
                          @endif 
                        @endforeach >
                    {{ $category->category_name }} </option>               
                  @endforeach    
                </optgroup>
              </select>

               <div class="clearfix"></div>       
              <h4>Subcategory</h4>
              <select class="form-control" id="demoSelect2" multiple="" name="select_sub_category[]">
                <optgroup label="Select Subcategory">
                   @foreach ($sub_categories as $sub_categorie)
                     <option value="{{$sub_categorie->id}}" 
                        @foreach ($products->productRelateToSubCategory as $ProductSubCategory)
                          @if ($ProductSubCategory->id == $sub_categorie->id)
                          {{'selected="selected"'}}
                          @endif 
                        @endforeach >
                    {{ $sub_categorie->subcategory_name }} </option>               
                  @endforeach            
                </optgroup>
              </select>

                 <div class="clearfix"></div>       
              <h4>Brand</h4>
              <select class="form-control" id="demoSelect3" multiple="" name="selectbrand[]">
                <optgroup label="Select Brands">
                   @foreach ($brands as $brand)
                     <option value="{{$brand->id}}" 
                        @foreach ($products->productRelateToBrand as $ProductBrand)
                          @if ($ProductBrand->id == $brand->id)
                          {{'selected="selected"'}}
                          @endif 
                        @endforeach >
                    {{ $brand->brand_name }} </option>               
                  @endforeach               
                </optgroup>
              </select>
        
               <div class="form-group">
                  <label class="control-label">Updated By</label>
                  <input class="form-control" type="text" name="posted" value="{{Auth::user()->name}}" readonly="">
                </div>

                <div class="form-group">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" value="1" type="checkbox" name="status" @if ($products->status == 1)
                    {{'checked'}}
                  @endif >
                  I accept the terms and conditions
                    </label>
                  </div>
                </div>

           <div class="tile-footer">
             <input type="submit" class="btn btn-primary" value="Add Product" class="fa fa-fw fa-lg fa-check-circle">    
            </div>

              </form>

            </div>
          </div>
        </div>

 
      </div>
       
      

@endsection