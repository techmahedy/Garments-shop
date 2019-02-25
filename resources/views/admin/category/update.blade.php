@extends('admin.layout.app')
@section('selectBoxFooter')
    <script type="text/javascript" src="{{asset('admin/js/plugins/select2.min.js')}}"></script>
    <script type="text/javascript">
      $('#demoSelect').select2();
    </script>
@endsection

@section('main-content')
  

       <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Update Category </h1>
          <p>Sample category add</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">category</li>
          <li class="breadcrumb-item"><a href="#">add category</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
           @include('admin.errors.error')
              @include('admin.errors.success')
            <div class="tile-body">

              <form  method="post" action="{{ route('category.update',$categories->id) }}">
                  {{ csrf_field() }}
                   {{method_field('PUT')}}
                <div class="form-group">
                  <label class="control-label">Category Title</label>
                  <input class="form-control" type="text" placeholder="Enter category title" name="category_name" value="{{$categories->category_name}}">
                </div>
         
             <div class="clearfix"></div>       
              <label class="control-label">Select Main Category</label>
              <select class="form-control" id="demoSelect" multiple="" name="category_id[]">
                <optgroup>
                    @foreach ($sub_categories as $sub_category)
                     <option value="{{$sub_category->id}}" 
                        @foreach ($categories->CategoryRelateToSubcategory as $RelationalSubCategory)
                          @if ($RelationalSubCategory->id == $sub_category->id)
                          {{'selected="selected"'}}
                          @endif 
                        @endforeach >
                    {{ $sub_category->subcategory_name }} </option>               
                  @endforeach    
                </optgroup>
              </select>
           
              <div class="form-group">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value="1" name="status" @if ($categories->status == 1)
                    {{'checked'}}
                  @endif>Do you want to publish it?
                    </label>
                  </div>
                </div>  

            <div class="tile-footer">
              <input type="submit" class="btn btn-primary" value="Update Category" class="fa fa-fw fa-lg fa-check-circle">      
               <a href="{{ route('category.index') }}"  class="btn btn-primary" class="fa fa-fw fa-lg fa-check-circle">Back</a>  
            </div>

              </form>
            </div>        
          </div>
        </div>

 
      </div>
       
      

@endsection