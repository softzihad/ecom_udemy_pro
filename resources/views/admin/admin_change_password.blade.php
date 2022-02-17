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
					<form action="{{ route('admin.change.password.update') }}" method="post">
						@csrf

					  	<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<h5>Current Password<span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="password" id="current_password" name="oldpassword" class="form-control" required > 
									</div>
								</div>
								<div class="form-group">
									<h5>New Password<span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="password" id="password" name="password" class="form-control" required > 
									</div>
								</div>
								<div class="form-group">
									<h5>Confirm Password<span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="password" id="password_confirm" name="password_confirm" class="form-control" required > 
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

@endsection
