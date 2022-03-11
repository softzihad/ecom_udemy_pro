@extends('admin.admin_master')
@section('content')
<!-- Main content -->
<section class="content">

 <!-- Basic Forms -->
  <div class="box">
	<div class="box-header with-border">
	  <h4 class="box-title">Add Product </h4>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
	  <div class="row">
		<div class="col">
			<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
				@csrf
				<!-- 1st Row Start -->
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<h5>Brand Select <span class="text-danger">*</span></h5>
							<div class="controls">
								<select name="brand_id" class="form-control" required >
									<option value="" selected="" disabled="">Select Brand</option>
									@foreach($brands as $brand)
										<option value="{{ $brand->id }}">{{ $brand->brand_name_en }}</option>
									@endforeach
								</select>
								@error('brand_id') 
							 <span class="text-danger">{{ $message }}</span>
							 @enderror 
							 </div>
						</div>
					</div>	
					<div class="col-md-4">
						<div class="form-group">
							<h5>Category Select <span class="text-danger">*</span></h5>
							<div class="controls">
								<select name="category_id" class="form-control" required >
									<option value="" selected="" disabled="">Select Category</option>
									@foreach($categories as $category)
							 			<option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
									@endforeach
								</select>
								@error('category_id') 
							 <span class="text-danger">{{ $message }}</span>
							 @enderror 
							 </div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<h5>Sub-Category Select <span class="text-danger">*</span></h5>
							<div class="controls">
								<select name="subcategory_id" class="form-control" required >
									<option value="" selected="" disabled="">Select Sub-Category</option>
									
								</select>
								@error('subcategory_id') 
							 <span class="text-danger">{{ $message }}</span>
							 @enderror 
							 </div>
						</div>
					</div>
				</div><!-- End 1st Row Start -->
				<!-- 2nd Row Start -->
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<h5>Sub Sub-Category Select <span class="text-danger">*</span></h5>
							<div class="controls">
								<select name="subsubcategory_id" class="form-control" required >
									<option value="" selected="" disabled="">Select Sub Sub-Category</option>
									
								</select>
							@error('subsubcategory_id') 
							 <span class="text-danger">{{ $message }}</span>
							@enderror 
							</div>
						</div>
					</div>	
					<div class="col-md-4">
						<div class="form-group">
							<h5>Product_Name <span class="text-warning">(En)</span><span class="text-danger">*</span></h5>
							<div class="controls">
								<input type="text" name="product_name_en" class="form-control" required> 
							</div>
							@error('product_name_en') 
							 <span class="text-danger">{{ $message }}</span>
							@enderror 
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<h5>Product_Name <span class="text-warning">(Bng)</span><span class="text-danger">*</span></h5>
							<div class="controls">
								<input type="text" name="product_name_bng" class="form-control" required> 
							</div>
							@error('product_name_bng') 
							 <span class="text-danger">{{ $message }}</span>
							@enderror 
						</div>
					</div>
				</div><!-- End 2nd Row Start -->
				<!-- 3rd Row Sart -->
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<h5>Product Code<span class="text-danger">*</span></h5>
							<div class="controls">
								<input type="text" name="product_code" class="form-control" required> 
							</div>
							@error('product_code') 
							 <span class="text-danger">{{ $message }}</span>
							@enderror 
						</div>
					</div>	
					<div class="col-md-4">
						<div class="form-group">
							<h5>Product Quantity<span class="text-danger">*</span></h5>
							<div class="controls">
								<input type="text" name="product_qty" class="form-control" required> 
							</div>
							@error('product_qty') 
							 <span class="text-danger">{{ $message }}</span>
							@enderror 
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<h5>Product Tags <span class="text-warning">(En)</span><span class="text-danger">*</span></h5>
							<div class="controls">
								 <input type="text" name="product_tags_en" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput">
							    @error('product_tags_en') 
								 <span class="text-danger">{{ $message }}</span>
								 @enderror
					 		</div>
						</div>
					</div>
				</div><!-- End 3rd Row Start -->
				<!-- 4th Row Sart -->
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<h5>Product Tags <span class="text-warning">(Bng)</span><span class="text-danger">*</span></h5>
							<div class="controls">
								 <input type="text" name="product_tags_bng" class="form-control" value="ট্যাগ-1,ট্যাগ-2,ট্যাগ-3" data-role="tagsinput">
							     @error('product_tags_bng') 
								 <span class="text-danger">{{ $message }}</span>
								 @enderror
					 		 </div>
						</div>
					</div>	
					<div class="col-md-4">
						<div class="form-group">
							<h5>Product Size <span class="text-warning">(En)</span><span class="text-danger">*</span></h5>
							<div class="controls">
								 <input type="text" name="product_size_en" class="form-control" value="Small,Medium,Large" data-role="tagsinput">
							     @error('product_size_en') 
								 <span class="text-danger">{{ $message }}</span>
								 @enderror
					 		 </div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<h5>Product Size <span class="text-warning">(Bng)</span><span class="text-danger">*</span></h5>
							<div class="controls">
								 <input type="text" name="product_size_bng" class="form-control" value="Small,Medium,Large" data-role="tagsinput">
							     @error('product_size_bng') 
								 <span class="text-danger">{{ $message }}</span>
								 @enderror
					 		 </div>
						</div>
					</div>
				</div><!-- End 4th Row Start -->
				<!-- 5th Row Sart -->
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<h5>Product Color <span class="text-warning">(En)</span><span class="text-danger">*</span></h5>
							<div class="controls">
								 <input type="text" name="product_color_en" class="form-control" value="red,green,blue" data-role="tagsinput">
							     @error('product_color_en') 
								 <span class="text-danger">{{ $message }}</span>
								 @enderror
					 		 </div>
						</div>
					</div>	
					<div class="col-md-4">
						<div class="form-group">
							<h5>Product Color <span class="text-warning">(Bng)</span><span class="text-danger">*</span></h5>
							<div class="controls">
								 <input type="text" name="product_color_bng" class="form-control" value="red,green,blue" data-role="tagsinput">
							     @error('product_color_bng') 
								 <span class="text-danger">{{ $message }}</span>
								 @enderror
					 		 </div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<h5>Product Selling Price<span class="text-danger">*</span></h5>
							<div class="controls">
								<input type="text" name="selling_price" class="form-control" required> 
							</div>
							@error('selling_price') 
							 <span class="text-danger">{{ $message }}</span>
							@enderror 
						</div>
					</div>
				</div><!-- End 5th Row Start -->
				<!-- 6th Row Sart -->
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<h5>Product Discount Price</h5>
							<div class="controls">
								<input type="text" name="discount_price" class="form-control" > 
							</div>
							@error('discount_price') 
							 <span class="text-danger">{{ $message }}</span>
							@enderror 
						</div>
					</div>	
					<div class="col-md-4">
						<div class="form-group">
							<h5>Main Thambnail <span class="text-danger">*</span></h5>
							<div class="controls">
								 <input type="file" name="product_thambnail" class="form-control" required onChange="mainThamUrl(this)">
							   @error('product_thambnail') 
								 <span class="text-danger">{{ $message }}</span>
								 @enderror
								 <img src="" id="mainThmb">
					 		 </div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<h5>Multiple Image <span class="text-danger">*</span></h5>
							<div class="controls">
								 <input type="file" name="multi_img[]" class="form-control" required multiple="" id="multiImg">
							   @error('multi_img') 
								 <span class="text-danger">{{ $message }}</span>
								 @enderror
								 <div class="row" id="preview_img"></div>
					 		 </div>
						</div>
					</div>
				</div><!-- End 6th Row Start -->
				<!-- 7th Row  -->
				<div class="row">
					<div class="col-md-6">
					    <div class="form-group">
							<h5>Short Description English <span class="text-danger">*</span></h5>
							<div class="controls">
								<textarea name="short_descp_en" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>     
					 		</div>
						</div>
					</div> <!-- end col md 6 -->

					<div class="col-md-6">
					    <div class="form-group">
							<h5>Short Description Bengali <span class="text-danger">*</span></h5>
							<div class="controls">
								<textarea name="short_descp_bng" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>     
					 		</div>
						</div>
					</div> <!-- end col md 6 -->		 
				</div> <!-- end 7th Row  -->
				<!-- 8th Row  -->
				<div class="row">
					<div class="col-md-6">
					    <div class="form-group">
							<h5>Long Description English <span class="text-danger">*</span></h5>
							<div class="controls">
								<textarea id="editor1" name="long_descp_en" rows="10" cols="80">
									Long Description English
								</textarea>  
					 		 </div>
					 	</div>
					</div> <!-- end col md 6 -->

					<div class="col-md-6">
					    <div class="form-group">
							<h5>Long Description Bengali <span class="text-danger">*</span></h5>
							<div class="controls">
								<textarea id="editor2" name="long_descp_bng" rows="10" cols="80">
									Long Description Bengali
								</textarea>  
					 		 </div>
					 	</div>
					</div> <!-- end col md 6 -->		 
				</div> <!-- end 8th Row  -->
				<hr>
				<!-- 9th Row  -->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<div class="controls">
								<fieldset>
									<input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
									<label for="checkbox_2">Hot Deals</label>
								</fieldset>
								<fieldset>
									<input type="checkbox" id="checkbox_3" name="featured" value="1">
									<label for="checkbox_3">Featured</label>
								</fieldset>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<div class="controls">
								<fieldset>
									<input type="checkbox" id="checkbox_4" name="special_offer" value="1">
									<label for="checkbox_4">Special Offer</label>
								</fieldset>
								<fieldset>
									<input type="checkbox" id="checkbox_5" name="special_deals" value="1">
									<label for="checkbox_5">Special Deals</label>
								</fieldset>
							</div>
						</div>
					</div>
				</div><!-- End 9th Row  -->
				<div class="text-xs-right">
					<input type="submit" class="btn btn-rounded btn-info" value="Add New">
				</div>
			</form>

		</div>
		<!-- /.col -->
	  </div>
	  <!-- /.row -->
	</div>
	<!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->

<!--*******************************************
        Auto Select Sub-Category Script
********************************************-->
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
          var category_id = $(this).val();
          if(category_id) {
              $.ajax({
                  url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                  	$('select[name="subsubcategory_id"]').html('');
                     var d =$('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                        });
                  },
              });
            } else {
              alert('danger');
            }
        });

      /*Start 2nd Step Dropdown Clickable Select Field*/
      $('select[name="subcategory_id"]').on('change', function(){
          var subcategory_id = $(this).val();
          if(subcategory_id) {
              $.ajax({
                  url: "{{  url('/category/subcategory/subsubcategory/ajax') }}/"+subcategory_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });
      /* End 2nd Step Dropdown Clickable Select Field*/
  });
</script>

<!--*******************************************
        Single Image File Scripts
********************************************-->
<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>

<!--*******************************************
        Multiple Image File Scripts
********************************************-->
<script type="text/javascript">
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>
@endsection