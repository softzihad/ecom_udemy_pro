@extends('admin.admin_master')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-lg-8">

		<div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title" id="hhh">Brand List</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
				  <table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Brand Name End</th>
							<th>Brand Name Bng</th>
							<th>Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($brands as $brand)
						<tr>
							<td>{{ $brand->brand_name_en }}</td>
							<td>{{ $brand->brand_name_bng }}</td>
							<td>
								<img src="{{ asset($brand->brand_image) }}" alt="{{ asset($brand->brand_name_en) }}" style="width: 70px; height: 40px">
							</td>
							<td>
								<a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal{{ $brand->id }}"><i class="fa fa-pencil"></i></a>
								<a href="{{ route('brand.delete', ['id' => $brand->id]) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						<!-- The Modal -->
						<div class="modal fade" id="editModal{{ $brand->id }}">
						  <div class="modal-dialog">
						    <div class="modal-content">

						      <!-- Modal Header -->
						      <div class="modal-header">
						        <h4 class="modal-title">Brand Update</h4>
						      </div>

						      <!-- Modal body -->
						      <div class="modal-body">
						        <form action="{{ route('brand.update', $brand->id) }}" method="post" enctype="multipart/form-data">
											@csrf
											<div class="form-group">
												<h5>Brand Name English<span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="text" name="brand_name_en" class="form-control" value="{{ $brand->brand_name_en }}" required> 
												</div>
												@error('brand_name_en')
														<span class="text-danger">{{ $message }}</span>
												@enderror
											</div>
											<div class="form-group">
												<h5>Brand Name Bengali<span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="text" name="brand_name_bng" class="form-control" value="{{ $brand->brand_name_bng }}" required> 
												</div>
												@error('brand_name_bng')
														<span class="text-danger">{{ $message }}</span>
												@enderror
											</div>
											<div class="form-group">
												<h5>Brand Image<span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="file" name="brand_image" class="form-control-file border mt-3" id="image">
													<!-- <img id="showImage" src="{{ asset($brand->brand_image) }}" alt="" style="width: 120px; height: 120px;"> -->
												</div>
												@error('brand_image')
														<span class="text-danger">{{ $message }}</span>
												@enderror
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

	<!-- Add Brand Form Here -->
	<div class="col-lg-4">

		<div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title">Add Brand</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<h5>Brand Name English<span class="text-danger">*</span></h5>
						<div class="controls">
							<input type="text" name="brand_name_en" class="form-control"> 
						</div>
						@error('brand_name_en')
								<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<h5>Brand Name Bengali<span class="text-danger">*</span></h5>
						<div class="controls">
							<input type="text" name="brand_name_bng" class="form-control"> 
						</div>
						@error('brand_name_bng')
								<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<h5>Brand Image<span class="text-danger">*</span></h5>
						<div class="controls">
							<input type="file" name="brand_image" class="form-control"> 
						</div>
						@error('brand_image')
								<span class="text-danger">{{ $message }}</span>
						@enderror
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
