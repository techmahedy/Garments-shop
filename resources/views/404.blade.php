@extends('frontend.layout.app')
    <!-- *** NAVBAR END *** -->
          
     @section('mainContent')
       
   
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="/">Home</a>
                        </li>
                        <li>Page not found</li>
                    </ul>

                </div>

        @include('frontend.layout.sidebar');      

                <div class="col-md-9">

      

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="/">Home</a>
                        </li>
                        <li>Page not found</li>
                    </ul>


                    <div class="row" id="error-page">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="box">

                                <p class="text-center">
                                    <img src="{{asset('frontend/img/logo.png')}}" alt="Obaju template">
                                </p>

                                <h3>We are sorry - this page is not here anymore</h3>
                                <h4 class="text-muted">Error 404 - Page not found</h4>

                                <p class="text-center">To continue please use the <strong>Search form</strong> or <strong>Menu</strong> above.</p>

                                <p class="buttons"><a href="/" class="btn btn-primary"><i class="fa fa-home"></i> Go to Homepage</a>
                                </p>
                            </div>
                        </div>
                    </div>


                </div>
        

       



     @endsection
