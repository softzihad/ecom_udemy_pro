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
					<h3 class="text-center"><span class="text-danger">Hi...</span> <strong class="text-info">{{ Auth::user()->name }}</strong> <strong>Update Your Profile</strong> </h3>

					<div class="card-body" style="margin: 20px 0px;">
						<form method="post" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
							    <label for="name">Name</label>
							    <input type="name" class="form-control" id="name" name="name" value="{{ $user->name }}">
							</div>
							<div class="form-group">
							    <label for="email">Email</label>
							    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
							</div>
							<div class="form-group">
							    <label for="phone">Phone</label>
							    <input type="phone" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
							</div>
							<div class="form-group">
							    <label for="">User Image</label>
							    <input type="file" class="form-control" id="" name="profile_photo_path">
							</div>

							<button type="submit" class="btn btn-danger">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection