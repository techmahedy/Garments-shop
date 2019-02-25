  
  <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">

                            @foreach ($categories as $element)
                                <li>
                                    <a href="{{ route('category',$element->slug) }}">{{ $element->category_name }}<span class="badge pull-right"></span></a>
                                    <ul>
                                        @foreach ($element->CategoryRelateToSubcategory as $item)
                                         <li><a href="{{ route('sub_category',$item->slug) }}">{{ $item->subcategory_name }}</a> </li>
                                        @endforeach 
                                    </ul>
                                </li>
                             @endforeach     
                          
                            </ul>

                        </div>
                    </div>

                     <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Brands</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">

                            @foreach ($brands as $element)
                                <li>
                                    <a href="{{ route('brand',$element->slug) }}">{{ $element->brand_name }}<span class="badge pull-right"></span></a>
                                </li>
                             @endforeach     
                          
                            </ul>

                        </div>
                    </div>

                    <!-- *** MENUS AND FILTERS END *** -->
                </div>