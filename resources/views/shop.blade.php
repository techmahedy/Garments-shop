@extends('frontend.layout.app')
    <!-- *** NAVBAR END *** -->
          
     @section('mainContent')
       
   
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li>Home</li>
                        <li>Shop</li>
                        <li>Product</li>
                        <li>Shop Now</li>
                    </ul>

                </div>

        @include('frontend.layout.sidebar');      
   

                <div class="col-md-9">
                    <div class="box">
                        <h1>Cats Eye</h1>
                        <p>The largest online market place of Bangladesh!</p>
                    </div>

           
                    <div class="row products">
                         <div id="post-ajax">
                             @include('frontend.ajax.shop-data')
                         </div>       
                    </div>
                </div>

     @endsection
                  