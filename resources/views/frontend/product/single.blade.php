@extends('frontend.layout.app')
    <!-- *** NAVBAR END *** -->
@section('single')
 <style type="text/css">
 

.titleBox {
    background-color:#fdfdfd;
    padding:10px;
    width: 810px;
    margin-right: 30px;
}
.titleBox label{
  color:#444;
  margin:0;
  display:inline-block;
}

.commentBox {
    padding:10px;
    border-top:1px dotted #bbb;
}
.commentBox .form-group:first-child, .actionBox .form-group:first-child {
    width:80%;
}
.commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
    width:18%;
}
.actionBox .form-group * {
    width:100%;
}
.taskDescription {
    margin-top:10px 0;
}
.commentList {
    padding:0;
    list-style:none;
    max-height:200px;
    overflow:auto;
}
.commentList li {
    margin:0;
    margin-top:10px;
}
.commentList li > div {
    display:table-cell;
}
.commenterImage {
    width:30px;
    margin-right:5px;
    height:100%;
    float:left;
}
.commenterImage img {
    width:100%;
    border-radius:50%;
}
.commentText p {
    margin:0;
}
.sub-text {
    color:#aaa;
    font-family:verdana;
    font-size:11px;
}
.actionBox {
    border-top:1px dotted #bbb;
    padding:10px;
}

 </style>
@endsection 

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
                        <li><a href="#">
                             @foreach ($product->productRelateToCategory as $category)
                                         <a href="">    
                                         {{ $category->category_name }}
                              @endforeach
                        </a>
                        </li>
                        <li><a href="#">
                             @foreach ($product->productRelateToSubCategory as $sub_category)
                                         <a href="">    
                                         {{ $sub_category->subcategory_name }}
                              @endforeach
                        </a>
                        </li>
                        <li>{{$product->title}}</li>
                    </ul>

                </div>

        @include('frontend.layout.sidebar')      

                <div class="col-md-9">

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <img src="/{{$product->image}}" alt="" class="img-responsive">
                            </div>

                            <div class="ribbon sale">
                                <div class="theribbon">SALE</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                            <div class="ribbon new">
                                <div class="theribbon">NEW</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center">{{$product->title}}</h1>
                                <p class="price">Price : ${{$product->price}} </p>
                                <p class="price">Code : {{$product->product_code}} </p>

                                <p class="text-center buttons">

                                    <form action="{{ URL::to('/cart/product',$product->id) }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="Number" name="quantity" value="1" />
                                        <i class="fa fa-shopping-cart"></i> 
                                        <input type="submit" value="Add to cart" class="btn btn-primary">
                                    </form>

                                    <form style="margin-top: 10px;" action="{{ URL::to('/favourite/product', $product->id) }}" method="post">
                                        {{csrf_field()}}
                                       <i class="fa fa-heart"></i>
                                        <input type="submit" value="Add to wishlist" class="btn btn-primary">
                                   </form>
                                    
                                </p>

                            </div>
                  
                        </div>

                    </div>


                    <div class="box" id="details">
                        <p>
                            <h4>Product details</h4>
                            <p>
                                {!! htmlspecialchars_decode($product->body) !!}
                            </p>
                            <h4>Brands</h4>
                            <ul>
                            
                              @foreach ($product->productRelateToBrand as $brands)
                                       <li>   <a href=""> {{ $brands->brand_name }} </a>  </li>    
                              @endforeach
                            </ul>
                            <h4>Size & Fit</h4>
                            <ul>
                                <li>Regular fit</li>
                                <li>The model (height 5'8" and chest 33") is wearing a size S</li>
                            </ul>

                            <blockquote>
                                <p><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em>
                                </p>
                            </blockquote>

                            <hr>
                
                            <div class="social">
                                <h4>Show it to your friends</h4>
                                <p>
                                  <div class="sharethis-inline-share-buttons"></div>
                                </p>
                            </div>
                    </div>
                
<!-- Commnets Section -->     
           
   
    <div class="col-md-9">
  

  <div id="app">     
    <div class="titleBox">
      <label style="color:blue; font-weight:bold">Customer Feedback</label>
        <button type="button" class="close" aria-hidden="true">&times;</button>
    </div>
    <div class="commentBox">  
        <ul class="taskDescription" style="font-weight: bold;">
            <li>{{ $product->title}}</li>
            <li>  <star-rating :star-size="20" :increment="0.5" :read-only="true" :rating="{{$product->getStarRating()}}"></star-rating></li>
        </ul>
        
    </div>
    <div class="actionBox">
        <ul class="commentList">
        @foreach($product->ProductReview as $review)
            <li>
              
                 <i class="fa fa-user" style="font-size:20px;"> <strong style="margin-left: 5px;">{{$review->username}}</strong> </i> 

       <star-rating :star-size="20" :increment="0.5" :read-only="true" :rating="{{$review->rating}}"></star-rating>

            <div class="commentText">
              <p class="">{{$review->comment}}</p> <span class="date sub-text">{{$review->created_at->diffForHumans()}}</span>
            </div>
         </li>
        @endforeach
        </ul>

    
        <form class="form-inline" method="post" action="{{ URL::to('/cart/rate',$product->id) }}">
          {{csrf_field()}}

            
            <select class="browser-default custom-select" style="height: 32px;" name="rating">
              <option selected>Rating</option>
              <option value=".5">.5</option>
              <option value="1">1</option>
              <option value="1.5">1.5</option>
              <option value="2">2</option>
              <option value="2.5">2.5</option>
              <option value="3">3</option>
              <option value="3.5">3.5</option>
              <option value="4">4</option>
              <option value="4.5">4.5</option>
              <option value="5">5</option> 
            </select>
          

             <div class="form-group">
               <input class="form-control" type="text" name="comment" placeholder="Your comments" required="" />
            </div>
            
             <div class="form-group">
               <input class="form-control" type="hidden" name="product_id" value="{{$product->id}}" />
            </div>
         
            <div class="form-group">
                <input type="submit" class="btn btn-default" value="Add review">
            </div>
              <div class="form-group">
               <input class="form-control" type="hidden" name="username" value="@php if(isset(Auth::user()->name)){
              echo  Auth::user()->name;
             } @endphp" />
            </div>

             <div class="form-group">
               <input class="form-control" type="hidden" name="title" value="{{$product->title}}" />
            </div>
         </form>

       </div>
    </div>
</div>      



<!-- End comments section -->
  
     @endsection

@section('review')
  
   <!--<script src="https://unpkg.com/vue@2.2.6/dist/vue.js" ></script>
   <script src="https://unpkg.com/vue-star-rating@1.6.0/dist/star-rating.min.js" ></script> -->
   <script src="{{asset('review/vue.js')}}"></script>
   <script src="{{asset('review/star-rating.min.js')}}"></script>

<script type="text/javascript">
  Vue.component('star-rating', VueStarRating.default)

     
        new Vue({
          el: '#app',
          methods: {

            setRating: function(rating) {
              this.rating = "You have Selected: " + rating + " stars";
            },
            showCurrentRating: function(rating) {
              this.currentRating = (rating === 0) ? this.currentSelectedRating : "Click to select " + rating + " stars"
            },
            setCurrentSelectedRating: function(rating) {
              this.currentSelectedRating = "You have Selected: " + rating + " stars";
            }
          },
          data: {
            rating: "No Rating Selected",
            currentRating: "No Rating",
            currentSelectedRating: "No Current Rating",
            boundRating: 3,
          }
        });

   </script> 
@endsection