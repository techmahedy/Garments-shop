@extends('frontend.layout.app')

@section('mainContent')

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>My Wishlist</li>
                    </ul>

                </div>

          @include('frontend.layout.customer')

                <div class="col-md-9">
                     <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                 
                    <th>Image</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
              @foreach ($order as $element)
               
            
               <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$element->title}}</td>
                    <td>{{$element->quantity}}</td>
                    <td>{{$element->price}}</td>
                  
                    <td><img src="/{{$element->image}}" width="50px;" height="50px;"></td>
                    <td>
                      @if($element->status == NULL)
                         {{'Pending'}}
                      @else
                         {{'Accepted'}}
                      @endif
                    </td>
                </tr>  
              @endforeach      
                </tbody>
              </table>
                </div>
             
@endsection  