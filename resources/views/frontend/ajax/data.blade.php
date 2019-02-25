 <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Hot this week</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="product-slider">
            

          
   @foreach ($items as $item)
                        <div class="item">
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
                                </div>
                                <!-- /.text -->

                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->
                        <form>
                            <input type="submit" name="" value="Details" class="btn btn-danger" style="margin-left: 40px;" > 
                        </form>
                            </div>
                            <!-- /.product -->
                        </div>

          
               @endforeach
           

                    </div>
                    <!-- /.product-slider -->
                      {!! $items->render() !!}
                </div>
                <!-- /.container -->

            </div>
    

         
             

                