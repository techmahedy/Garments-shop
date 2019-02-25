@extends('admin.layout.app')


@section('main-content')
  

       <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Add New Subcategory </h1>
          <p>Sample subcategory add</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">subcategory</li>
          <li class="breadcrumb-item"><a href="#">add subcategory</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
           @include('admin.errors.error')
              @include('admin.errors.success')
            <div class="tile-body">

              <form  method="post" action="{{ route('subcategory.store') }}">
                  {{ csrf_field() }}

              <div id="root">
                <div class="form-group">
                  <label class="control-label">Subcategory Title</label>
                  <input class="form-control" type="text" placeholder="Enter category title" name="subcategory_name" v-model="input">
                </div>

                <div class="form-group">
                  <label class="control-label">Subcategory Slug</label>
                  <input class="form-control" type="text" :value="slug" name="slug">
                </div>
              </div>

                <div class="form-group">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value="1" name="status">Do you want to publish it?
                    </label>
                  </div>
                </div>

            <div class="tile-footer">
              <input type="submit" class="btn btn-primary" value="Add Category" class="fa fa-fw fa-lg fa-check-circle">        
            </div>

              </form>
            </div>        
          </div>
        </div>

 
      </div>
       
      

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