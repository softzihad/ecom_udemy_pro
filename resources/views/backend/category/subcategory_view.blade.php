@extends('admin.admin_master')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-lg-8">

		<div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title" id="hhh">Sub-Category List</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
				  <table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Category</th>
							<th>Sub-Category Name <span class="text-warning">(En)</span></th>
							<th>Sub-Category Name <span class="text-warning">(Bng)</span></th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($subcategories as $subcategory)
						<tr>
							<td>{{ $subcategory->category->category_name_en }}</td>
							<td>{{ $subcategory->subcategory_name_en }}</td>
							<td>{{ $subcategory->subcategory_name_bng }}</td>
							<td>
								<a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal{{ $subcategory->id }}"><i class="fa fa-pencil"></i></a>
								<a href="{{ route('subcategory.delete', ['id' => $subcategory->id]) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						<!-- The Modal -->
						<div class="modal fade" id="editModal{{ $subcategory->id }}">
						  <div class="modal-dialog">
						    <div class="modal-content">

						      <!-- Modal Header -->
						      <div class="modal-header">
						        <h4 class="modal-title">Sub-Category Update</h4>
						      </div>

						      <!-- Modal body -->
						      <div class="modal-body">
						        <form action="{{ route('subcategory.update', $subcategory->id) }}" method="post">
											@csrf
											<div class="form-group">
												<h5>Category <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="category_id" id="select" required class="form-control">
														@foreach($categories as $category)
															<option value="{{ $category->id }}"
																@if($subcategory->category_id == $category->id)
																	selected
																@endif>{{ $category->category_name_en }}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="form-group">
												<h5>Sub-Category Name English<span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="text" name="subcategory_name_en" class="form-control" value="{{ $subcategory->subcategory_name_en }}" required> 
												</div>
												@error('subcategory_name_en')
														<span class="text-danger">{{ $message }}</span>
												@enderror
											</div>
											<div class="form-group">
												<h5>Sub-Category Name Bengali<span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="text" name="subcategory_name_bng" class="form-control" value="{{ $subcategory->subcategory_name_bng }}" required> 
												</div>
												@error('subcategory_name_bng')
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

	<!-- Add Category Form Here -->
	<div class="col-lg-4">

		<div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title">Add Sub-Category</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form action="{{ route('subcategory.store') }}" method="post">
					@csrf
					<div class="form-group">
						<h5>Category <span class="text-danger">*</span></h5>
						<div class="controls">
							<select name="category_id" class="form-control">
								<option value="" selected="" disabled="">Select Category</option>
								@foreach($categories as $category)
									<option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
								@endforeach
							</select>
						</div>
						@error('category_id')
								<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<h5>Sub Category Name English<span class="text-danger">*</span></h5>
						<div class="controls">
							<input type="text" name="subcategory_name_en" class="form-control" value="{{ old('subcategory_name_en') }}"> 
						</div>
						@error('subcategory_name_en')
								<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<h5>Sub Category Name Bengali<span class="text-danger">*</span></h5>
						<div class="controls">
							<input type="text" name="subcategory_name_bng" class="form-control" value="{{ old('subcategory_name_bng') }}"> 
						</div>
						@error('subcategory_name_bng')
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