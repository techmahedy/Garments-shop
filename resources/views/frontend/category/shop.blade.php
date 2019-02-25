@extends('frontend.layout.app')
    <!-- *** NAVBAR END *** -->
          
     @section('mainContent')
       
   
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li>Home</li>
                        <li>Shop</li>
                        <li>Category</li>
                        <li>Product</li>
                    </ul>

                </div>

        @include('frontend.layout.sidebar');      
   

                <div class="col-md-9">
                    <div class="box">
                        <h1>Cats Eye</h1>
                        <p>The largest online market place of Bangladesh!</p>
                    </div>

           
                    <div class="row products">
                            @foreach ($items as $item)
        <div class="col-md-4 col-sm-6">
                <div class="product">
                    <div class="flip-container">
                        <div class="flipper">
                            <div class="front">
                                <a href="{{ route('product',$item->slug) }}">
                                    <img src="/{{$item->image}}" alt="" class="img-responsive">
                                </a>
                            </div>
                            <div class="back">
                                <a href="{{ route('product',$item->slug) }}">
                                    <img src="/{{$item->image}}" alt="" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('product',$item->slug) }}" class="invisible">
                        <img src="/{{$item->image}}" alt="" class="img-responsive">
                    </a>
                    <div class="text">
                        <h3><a href="{{ route('product',$item->slug) }}">{{$item->title}}</a></h3>
                        <p class="price">${{$item->price}}</p>
                        <p class="buttons">
                            <a href="{{ route('product',$item->slug) }}" class="btn btn-default">View detail</a>
                            <a href="" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </p>
                    </div>
                    <!-- /.text -->
                </div>
                <!-- /.product -->
            </div>
  @endforeach

  
     {!! $items->render() !!}
    
                    </div>
                </div>

     @endsection
                  