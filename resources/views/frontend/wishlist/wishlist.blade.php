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
                    <th>Created Time</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
              @foreach ($likeposts as $element)
               
            
               <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$element->title}}</td>
                    <td>{{$element->created_at->diffForHumans()}}</td>
                    <td><img src="/{{$element->image}}" width="50px;" height="50px;"></td>

                   <td><a href="{{ route('product',$element->slug) }}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>  
              @endforeach      
                </tbody>
              </table>
                </div>
             
@endsection  