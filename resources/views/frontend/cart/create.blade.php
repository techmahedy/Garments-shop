@extends('frontend.layout.app')

@section('mainContent')



                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Shopping cart</li>
                    </ul>
                </div>
 <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
                <div class="col-md-9" id="basket">

                    <div class="box">
     

                            <h1>Shopping cart</h1>
                          
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Title</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                            <th>Discount</th>
                                            <th>Total</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    @php  

                                       $sum = 0;

                                    @endphp
                              @foreach ($cart as $item)
      
                                    <tbody>

                                     <tr>
                                        <td> 
                                            <img src="/{{$item->image}}" alt="White Blouse Armani" style="height: 50px;">
                                        </td>
                                        <td>
                                            {{$item->title}}
                                         </td>
                                            <td>

                <form method="post" action="{{ url('/cart',$item->id) }}">
                    {{ csrf_field() }}               
                     <input type="hidden" value="{{$item->id}}" name="id">
                     <input type="number" value="{{$item->quantity}}" class="form-control" name="quantity">
                     <input type="submit" value="Edit">
                </form>
                                               
                                            </td>
                                            <td>${{$item->price}}</td>
                                            <td>$0.00</td>
                                            <td>$@php echo $total = $item->price*$item->quantity; @endphp</td>    
                                          
                                            <td><a href="{{ URL::to('/cart/'.$item->id) }}"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                        @php

                                         $sum = $sum + $total;

                                        @endphp
                                    </tbody>
                                        @endforeach
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th colspan="2">${{$sum}}</th>
                                        </tr>
                                    </tfoot>
                             
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="/shop" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                </div>
                                <div class="pull-right">
                                    <a href="/shop" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                   
                                </div>
                            </div>               
              
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th>${{$sum}}</th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th>$100.00</th>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <th>$20.00</th>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>${{$sum  + 120}}</th>
                                    </tr>
                                 
                                </tbody>       
                            </table>
         @guest 
          <a href="{{('register')}}" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i></a>
         @else
        <a href="{{('/payment')}}" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i></a>
         @endguest 
                        </div>

                    </div>        

                </div>
                <!-- /.col-md-3 -->
@endsection  