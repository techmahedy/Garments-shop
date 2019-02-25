              
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

  
   