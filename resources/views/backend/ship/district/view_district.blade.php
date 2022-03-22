@extends('admin.admin_master')

@section('title')
Admin | Manage District
@endsection

@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-lg-8">

		<div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title" id="hhh">District List</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
				  <table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
								<th>District Name </th>
								<th>Division Name </th>
								<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($districts as $district)
						<tr>
							<td> {{ $district->district_name }}  </td>
							<td>{{ $district->division->division_name }}</td>
							<td>
					 			<a href="{{ route('district.update',$district->id) }}" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal{{ $district->id }}" title="Edit Data"><i class="fa fa-pencil"></i> </a>
					 			<a href="{{ route('district.delete',$district->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete">
					 			<i class="fa fa-trash"></i></a>
							</td>
						</tr>
						<!-- The Modal -->
						<div class="modal fade" id="editModal{{ $district->id }}">
						  <div class="modal-dialog">
						    <div class="modal-content">

						      <!-- Modal Header -->
						      <div class="modal-header">
						        <h4 class="modal-title">District Update</h4>
						      </div>

						      <!-- Modal body -->
						      <div class="modal-body">
						        <form action="{{ route('district.update',$district->id) }}" method="post">
											@csrf
											<div class="form-group">
												<h5>Division Select <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="division_id" class="form-control"  >
														<option value="" selected="" disabled="">Select Division</option>
														@foreach($divisions as $div)
														<option value="{{ $div->id }}" {{ $div->id == $district->division->id ? 'selected' : '' }}>{{ $div->division_name }}</option>	
														@endforeach
													</select>
													@error('division_id') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror 
												 </div>
											 </div>

											<div class="form-group">
												<h5>District Name<span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="text"  name="district_name" class="form-control" value="{{ $district->district_name }}" required > 
													@error('district_name') 
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

	<!-- Add district Form Here -->
	<div class="col-lg-4">

		<div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title">Add District</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form action="{{ route('district.store') }}" method="post">
					@csrf

					<div class="form-group">
						<h5>Division Select <span class="text-danger">*</span></h5>
						<div class="controls">
							<select name="division_id" class="form-control"  >
								<option value="" selected="" disabled="">Select Division</option>
								@foreach($divisions as $div)
								<option value="{{ $div->id }}">{{ $div->division_name }}</option>	
								@endforeach
							</select>
							@error('division_id') 
						 <span class="text-danger">{{ $message }}</span>
						 @enderror 
						 </div>
					 </div>

					<div class="form-group">
						<h5>District Name  <span class="text-danger">*</span></h5>
						<div class="controls">
							<input type="text"  name="district_name" class="form-control" value="{{ old('district_name') }}"> 
							@error('district_name') 
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