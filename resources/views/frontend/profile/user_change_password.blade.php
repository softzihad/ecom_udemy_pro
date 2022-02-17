@extends('frontend.main_master')
@section('content')
<div class="body-contet">
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<br>
				<img style="border-radius: 50%; height: 150px; width: 150px;" src="
					@if(!empty($user->profile_photo_path))
				  		{{ asset($user->profile_photo_path) }}
				  	@else
				  		{{ asset('backend-admin/images/no_image.jpg') }}	
				  	@endif()
				" alt=""><br><br>
				<ul class="list-group list-group-flush">
					<a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
					<a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
					<a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
					<a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
				</ul>
			</div>
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