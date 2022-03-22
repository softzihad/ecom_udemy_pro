@extends('admin.admin_master')

@section('title')
Admin | Manage Division
@endsection

@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-lg-8">

		<div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title" id="hhh">Division List</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
				  <table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
								<th>Division Name </th>
								<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($divisions as $division)
						<tr>
							<td> {{ $division->division_name }}  </td>

							<td>
					 			<a href="{{ route('division.update',$division->id) }}" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal{{ $division->id }}" title="Edit Data"><i class="fa fa-pencil"></i> </a>
					 			<a href="{{ route('division.delete',$division->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete">
					 			<i class="fa fa-trash"></i></a>
							</td>
						</tr>
						<!-- The Modal -->
						<div class="modal fade" id="editModal{{ $division->id }}">
						  <div class="modal-dialog">
						    <div class="modal-content">

						      <!-- Modal Header -->
						      <div class="modal-header">
						        <h4 class="modal-title">Division Update</h4>
						      </div>

						      <!-- Modal body -->
						      <div class="modal-body">
						        <form action="{{ route('division.update',$division->id) }}" method="post">
											@csrf
											<div class="form-group">
												<h5>Division Name<span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="text"  name="division_name" class="form-control" value="{{ $division->division_name }}" required > 
													@error('division_name') 
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

	<!-- Add Division Form Here -->
	<div class="col-lg-4">

		<div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title">Add Division</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form action="{{ route('division.store') }}" method="post">
					@csrf
					<div class="form-group">
						<h5>Division Name  <span class="text-danger">*</span></h5>
						<div class="controls">
							<input type="text"  name="division_name" class="form-control" > 
							@error('division_name') 
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