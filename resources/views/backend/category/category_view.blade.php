@extends('admin.admin_master')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-8">

		<div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title" id="hhh">Category List</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
				  <table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Category Icon</th>
							<th>Category Name <span class="text-warning">(En)</span></th>
							<th>Category Name <span class="text-warning">(Bng)</span></th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categories as $category)
						<tr>
							<td>
								<span><i class="{{ $category->category_icon }}"></i></span>
							</td>
							<td>{{ $category->category_name_en }}</td>
							<td>{{ $category->category_name_bng }}</td>
							<td>
								<a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal{{ $category->id }}"><i class="fa fa-pencil"></i></a>
								<a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						<!-- The Modal -->
						<div class="modal fade" id="editModal{{ $category->id }}">
						  <div class="modal-dialog">
						    <div class="modal-content">

						      <!-- Modal Header -->
						      <div class="modal-header">
						        <h4 class="modal-title">category Update</h4>
						      </div>

						      <!-- Modal body -->
						      <div class="modal-body">
						        <form action="{{ route('category.update', $category->id) }}" method="post">
											@csrf
											<div class="form-group">
												<h5>category Name English<span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="text" name="category_name_en" class="form-control" value="{{ $category->category_name_en }}" required> 
												</div>
												@error('category_name_en')
														<span class="text-danger">{{ $message }}</span>
												@enderror
											</div>
											<div class="form-group">
												<h5>category Name Bengali<span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="text" name="category_name_bng" class="form-control" value="{{ $category->category_name_bng }}" required> 
												</div>
												@error('category_name_bng')
														<span class="text-danger">{{ $message }}</span>
												@enderror
											</div>
											<div class="form-group">
												<h5>category Icon<span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="text" name="category_icon" class="form-control" value="{{ $category->category_icon }}" required>
												</div>
												@error('category_icon')
														<span class="text-danger">{{ $message }}</span>
												@enderror
											</div>
											<div class="text-xs-right">
												<button type="submit" class="btn btn-primary">Update</button>
											</div>
										</form>
						      </div>

						      <!-- Modal footer -->
						      <div class="modal-footer">
						        <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
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

	<!-- Add Category Form Here -->
	<div class="col-4">

		<div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title">Add Category</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form action="{{ route('category.store') }}" method="post">
					@csrf
					<div class="form-group">
						<h5>Category Name English<span class="text-danger">*</span></h5>
						<div class="controls">
							<input type="text" name="category_name_en" class="form-control" value="{{ old('category_name_en') }}"> 
						</div>
						@error('category_name_en')
								<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<h5>Category Name Bengali<span class="text-danger">*</span></h5>
						<div class="controls">
							<input type="text" name="category_name_bng" class="form-control" value="{{ old('category_name_bng') }}"> 
						</div>
						@error('category_name_bng')
								<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<h5>Category Icon<span class="text-danger">*</span></h5>
						<div class="controls">
							<input type="text" name="category_icon" class="form-control" value="{{ old('category_icon') }}"> 
						</div>
						@error('category_icon')
								<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
					<div class="text-xs-right">
						<button type="submit" class="btn btn-primary">Add New</button>
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