@extends('admin.admin_master')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-lg-8">

		<div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title" id="hhh">Slider List</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
				  <table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Slider Image</th>
							<th>Title</th>
							<th>Decription</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($sliders as $slider)
						<tr>
							<td><img src="{{ asset($slider->slider_img) }}" style="width: 70px; height: 40px;"> </td>
							<td>
					      @if($slider->title == NULL)
							 		<span class="badge badge-pill badge-danger"> No Title </span>
							 	@else
					        {{ $slider->title }}
							 	@endif
							</td>

							<td>
								@if($slider->description == NULL)
									<span class="badge badge-pill badge-danger"> No Description </span>
								@else
									{{ $slider->description }}
								@endif
							</td>
							<td>
							 	@if($slider->status == 1)
							 	<span class="badge badge-pill badge-success"> Active </span>
							 	@else
					           <span class="badge badge-pill badge-danger"> InActive </span>
							 	@endif

							 </td>
							<td width="30%">
								<a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal{{ $slider->id }}"><i class="fa fa-pencil"></i></a>
								<a href="{{ route('slider.delete', ['id' => $slider->id]) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
								@if($slider->status == 1)
									<a href="{{ route('slider.inactive',$slider->id) }}" class="btn btn-danger btn-sm" title="Inactive Now"><i class="fa fa-arrow-down"></i> </a>
								@else
									<a href="{{ route('slider.active',$slider->id) }}" class="btn btn-success btn-sm" title="Active Now"><i class="fa fa-arrow-up"></i> </a>
								@endif
							</td>
						</tr>
						<!-- The Modal -->
						<div class="modal fade" id="editModal{{ $slider->id }}">
						  <div class="modal-dialog">
						    <div class="modal-content">

						      <!-- Modal Header -->
						      <div class="modal-header">
						        <h4 class="modal-title">Slider Update</h4>
						      </div>

						      <!-- Modal body -->
						      <div class="modal-body">
						        <form action="{{ route('slider.update',$slider->id) }}" method="post" enctype="multipart/form-data">
											@csrf
											<div class="form-group">
												<h5>Slider Title</h5>
												<div class="controls">
													<input type="text"  name="title" class="form-control" value="{{ $slider->title }}"> 
												</div>
											</div>
											<div class="form-group">
												<h5>Slider Decriptio</h5>
												<div class="controls">
											  	<input type="text" name="description" class="form-control" value="{{ $slider->description }}">
											  </div>
											</div>
											<div class="form-group">
												<h5>Slider Image <span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="file" name="slider_img" class="form-control" >
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

	<!-- Add slider Form Here -->
	<div class="col-lg-4">

		<div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title">Add Slider</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<h5>Slider Title</h5>
						<div class="controls">
							<input type="text"  name="title" class="form-control" > 
						</div>
					</div>
					<div class="form-group">
						<h5>Slider Decriptio</h5>
						<div class="controls">
					  	<input type="text" name="description" class="form-control" >
					  </div>
					</div>
					<div class="form-group">
						<h5>Slider Image <span class="text-danger">*</span></h5>
						<div class="controls">
							<input type="file" name="slider_img" class="form-control" >

						  @error('slider_img') 
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
