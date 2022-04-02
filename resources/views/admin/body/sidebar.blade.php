@php
  $prefix = Request::route()->getPrefix();
  $route  = Route::current()->getName();
@endphp
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
      <div class="user-profile">
  			<div class="ulogo">
  				 <a href="{{ route('dashboard') }}">
  				  <!-- logo for regular state and mobile devices -->
  					 <div class="d-flex align-items-center justify-content-center">					 	
  						  <img src="{{ asset('../images/logo-dark.png') }}" alt="">
  						  <h3><b>My</b> Shop</h3>
  					 </div>
  				</a>
  			</div>
      </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
  		  <li class="{{ ($route == 'admin.dashboard') ? 'active' : '' }}">
          <a href="{{ route('admin.dashboard') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
			       <span>Dashboard</span>
          </a>
        </li>  
		
        <li class="treeview {{ ($prefix == '/brand') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-ravelry"></i>
            <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'all.brand') ? 'active' : '' }}"><a href="{{ route('all.brand') }}"><i class="ti-more"></i>All Brand</a></li>
            <li><a href="calendar.html"><i class="ti-more"></i>Calendar</a></li>
          </ul>
        </li> 
		  
        <li class="treeview {{ $prefix == '/category' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-sitemap"></i> <span>Cetegory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'all.category') ? 'active' : '' }}"><a href="{{ route('all.category') }}"><i class="ti-more"></i>All Category</a></li>
            <li class="{{ ($route == 'all.subcategory') ? 'active' : '' }}"><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>All Sub-Category</a></li>
            <li class="{{ ($route == 'all.subsubcategory') ? 'active' : '' }}"><a href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>All Sub Sub-Category</a></li>
          </ul>
        </li>
		
        <li class="treeview {{ $prefix == '/product' ? 'active' : '' }}">
          <a href="#">
            <i  class="fa fa-shopping-cart"></i>
            <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'add.product') ? 'active' : '' }}"><a href="{{ route('add.product') }}"><i class="ti-more"></i>Add Product</a></li>
            <li class="{{ ($route == 'product.view') ? 'active' : '' }}"><a href="{{ route('product.view') }}"><i class="ti-more"></i>Manage Products</a></li>
          </ul>
        </li> 
        <li class="treeview {{ $prefix == '/slider' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-picture-o" aria-hidden="true"></i>
            <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'manage.slider') ? 'active' : '' }}"><a href="{{ route('manage.slider') }}"><i class="ti-more"></i>Manage Slider</a></li>
          </ul>
        </li> 	
        <li class="treeview {{ $prefix == '/coupon' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-free-code-camp fa-5x" aria-hidden="true"></i>
            <span>Coupons</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'manage.coupon') ? 'active' : '' }}"><a href="{{ route('manage.coupon') }}"><i class="ti-more"></i>Manage Coupons</a></li>
          </ul>
        </li>	
        <li class="treeview {{ $prefix == '/shipping' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <span>Shipping Area</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'manage.division') ? 'active' : '' }}"><a href="{{ route('manage.division') }}"><i class="ti-more"></i>Ship Division</a></li>

            <li class="{{ ($route == 'manage.district') ? 'active' : '' }}"><a href="{{ route('manage.district') }}"><i class="ti-more"></i>Ship District</a></li>

            <li class="{{ ($route == 'manage.upazila') ? 'active' : '' }}"><a href="{{ route('manage.upazila') }}"><i class="ti-more"></i>Ship Upazila</a></li>
          </ul>
        </li>   
		 
        <li class="header nav-small-cap">User Interface</li>
		  
        <li class="treeview {{ $prefix == '/orders' ? 'active' : '' }}">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'pending.orders') ? 'active' : '' }}"><a href="{{ route('pending.orders') }}"><i class="ti-more"></i>Pending Orders</a></li>
          </ul>
        </li>
		
    		<li class="treeview">
          <a href="#">
            <i data-feather="credit-card"></i>
            <span>Cards</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
      			<li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
      			<li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
      			<li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
    		  </ul>
        </li>  
  		  
  		<li class="header nav-small-cap">EXTRA</li>		  
  		  
          <li class="treeview">
            <a href="#">
              <i data-feather="layers"></i>
  			<span>Multilevel</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#">Level One</a></li>
              <li class="treeview">
                <a href="#">Level One
                  <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#">Level Two</a></li>
                  <li class="treeview">
                    <a href="#">Level Two
                      <span class="pull-right-container">
  					  <i class="fa fa-angle-right pull-right"></i>
  					</span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="#">Level Three</a></li>
                      <li><a href="#">Level Three</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="#">Level One</a></li>
            </ul>
          </li>  
  		  
  		<li>
            <a href="auth_login.html">
              <i data-feather="lock"></i>
  			<span>Log Out</span>
            </a>
          </li> 
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>