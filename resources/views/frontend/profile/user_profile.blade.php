@extends('frontend.main_master')
@section('content')

@section('title')
Update Profile
@endsection

<div class="body-contet">
	<div class="container">
		<div class="row">
			
			@include('frontend.common.user_sidebar');

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