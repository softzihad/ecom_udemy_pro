@php
    $id = Auth::user()->id;
    $user = App\Models\User::find($id);
@endphp


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
		<a href="{{ route('my.orders') }}" class="btn btn-primary btn-sm btn-block">My Orders</a>
		<a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
	</ul>
</div>