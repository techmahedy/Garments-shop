@extends('frontend.layout.app')

@section('mainContent')

 <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Checkout - Order review</li>
                    </ul>
                </div>

                <div class="col-md-9" id="checkout">

                    <div class="box">
                        
                            <h1>Checkout - Order review</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li class="disabled"><a href="/profile/@php  if(isset(Auth::user()->id)){echo Auth::user()->id;}@endphp"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li class="disabled"><a href="/payment"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="active"><a href="/review-order"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>

                            <div class="content">
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
                            </div>
                            <!-- /.content -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="/shop" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Shop </a>
                                </div>
@php   
 if(Auth::user()->id)
$id = Auth::user()->id;

@endphp
                            <form action="{{URL::to('/review-order/'.$id)}}" method="post">
                                {{csrf_field()}}
                                 <div class="pull-right">
                                    <input type="submit" class="btn btn-primary" class="fa fa-chevron-right" value="Place an order">  
                                </div>
                            </form>
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
                        </div>

                    </div>

                </div>

             
@endsection  