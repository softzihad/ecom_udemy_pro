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
					<h3 class="text-center"><span class="text-danger">Hi...</span> <strong class="text-info">{{ Auth::user()->name }}</strong> <strong>Welcome to Our Ecom Shop</strong> </h3>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection