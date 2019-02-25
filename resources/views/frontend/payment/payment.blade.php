@extends('frontend.layout.app')

@section('mainContent')


                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Checkout - Payment method</li>
                    </ul>
                </div>
              
       @include('frontend.layout.customer')
                   
                <div class="col-md-9" id="checkout">

                    <div class="box">
                        <form method="post" action="checkout4.html">
                            <h1>Payment - Pay with PayPal</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li class="disabled"><a href=""><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li class="active"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="disabled"><a href=""><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>

           <div>
              <script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
              <script>paypal.Buttons().render('body');</script>
           </div>
                           

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="basket.html" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Shipping method</a>
                                </div>
                                <div class="pull-right">
                                    <a href="/review-order" class="btn btn-primary">Continue to Order review<i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->

           
@endsection  