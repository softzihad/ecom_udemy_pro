@extends('admin.admin_master')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-lg-8">

		<div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title" id="hhh">Coupon List</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
				  <table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
								<th>Coupon Name </th>
								<th>Coupon Discount</th>
								<th>Validity </th>
								<th>Status </th>
								<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($coupons as $coupon)
						<tr>
							<td width="25%"> {{ $coupon->coupon_name }}  </td>
							<td> {{ $coupon->coupon_discount }}% </td>
							<td width="25%"	> {{ Carbon\Carbon::parse($coupon->coupon_validity)->format('D, d F Y') }}</td>

							<td>
							 	@if($coupon->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
							 		<span class="badge badge-pill badge-success"> Valid </span>
							 	@else
					        <span class="badge badge-pill badge-danger"> Invalid </span>
							 	@endif
							 </td>

							<td width="25%">
					 			<a href="{{ route('coupon.update',$coupon->id) }}" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal{{ $coupon->id }}" title="Edit Data"><i class="fa fa-pencil"></i> </a>
					 			<a href="{{ route('coupon.delete',$coupon->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete">
					 			<i class="fa fa-trash"></i></a>
							</td>
						</tr>
						<!-- The Modal -->
						<div class="modal fade" id="editModal{{ $coupon->id }}">
						  <div class="modal-dialog">
						    <div class="modal-content">

						      <!-- Modal Header -->
						      <div class="modal-header">
						        <h4 class="modal-title">Coupon Update</h4>
						      </div>

						      <!-- Modal body -->
						      <div class="modal-body">
						        <form action="{{ route('coupon.update',$coupon->id) }}" method="post">
											@csrf
											<div class="form-group">
												<h5>Cupon Name<span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="text"  name="coupon_name" class="form-control" value="{{ $coupon->coupon_name }}" required > 
													@error('coupon_name') 
														<span class="text-danger">{{ $message }}</span>
													@enderror 
												</div>
											</div>
											<div class="form-group">
												<h5>Coupon Discount(%) <span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="text" name="coupon_discount" class="form-control" value="{{ $coupon->coupon_discount }}" required >
											    @error('coupon_discount') 
														<span class="text-danger">{{ $message }}</span>
												 	@enderror 
											  </div>
											</div>
											<div class="form-group">
												<h5>Coupon Validity Date  <span class="text-danger">*</span></h5>
												<div class="controls">
												 <input type="date" name="coupon_validity" class="form-control" value="{{ $coupon->coupon_validity }}" required >
											     @error('coupon_validity') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror 
											  </div>
											</div> 
											<div class="text-xs-right">
												<input type="submit" class="btn btn-rounded btn-info" value="Update">
											</div>
										</form>
						      </div>

						      <!-- Modal footer -->
						      <div class="modal-footer">
						        <a type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</a>
						      </div>

						    </div>
						  </div>
						</div> 
						@endforeach
					</tbody>
				  </table>
				</div>
			</div>
			<!-- /.box-body -->
		</div>
	  <!-- /.box -->       
	</div>
	<!-- /.col -->

	<!-- Add Coupon Form Here -->
	<div class="col-lg-4">

		<div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title">Add Cupon</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form action="{{ route('coupon.store') }}" method="post">
					@csrf
					<div class="form-group">
						<h5>Cupon Name<span class="text-danger">*</span></h5>
						<div class="controls">
							<input type="text"  name="coupon_name" class="form-control" > 
							@error('coupon_name') 
								<span class="text-danger">{{ $message }}</span>
							@enderror 
						</div>
					</div>
					<div class="form-group">
						<h5>Coupon Discount(%) <span class="text-danger">*</span></h5>
						<div class="controls">
							<input type="text" name="coupon_discount" class="form-control" >
					    @error('coupon_discount') 
								<span class="text-danger">{{ $message }}</span>
						 	@enderror 
					  </div>
					</div>
					<div class="form-group">
						<h5>Coupon Validity Date  <span class="text-danger">*</span></h5>
						<div class="controls">
						 <input type="date" name="coupon_validity" class="form-control" >
					     @error('coupon_validity') 
						 <span class="text-danger">{{ $message }}</span>
						 @enderror 
					  </div>
					</div> 
					<div class="text-xs-right">
						<input type="submit" class="btn btn-rounded btn-info" value="Add New">
					</div>
				</form>
			</div>
			<!-- /.box-body -->
		</div>
	  <!-- /.box -->         
	</div>
	<!-- /.col -->

  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
@endsection