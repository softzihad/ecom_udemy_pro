@extends('admin.admin_master')
@section('content')
<section class="content">
	<!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Admin Profile Edit</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
						@csrf

					  	<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<h5>Admin User Name<span class="text-danger">*</span></h5>
											<div class="controls">
												<input type="text" name="name" class="form-control" required data-validation-required-message="This field is required" value="{{ $editData->name }}"> 
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<h5>Email Field <span class="text-danger">*</span></h5>
											<div class="controls">
												<input type="email" name="email" class="form-control" required data-validation-required-message="This field is required" value="{{ $editData->email }}">
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<h5>File Input Field</h5>
											<div class="controls">
												<input type="file" name="profile_photo_path" id="image" class="form-control"> 
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<img id="showImage" class="rounded w-25 h-100" src="
										  	@if(!empty($editData->profile_photo_path))
										  		{{ asset($editData->profile_photo_path) }}
										  	@else
										  		{{ asset('backend-admin/images/no_image.jpg') }}	
										  	@endif()
										  " alt="User Avatar">
									</div>
								</div>
								

								<div class="text-xs-right">
									<button type="submit" class="btn btn-rounded btn-primary">Update</button>
								</div>
							</div>
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


<!--**********************************
       Show Image Scripts
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
@endsection
