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

    <!-- Jquery CDN Link-->  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
  	<!-- Vendors Style-->
  	<link rel="stylesheet" href="{{ asset('backend-admin/css/vendors_css.css') }}">
  	  
  	<!-- Style-->  
  	<link rel="stylesheet" href="{{ asset('backend-admin/css/style.css') }}">
  	<link rel="stylesheet" href="{{ asset('backend-admin/css/skin_color.css') }}">


    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('backend-admin/css/toastr.min.css') }}">

    <!-- dataTables cdn link -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
     
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

    <!-- Template Data Table JS -->   
    <!-- <script src="{{ asset('/assets/vendor_components/datatable/datatables.js') }}"></script>
    <script src="{{ asset('backend-admin/js/pages/data-table.js') }}"></script> -->
	
	<!-- Sunny Admin App -->
	<script src="{{ asset('backend-admin/js/template.js') }}"></script>
	<script src="{{ asset('backend-admin/js/pages/dashboard.js') }}"></script>

    <!-- dataTables cdn link -->
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

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

  <!--  Sweet Alert CDN Link -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
      $(function(){
        $(document).on('click', '#delete', function(e){
            e.preventDefault();
            var link = $(this).attr("href");

            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              }
            })
            
        });
      });
  </script>
	

    <!--**********************************
        Input Image File Scripts
    ***********************************-->

    <script>
        $(document).ready(function(){
            $('#image').change(function(event){
                
                var reader = new FileReader();
                
                reader.onload = function(event){
                    $('#showImage').attr('src',event.target.result);
                }
                
                reader.readAsDataURL(event.target.files['0']);
            });
        });
    </script>
</body>
</html>
