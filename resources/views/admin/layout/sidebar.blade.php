    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">Mahedi Hasan</p>
          <p class="app-sidebar__user-designation">Fullstack Developer</p>
        </div>
      </div>

      <ul class="app-menu">
        <li><a class="app-menu__item active" href="{{URL::to('/backend')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Card</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('card.create') }}"><i class="icon fa fa-circle-o"></i>Create Card</a></li>
            <li><a class="treeview-item" href="{{ route('card.index') }}" rel="noopener"><i class="icon fa fa-circle-o"></i>Card List</a></li>
          </ul>
        </li>


        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Product</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('product.create') }}"><i class="icon fa fa-circle-o"></i>Add Product</a></li>
            <li><a class="treeview-item" href="{{ route('product.index') }}" rel="noopener"><i class="icon fa fa-circle-o"></i>All Product</a></li>
          </ul>
        </li>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Category</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('category.create') }}"><i class="icon fa fa-circle-o"></i>Add Category</a></li>
            <li><a class="treeview-item" href="{{ route('category.index') }}"><i class="icon fa fa-circle-o"></i>All Category</a></li>
          </ul>
        </li>

          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Sub Category</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('subcategory.create') }}"><i class="icon fa fa-circle-o"></i>Add SubCategory</a></li>
            <li><a class="treeview-item" href="{{ route('subcategory.index') }}"><i class="icon fa fa-circle-o"></i>All SubCategory</a></li>
          </ul>
        </li>

         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Brand</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('brand.create') }}"><i class="icon fa fa-circle-o"></i>Add Brand</a></li>
            <li><a class="treeview-item" href="{{ route('brand.index') }}"><i class="icon fa fa-circle-o"></i>All Brand</a></li>
          </ul>
        </li>
        
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Product Review</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{ route('approve.index') }}"><i class="icon fa fa-circle-o"></i>Check Review</a></li> 
            </ul>
        </li>
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Manage Order</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('order.index') }}"><i class="icon fa fa-circle-o"></i>Order List</a></li>
          </ul>
        </li>

      </ul>
    </aside>