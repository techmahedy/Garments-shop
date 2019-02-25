@extends('admin.layout.app')
@section('rating-page-data-table-css')
<link rel="stylesheet" type="text/css" href="cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection

@section('main-content')
  

    <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> All Review List</h1>
          <p>Table to display analytical data effectively</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Review</li>
          <li class="breadcrumb-item active"><a href="#">Review Table</a></li>
        </ul>
      </div>
      @include('admin.errors.success')
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="app">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Product Title</th>
                    <th>Review</th>
                    <th>Ratting</th>
                    <th>Username</th>
                    <th>Created</th>
                    <th>Approve</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($review as $item)
                     
                  <tr>
                    <td>{{ $loop->index + 1}}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->comment }}</td>
                    <td><star-rating :star-size="20" :increment="0.5" :read-only="true" :rating="{{$item->rating}}"></star-rating></td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->created_at->diffForHumans() }}</td>
                    <td>
                        @if($item->status == 1)
                          <i class="fa fa-check-square" aria-hidden="true"></i>
                        @else
                          <i class="fa fa-times" aria-hidden="true"></i>
                        @endif    
                    </td>
                    <td><a href="{{ route('approve.edit',$item->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="" onclick="if(confirm('Are you sure to delete this?'))event.preventDefault(); document.getElementById('delete-{{$item->id}}').submit();"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                  <form id="delete-{{$item->id}}" method="post" action="{{route('approve.destroy',$item->id)}}" style="display: none;">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                  </form>
              
                </td>
                  </tr> 
                  
                   @endforeach       
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

@endsection

@section('rating')
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