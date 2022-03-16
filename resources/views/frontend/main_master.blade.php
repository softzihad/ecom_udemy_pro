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
            <button type="button" class="close" data-dismiss="modal" id="closeModel">&times;</button>
            <h5 class="modal-title"><strong><span id="pname"></span></strong></h5>
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
                  <label for="color">Choose Color</label>
                  <select class="form-control" id="color" name="color">

                  </select>
                </div><!-- // end form group -->

                <div class="form-group" id="sizeArea">
                  <label for="size">Choose Size</label>
                  <select class="form-control" id="size" name="size">

                  </select>
                </div><!-- // end form group -->

                <div class="form-group">
                  <label for="qty">Quantity</label>
                  <input type="number" class="form-control" id="qty" value="1" min="1">
                </div> <!-- // end form group -->

                <input type="hidden" id="product_id">
                <button type="submit" class="btn btn-primary mb-2" onclick="addToCart()">Add to Cart</button>

              </div><!-- // end col md -->
            </div> <!-- // end row -->
          </div> <!-- // end modal Body -->
        </div>
      </div>
    </div><!-- End Add to Cart Product Modal -->
  
  <!--  Sweet Alert CDN Link -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script type="text/javascript">
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })

    /*===========> Start Product View with Modal <===========*/
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

              $('#product_id').val(id);
              $('#qty').val(1);

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
    // End Product View with Modal


    /*==========> Start Add To Cart Product <=========*/ 
    function addToCart(){
        var product_name = $('#pname').text();
        var id = $('#product_id').val();
        var color = $('#color option:selected').text();
        var size = $('#size option:selected').text();
        var quantity = $('#qty').val();

        $.ajax({
            type: "POST",
            dataType: 'json',
            data:{
                color:color, size:size, quantity:quantity, product_name:product_name
            },
            url: "/cart/data/store/"+id,
            success:function(data){
                
                miniCart()
                $('#closeModel').click();
                //console.log(data)

                // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }
                // End Message 
            }
        })
    }
  </script>

  <!-- ==========> Start Mini Cart <========= -->
  <script type="text/javascript">
    
     function miniCart(){
        $.ajax({
            type: 'GET',
            url: '/product/mini/cart',
            dataType:'json',
            success:function(response){
                //console.log(response)
                
                $('span[id="cartSubTotal"]').text(response.cartTotal);
                $('#cartQty').text(response.cartQty);
                var miniCart = ""

                $.each(response.carts, function(key,value){
                  var itemTotalPrice = value.price*value.quantity
                    miniCart += `<div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-3">
                      <div class="image"> <a href="detail.html"><img src="/${value.attributes.image}" alt="" style="height: 60px; width: 48px;"></a> </div>
                    </div>
                    <div class="col-xs-8">
                      <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                      <div class="price">${value.price} x ${value.quantity}</div>
                      <div class="price"><span class="text">Total : </span><span class="sign">&#2547; </span>${itemTotalPrice}</div>
                    </div>
                    <div class="col-xs-1 action"> 
                      <button type="submit" id="${value.id}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button> 
                    </div>
                  </div>
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>`
                });
                
                $('#miniCart').html(miniCart)
            }
        })
     }

    miniCart();

    /*==========> mini cart remove Start <=========*/
    function miniCartRemove(rowId){
        $.ajax({
            type: 'GET',
            url: '/minicart/product-remove/'+rowId,
            dataType:'json',
            success:function(data){
              miniCart();

              // Start Message 
              const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                  })
              if ($.isEmptyObject(data.error)) {
                  Toast.fire({
                      type: 'success',
                      title: data.success
                  })
              }else{
                  Toast.fire({
                      type: 'error',
                      title: data.error
                  })
              }
              // End Message 

            }
        });
    }
    //  end mini cart remove
  </script>


  <!-- ==========> Start Add Wishlist Page <========= -->
  <script type="text/javascript">
    function addToWishList(product_id){
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "/add-to-wishlist/"+product_id,

            success:function(data){

              // Start Message 
              const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                  })
              if ($.isEmptyObject(data.error)) {
                  Toast.fire({
                      type: 'success',
                      icon: 'success',
                      title: data.success
                  })
              }else{
                  Toast.fire({
                      type: 'error',
                      icon: 'error',
                      title: data.error
                  })
              }
              // End Message

            }
        })
    }// End Add Wishlist Page
  </script>

  <!-- ==========> Load Wish List Data <========= -->
  <script type="text/javascript">
    
    function wishlist(){
        $.ajax({
            type: 'GET',
            url: '/user/get-wishlist-product',
            dataType:'json',
            success:function(response){
                //console.log(response)
                var rows = ""

                $.each(response, function(key,value){
                  var itemTotalPrice = value.price*value.quantity
                    rows += `<tr>
                  <td class="col-md-2"><img src="/${value.product.product_thambnail}"></td>
                  <td class="col-md-7">
                    <div class="product-name"><a href="#">${value.product.product_name_en}</a></div>
                    <div class="price">
                    ${value.product.discount_price == null

                        ? `${value.product.selling_price}`
                        :
                        `${value.product.discount_price} <span>${value.product.selling_price}</span>`
                    }
                        
                    </div>
                  </td>
                  <td class="col-md-2">
                  <button class="btn btn-primary icon" type="button" title="Add Cart"  data-toggle="modal" data-target="#myModal" id="${value.product_id}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> Add to cart </button>
                  </td>
                  <td class="col-md-1 close-btn">
                    <button type="submit" onclick="wishlistRemove(${value.id})" class=""><i class="fa fa-times"></i></button>
                  </td>
                </tr>`
                });
                
                $('#wishlist').html(rows)
            }
        })
    }

    wishlist();

    /*==========> Wish List remove Start <=========*/
    function wishlistRemove(id){
        $.ajax({
            type: 'GET',
            url: '/user/wishlist-remove/'+id,
            dataType:'json',
            success:function(data){
              wishlist();

              // Start Message 
              const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                  })
              if ($.isEmptyObject(data.error)) {
                  Toast.fire({
                      type: 'success',
                      title: data.success
                  })
              }else{
                  Toast.fire({
                      type: 'error',
                      title: data.error
                  })
              }
              // End Message 

            }
        });
    }
    //  end Wish List remove
  </script>

  <!-- ==========> Load MyCart Data <========= -->
  <script type="text/javascript">
    
     function cart(){
        $.ajax({
            type: 'GET',
            url: '/get-cart-product',
            dataType:'json',
            success:function(response){
                //console.log(response)
                var rows = ""

                $.each(response.carts, function(key,value){
                  var itemTotalPrice = value.price*value.quantity

                  rows += `<tr>
                  <td class="col-md-2">
                    <img src="/${value.attributes.image}" style="width:60px; height:60px;">
                  </td>

                  <td class="col-md-2">
                    <div class="product-name"><a href="#">${value.name}</a></div>
                    <div class="price">&#2547; ${value.price}</div>
                  </td>

                  <td class="col-md-2">
                    <strong>${value.attributes.color} </strong> 
                  </td>

                  <td class="col-md-2">
                    ${value.attributes.size == null
                      ? `<span> .... </span>`
                      :
                    `<strong>${value.attributes.size} </strong>` 
                    }           
                  </td>

                  <td class="col-md-2">
                    <button type="submit" class="btn btn-danger btn-sm" onclick="cartDecrement(${value.id})" >-</button>     
                    <input type="text" value="${value.quantity}" min="1" max="100" disabled="" style="width:25px;" >      
                    <button type="submit" class="btn btn-success btn-sm" id="${value.id}" onclick="cartIncrement(this.id)" >+</button>  
                  </td>

                  <td class="col-md-2">
                    <strong>&#2547; ${itemTotalPrice}</strong>
                  </td>

                  <td class="col-md-1 close-btn">
                    <button type="submit" onclick="cartRemove(${value.id})" class=""><i class="fa fa-times"></i></button>
                  </td>
                </tr>`
                });
                
                $('#cartPage').html(rows)
            }
        })
     }

    cart();

    /*==========> Cart remove Start <=========*/
    function cartRemove(id){
        $.ajax({
            type: 'GET',
            url: '/cart-remove/'+id,
            dataType:'json',
            success:function(data){
              cart();
              miniCart();

              // Start Message 
              const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                  })
              if ($.isEmptyObject(data.error)) {
                  Toast.fire({
                      type: 'success',
                      title: data.success
                  })
              } // End Message 

            }
        });
    }
    //  end Cart remove
  </script>

  <!-- ==========> CART Product INCREMENT && DECREMENT <========= -->
  <script type="text/javascript">

    function cartIncrement(id){
        $.ajax({
            type: 'GET',
            url: '/cart-increment/'+id,
            dataType:'json',
            success:function(data){
              cart();
              miniCart();

              // Start Message 
              const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                  })

              if ($.isEmptyObject(data.error)) {
                  Toast.fire({
                      type: 'success',
                      title: data.success
                  })
              } // End Message 

            }
        });
    }
    //  end Cart Increment

    function cartDecrement(id){
        $.ajax({
            type: 'GET',
            url: '/cart-decrement/'+id,
            dataType:'json',
            success:function(data){
              cart();
              miniCart();

              // Start Message 
              const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                  })

              if ($.isEmptyObject(data.error)) {
                  Toast.fire({
                      type: 'success',
                      title: data.success
                  })
              } // End Message 

            }
        });
    }
    //  end Cart Decrement
  </script>

</body>
</html>