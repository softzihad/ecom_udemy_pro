@extends('admin.admin_master')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-8">

		<div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title">Data Table With Full Features</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				{!! $dataTable->table() !!}
			</div>
			<!-- /.box-body -->
		</div>
	  <!-- /.box -->         
	</div>
	<!-- /.col -->

	<!-- Add Brand Form Here -->
	<div class="col-4">

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
						<button type="submit" class="btn btn-rounded btn-primary">Add New</button>
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
{!! $dataTable->scripts() !!}
<!-- /.content -->
@endsection
