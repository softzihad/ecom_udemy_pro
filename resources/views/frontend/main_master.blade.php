<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<link rel="icon" href="{{ asset('frontend-template/assets/images/star-big-on.png') }}">
<title>@yield('title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('frontend-template/assets/css/bootstrap.min.css') }}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('frontend-template/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('frontend-template/assets/css/blue.css') }}">
<link rel="stylesheet" href="{{ asset('frontend-template/assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('frontend-template/assets/css/owl.transitions.css') }}">
<link rel="stylesheet" href="{{ asset('frontend-template/assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend-template/assets/css/rateit.css') }}">
<link rel="stylesheet" href="{{ asset('frontend-template/assets/css/bootstrap-select.min.css') }}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('frontend-template/assets/css/font-awesome.css') }}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('backend-admin/css/toastr.min.css') }}">

</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{ asset('frontend-template/assets/js/jquery-1.11.1.min.js') }}"></script> 
<script src="{{ asset('frontend-template/assets/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('frontend-template/assets/js/bootstrap-hover-dropdown.min.js') }}"></script> 
<script src="{{ asset('frontend-template/assets/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('frontend-template/assets/js/echo.min.js') }}"></script> 
<script src="{{ asset('frontend-template/assets/js/jquery.easing-1.3.min.js') }}"></script> 
<script src="{{ asset('frontend-template/assets/js/bootstrap-slider.min.js') }}"></script> 
<script src="{{ asset('frontend-template/assets/js/jquery.rateit.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('frontend-template/assets/js/lightbox.min.js') }}"></script> 
<script src="{{ asset('frontend-template/assets/js/bootstrap-select.min.js') }}"></script> 
<script src="{{ asset('frontend-template/assets/js/wow.min.js') }}"></script> 
<script src="{{ asset('frontend-template/assets/js/scripts.js') }}"></script>

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

    <!-- Add to Cart Product Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content modal-lg">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-3">
                <img src=" " class="card-img-top" alt="..." style="height: 200px; width: 200px;" id="pimage">
              </div><!-- // end col md -->

              <div class="col-md-5">
                <ul class="list-group">
                  <li class="list-group-item">
                    Product Price: <strong class="text-danger">$<span id="pprice"></span></strong>
                    <del id="oldprice">$</del>
                  </li>
                  <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
                  <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
                  <li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
                  <li class="list-group-item">
                    Stock: <span class="badge badge-pill badge-success" id="aviable" style="background:       green; color: white;"></span> 
                            <span class="badge badge-pill badge-danger" id="stockout" style="background: red; color: white;"></span> 
                  </li>
                </ul>
              </div><!-- // end col md -->

              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Choose Color</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="color">

                  </select>
                </div><!-- // end form group -->

                <div class="form-group" id="sizeArea">
                  <label for="exampleFormControlSelect1">Choose Size</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="size">

                  </select>
                </div><!-- // end form group -->

                <div class="form-group">
                  <label for="exampleFormControlInput1">Quantity</label>
                  <input type="number" class="form-control" id="exampleFormControlInput1" value="1" min="1" >
                </div> <!-- // end form group -->

                <button type="submit" class="btn btn-primary mb-2">Add to Cart</button>

              </div><!-- // end col md -->
            </div> <!-- // end row -->
          </div> <!-- // end modal Body -->
        </div>
      </div>
    </div><!-- End Add to Cart Product Modal -->
  

  <script type="text/javascript">
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
    // Start Product View with Modal 
    function productView(id){
        // alert(id)
        $.ajax({
            type: 'GET',
            url: '/product/view/modal/'+id,
            dataType:'json',
            success:function(data){
              //console.log(data)
              $('#pname').text(data.product.product_name_en);
              $('#price').text(data.product.selling_price);
              $('#pcode').text(data.product.product_code);
              $('#pcategory').text(data.product.category.category_name_en);
              $('#pbrand').text(data.product.brand.brand_name_en);
              $('#pimage').attr('src','/'+data.product.product_thambnail);

              // Product Price 
              if (data.product.discount_price == null) {
                  $('#pprice').text('');
                  $('#oldprice').text('');
                  $('#pprice').text(data.product.selling_price);
              }else{
                  $('#pprice').text(data.product.discount_price);
                  $('#oldprice').text(data.product.selling_price);
              } // end prodcut price 

              // Start Stock opiton
              if (data.product.product_qty > 0) {
                  $('#aviable').text('');
                  $('#stockout').text('');
                  $('#aviable').text('aviable');
              }else{
                  $('#aviable').text('');
                  $('#stockout').text('');
                  $('#stockout').text('stockout');
              } // end Stock Option 

              // Color
              $('select[name="color"]').empty();        
              $.each(data.color,function(key,value){
                  $('select[name="color"]').append('<option value=" '+value+' ">'+value+' </option>')
              }) // end color

              // Size
              $('select[name="size"]').empty();        
              $.each(data.size,function(key,value){
                  $('select[name="size"]').append('<option value=" '+value+' ">'+value+' </option>')
                  if (data.size == "") {
                      $('#sizeArea').hide();
                  }else{
                      $('#sizeArea').show();
                  }
              }) // end size
              
            }
        })
     
    }
  </script>
</body>
</html>