@extends('admin.layout.app')


@section('slug')   

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
            <div class="tile-body" >
         
              <form  method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

            <div id="root">
                <div class="form-group">
                  <label class="control-label">Product Title</label>
                <input type="text" class="form-control" name="title" v-model="input" placeholder="Enter your title">
                </div>
    

                <div class="form-group">
                  <label class="control-label">Slug</label>
                  <input :value="slug" type="text" class="form-control" name="slug">
                </div>
            </div>

                 <div class="form-group">
                  <label class="control-label">Price</label>
                  <input class="form-control" type="number" placeholder="Enter product price" name="price" value="{{ old('price') }}">
                </div>

                <div class="form-group">
                  <label class="control-label">Product Code</label>
                  <input class="form-control" type="text" placeholder="Enter product coder" name="product_code" value="{{$productKey}}">
                </div>


                <div class="form-group">
                  <label class="control-label">Product Details</label>
                  <textarea id="summernote"  name="body" value="{{ old('body') }}" ></textarea>          
                </div>
                 
                <div class="form-group">
                  <label class="control-label">Choose Product Image</label>
                  <input class="form-control" type="file" name="image">
                </div>

           <div class="clearfix"></div>       
              <h4>Category</h4>
              <select class="form-control" id="demoSelect" multiple="" name="selectcategory[]">
                <optgroup label="Select Category">
                    @foreach ($categories as $item)
                      <option value="{{$item->id}}">{{$item->category_name}}</option>
                    @endforeach
                </optgroup>
              </select>

               <div class="clearfix"></div>       
              <h4>Subcategory</h4>
              <select class="form-control" id="demoSelect2" multiple="" name="select_sub_category[]">
                <optgroup label="Select Subcategory">
                   @foreach ($sub_categories as $item)
                      <option value="{{$item->id}}">{{$item->subcategory_name}}</option>
                    @endforeach           
                </optgroup>
              </select>

                 <div class="clearfix"></div>       
              <h4>Brand</h4>
              <select class="form-control" id="demoSelect3" multiple="" name="selectbrand[]">
                <optgroup label="Select Brands">
                   @foreach ($brands as $item)
                      <option value="{{$item->id}}">{{$item->brand_name}}</option>
                    @endforeach             
                </optgroup>
              </select>
        
               <div class="form-group">
                  <label class="control-label">Posted</label>
                  <input class="form-control" type="text" name="posted" value="{{Auth::user()->name}}" readonly="">
                </div>

                <div class="form-group">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" value="1" type="checkbox" name="status">Publish product ?
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

@section('selectBoxFooter')
    <script type="text/javascript" src="{{asset('admin/js/plugins/select2.min.js')}}"></script>
    <script type="text/javascript">
      $('#demoSelect').select2();
      $('#demoSelect2').select2();
      $('#demoSelect3').select2();
    </script>
@endsection

@section('ckEditor')
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
  
  <script type="text/javascript">  
     $(document).ready(function() {
         $('#summernote').summernote();
        });
    </script>
@endsection


@section('scripts')

<script type="text/javascript">
  const app = new Vue({
  el: '#root',
  
  data: {
    input: ''
  },
  
  computed: {
    slug: function () {
      return this.slugify(this.input)
    }
  },
  
  methods: {
    /**
     * https://gist.github.com/joseluisq/819d694db6fd675deae7270b4e55b3ac
     */
    slugify (text, ampersand = 'and') {
      const a = 'àáäâèéëêìíïîòóöôùúüûñçßÿỳýœæŕśńṕẃǵǹḿǘẍźḧ'
      const b = 'aaaaeeeeiiiioooouuuuncsyyyoarsnpwgnmuxzh'
      const p = new RegExp(a.split('').join('|'), 'g')

      return text.toString().toLowerCase()
        .replace(/[\s_]+/g, '-')
        .replace(p, c =>
          b.charAt(a.indexOf(c)))
        .replace(/&/g, `-${ampersand}-`)
        .replace(/[^\w-]+/g, '')
        .replace(/--+/g, '-')
        .replace(/^-+|-+$/g, '')
    }   
  }
})

</script>

@endsection