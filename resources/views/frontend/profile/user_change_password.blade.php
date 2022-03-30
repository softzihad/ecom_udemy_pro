@extends('frontend.main_master')
@section('content')

@section('title')
Change Password
@endsection

<div class="body-contet">
	<div class="container">
		<div class="row">
			
			@include('frontend.common.user_sidebar')

			<div class="col-md-2"></div>
			<div class="col-md-6">
				<div class="card">
					<h3 class="text-center text-danger">Change Password</h3>

					<div class="card-body" style="margin-top: 20px;">
						<form method="post" action="{{ route('user.update.password') }}" >
							@csrf
							<div class="form-group">
							    <label for="current_password">Current Password</label>
							    <input type="password" class="form-control" id="current_password" name="current_password">
							</div>
							<div class="form-group">
							    <label for="password">New Password</label>
							    <input type="password" class="form-control" id="password" name="password">
							</div>
							<div class="form-group">
							    <label for="password_confirmation">Confirm Password</label>
							    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
							</div>
							

							<button type="submit" class="btn btn-danger">Reset Password</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection