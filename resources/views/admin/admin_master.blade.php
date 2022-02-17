<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend-admin/images/favicon.ico') }}">

    <title>My Shop - Dashboard</title>
    
  	<!-- Vendors Style-->
  	<link rel="stylesheet" href="{{ asset('backend-admin/css/vendors_css.css') }}">
  	  
  	<!-- Style-->  
  	<link rel="stylesheet" href="{{ asset('backend-admin/css/style.css') }}">
  	<link rel="stylesheet" href="{{ asset('backend-admin/css/skin_color.css') }}">

    <!-- Jquery CDN Link-->  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('backend-admin/css/toastr.min.css') }}">
     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

  <!-- Header Content gose here -->
  @include('admin.body.header')
  
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.body.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
  		<!-- Main content -->
  		@yield('content')
  		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer Content gose here -->
  @include('admin.body.footer')
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
	 
	<!-- Vendor JS -->
	<script src="{{ asset('backend-admin/js/vendors.min.js') }}"></script>
  <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>	
	<script src="{{ asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
	
	<!-- Sunny Admin App -->
	<script src="{{ asset('backend-admin/js/template.js') }}"></script>
	<script src="{{ asset('backend-admin/js/pages/dashboard.js') }}"></script>

  <!-- Latest toastir JavaScript -->
  <script src="{{ asset('backend-admin/js/toastr.min.js') }}"></script>

	<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif 
    @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
    @endif 
    @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
    @endif
    @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
    @endif 
  </script>
	
</body>
</html>
