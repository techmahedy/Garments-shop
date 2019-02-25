<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.layout.header')
  </head>


  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a  href="{{URL::to('/backend')}}" class="app-header__logo">Cats Eye</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i>({{$notify}})</a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have {{$notify}} new orders.</li>
            <div class="app-notification__content">
      
            </div>
            <li class="app-notification__footer"><a href="{{ route('order.index') }}">See all notifications.</a></li>
          </ul>
        </li>
        <!-- User Menu-->
              <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="{{ route('settings.edit',Auth::user()->id) }}"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="{{ route('profile.edit',Auth::user()->id) }}"><i class="fa fa-user fa-lg"></i> Profile</a></li>
          
            <li>

              <a href=""
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();" class="dropdown-item">
                            <i class="fa fa-user fa-lg"></i>
                  Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>

            </li>

          </ul>
        </li>
      </ul>
    </header>

    <!-- Sidebar menu-->

@include('admin.layout.sidebar')

    <main class="app-content">

      @section('main-content')




      @show

     
    </main>
   @include('admin.layout.footer')
   @section('selectBoxFooter')
   @show
   @section('ckEditor')
   @show
   @section('DataTableFooter')
   @show
   @section('DeleteAlert')
   @show
  
  </body>
</html>