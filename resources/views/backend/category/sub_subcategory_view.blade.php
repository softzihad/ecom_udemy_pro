@extends('admin.admin_master')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-lg-8">

		<div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title" id="hhh">Sub Sub-SubCategory List</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
				  <table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Category</th>
							<th>Sub Category</th>
							<th>Sub-subSubCategory Name <span class="text-warning">(En)</span></th>
							<!-- <th>Sub-subSubCategory Name <span class="text-warning">(Bng)</span></th> -->
							<th class="width: 40%;">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($subsubcategories as $subsubcategory)
						<tr>
							<td>{{ $subsubcategory->category->category_name_en }}</td>
							<td>{{ $subsubcategory->subcategory->subcategory_name_en }}</td>
							<td>{{ $subsubcategory->subsubcategory_name_en }}</td>
							<!-- <td>{{ $subsubcategory->subsubcategory_name_bng }}</td> -->
							<td>
								<a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal{{ $subsubcategory->id }}"><i class="fa fa-pencil"></i></a>
								<a href="{{ route('subsubcategory.delete', ['id' => $subsubcategory->id]) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						<!-- The Modal -->
						<div class="modal fade" id="editModal{{ $subsubcategory->id }}">
						  <div class="modal-dialog">
						    <div class="modal-content">

						      <!-- Modal Header -->
						      <div class="modal-header">
						        <h4 class="modal-title">Sub-Category Update</h4>
						      </div>

						      <!-- Modal body -->
						      <div class="modal-body">
						        <form action="{{ route('subsubcategory.update', $subsubcategory->id) }}" method="post">
											@csrf
											<div class="form-group">
												<h5>Category <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="category_id" id="select" required class="form-control">
														@foreach($categories as $category)
															<option value="{{ $category->id }}"
																@if($subsubcategory->category_id == $category->id)
																	selected
																@endif>{{ $category->category_name_en }}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="form-group">
												<h5>Sub Category <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="subcategory_id" id="select" required class="form-control">
														@foreach($subcategories as $subcategory)
															<option value="{{ $subcategory->id }}"
																@if($subsubcategory->subcategory_id == $subcategory->id)
																	selected
																@endif>{{ $subcategory->subcategory_name_en }}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="form-group">
												<h5>Sub-Category Name English<span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="text" name="subsubcategory_name_en" class="form-control" value="{{ $subsubcategory->subsubcategory_name_en }}" required> 
												</div>
												@error('subsubcategory_name_en')
														<span class="text-danger">{{ $message }}</span>
												@enderror
											</div>
											<div class="form-group">
												<h5>Sub-Category Name Bengali<span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="text" name="subsubcategory_name_bng" class="form-control" value="{{ $subsubcategory->subsubcategory_name_bng }}" required> 
												</div>
												@error('subsubcategory_name_bng')
														<span class="text-danger">{{ $message }}</span>
												@enderror
											</div>
											<div class="text-xs-right">
												<!-- <button type="submit" class="btn btn-primary">Update</button> -->
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
			  <h3 class="box-title">Add Sub Sub-Category</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form action="{{ route('subsubcategory.store') }}" method="post">
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
						<h5>Sub-Category <span class="text-danger">*</span></h5>
						<div class="controls">
							<select name="subcategory_id" class="form-control">
								<option value=""  disabled="">Select Sub-Category</option>
							</select>
						</div>
						@error('subcategory_id')
								<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>

					<!-- ===========> 2nd Step Dropdown Clickable Select Field <==========  -->

					<!-- <div class="form-group">
						<h5>Sub Sub-Category <span class="text-danger">*</span></h5>
						<div class="controls">
							<select name="subsubcategory_id" class="form-control">
								<option value=""  disabled="">Select Sub Sub-Category</option>
							</select>
						</div>
						@error('subsubcategory_id')
								<span class="text-danger">{{ $message }}</span>
						@enderror
					</div> -->

					<!-- ===========> End 2nd Step Dropdown Clickable Select Field <==========  -->

					<div class="form-group">
						<h5>Sub Sub-Category Name English<span class="text-danger">*</span></h5>
						<div class="controls">
							<input type="text" name="subsubcategory_name_en" class="form-control" value="{{ old('subsubcategory_name_en') }}"> 
						</div>
						@error('subsubcategory_name_en')
								<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<h5>Sub Sub-Category Name Bengali<span class="text-danger">*</span></h5>
						<div class="controls">
							<input type="text" name="subsubcategory_name_bng" class="form-control" value="{{ old('subsubcategory_name_bng') }}"> 
						</div>
						@error('subsubcategory_name_bng')
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

<script type="text/javascript">
    $(document).ready(function() {
      $('select[name="category_id"]').on('change', function(){
          var category_id = $(this).val();
          if(category_id) {
              $.ajax({
                  url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });

      /*Start 2nd Step Dropdown Clickable Select Field*/
     /* $('select[name="subcategory_id"]').on('change', function(){
          var subcategory_id = $(this).val();
          if(subcategory_id) {
              $.ajax({
                  url: "{{  url('/category/subcategory/subsubcategory/ajax') }}/"+subcategory_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });*/
      /* End 2nd Step Dropdown Clickable Select Field*/
  });
</script>
@endsection