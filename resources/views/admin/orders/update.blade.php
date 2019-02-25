@extends('admin.layout.app')


@section('main-content')
  

  
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
            @if ($data->status == NULL)
              <h3 class="box-title">Do you want to approve this order?</h3>
            @else
              <h3 class="box-title">Do you want to dis-approve this order?</h3>
            @endif

              @include('admin.errors.error')
              @include('admin.errors.success')
            </div>
          

            <form role="form" method="post" action="{{route('order.update',$data->id)}}">
              {{csrf_field()}}
              {{method_field('PUT')}}

               <div class="form-group">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" value="1" type="checkbox" name="status" @if ($data->status == 1)
                    {{'checked'}}
                  @endif >
                 Yes
                    </label>
                  </div>
                </div>


              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('order.index') }}" class="btn btn-primary">Back</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
    
       
      

@endsection