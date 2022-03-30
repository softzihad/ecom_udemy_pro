@extends('frontend.main_master')
@section('content')

@section('title')
My Account
@endsection

<div class="body-contet">
	<div class="container">
		<div class="row">
			
			@include('frontend.common.user_sidebar');

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