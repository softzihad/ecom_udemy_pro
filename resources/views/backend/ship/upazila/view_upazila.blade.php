@extends('admin.admin_master')

@section('title')
Admin | Manage Upazila
@endsection

@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-lg-8">

		<div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title" id="hhh">Upazila List</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
				  <table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
								<th>Upazila Name </th>
								<th>District Name </th>
								<th>Division Name </th>
								<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($upazilas as $upazila)
						<tr>
							<td> {{ $upazila->upazila_name }}  </td>
							<td>{{ $upazila->district->district_name }}</td>
							<td>{{ $upazila->division->division_name }}</td>
							<td>
					 			<a href="{{ route('upazila.update',$upazila->id) }}" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal{{ $upazila->id }}" title="Edit Data"><i class="fa fa-pencil"></i> </a>
					 			<a href="{{ route('upazila.delete',$upazila->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete">
					 			<i class="fa fa-trash"></i></a>
							</td>
						</tr>
						<!-- The Modal -->
						<div class="modal fade" id="editModal{{ $upazila->id }}">
						  <div class="modal-dialog">
						    <div class="modal-content">

						      <!-- Modal Header -->
						      <div class="modal-header">
						        <h4 class="modal-title">Upazila Update</h4>
						      </div>

						      <!-- Modal body -->
						      <div class="modal-body">
						        <form action="{{ route('upazila.update',$upazila->id) }}" method="post">
											@csrf

											<div class="form-group">
												<h5>Division <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="division_id" class="form-control" required >
														<option value="" selected="" disabled="">Select Division</option>
														@foreach($divisions as $div)
														<option value="{{ $div->id }}" 
															@if($div->id== $upazila->division->id)
																	selected
																	@php
																		$divisionId = $div->id;
																	@endphp
															@endif>{{ $div->division_name }}
														</option>	

														@endforeach
													</select>
													@error('division_id') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror 
												 </div>
											 </div>

											 <!-- Query For Select Just Only Division Wise All District -->
											 @php
											 	$DivWiseDis = App\Models\ShipDistrict::where('division_id', $divisionId)->orderBy('district_name','ASC')->get();
											 @endphp

											 <div class="form-group">
												<h5>District<span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="district_id" class="form-control" required>

														<!-- Display For Just Only Division Wise All District -->
														@foreach($DivWiseDis as $district)
														<option value="{{ $district->id }}" {{ $district->id == $upazila->district->id ? 'selected' : '' }} >{{$district->district_name}}</option>
														@endforeach

													</select>
												</div>
												@error('district_id')
														<span class="text-danger">{{ $message }}</span>
												@enderror
											</div>

											<div class="form-group">
												<h5>upazila Name<span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="text"  name="upazila_name" class="form-control" value="{{ $upazila->upazila_name }}" required > 
													@error('upazila_name') 
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

	<!-- Add upazila Form Here -->
	<div class="col-lg-4">

		<div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title">Add Upazila</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form action="{{ route('upazila.store') }}" method="post">
					@csrf

					<div class="form-group">
						<h5>Division <span class="text-danger">*</span></h5>
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
						<h5>District<span class="text-danger">*</span></h5>
						<div class="controls">
							<select name="district_id" class="form-control">
								<option value="">Select District</option>
							</select>
						</div>
						@error('district_id')
								<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>

					<div class="form-group">
						<h5>Upazila Name  <span class="text-danger">*</span></h5>
						<div class="controls">
							<input type="text"  name="upazila_name" class="form-control" value="{{ old('upazila_name') }}"> 
							@error('upazila_name') 
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


<script type="text/javascript">
    $(document).ready(function() {
      $('select[name="division_id"]').on('change', function(){
          var division_id = $(this).val();
          if(division_id) {
              $.ajax({
                  url: "{{  url('shipping/division/district/ajax') }}/"+division_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="district_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });
  });
</script>
@endsection