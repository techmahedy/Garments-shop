@extends('admin.layout.app')

@section('DataTableFooter')
 <script type="text/javascript" src="{{asset('admin/js/plugins/jquery.dataTables.min.js')}}"></script>
 <script type="text/javascript" src="{{asset('admin/js/plugins/dataTables.bootstrap.min.js')}}"></script>
 <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endsection

@section('main-content')
  

         <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Customer Address</h1>
          <p>Table to display analytical data effectively</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">customer list</li>
          <li class="breadcrumb-item active"><a href="#">customer data table</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Thana</th>
                    <th>Zip</th>
                    <th>Street</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Phone</th>
                    <th>Back</th>
                  </tr>
                </thead>
                <tbody>

               <tr>
                    <td>1</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->thana}}</td>
                    <td>{{$data->zip}}</td>
                    <td>{{$data->street}}</td>
                    <td>{{$data->state}}</td>
                    <td>{{$data->country}}</td>
                    <td>{{$data->telephone}}</td>
                    <td><a href="{{ route('order.index') }}" class="btn btn-info">Back</a></td>
                </tr>  
         
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

@endsection
