@extends('admin.admin_master')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-md-12">

		<div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title" id="hhh">Product List</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
				  <table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Image </th>
							<th>Product <span class="text-warning">(En)</span></th>
							<th>Product <span class="text-warning">(Bng)</span></th>
							<th>Product Price </th>
							<th>Quantity </th>
							<th>Discount </th>
								<th>Status </th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $product)
						<tr>
							<td> <img src="{{ asset($product->product_thambnail) }}" style="width: 60px; height: 50px;">  </td>
							<td>{{ $product->product_name_en }}</td>
							 <td>{{ $product->product_name_bng }}</td>
							 <td>{{ $product->selling_price }}</td>
							 <td>{{ $product->product_qty }}</td>
							 <td>
							 	@if($product->discount_price == NULL)
							 		<span class="badge badge-pill badge-danger">No Discount</span>
							 	@else
								 	@php
									 	$amount = $product->selling_price - $product->discount_price;
									 	$discount = ($amount/$product->selling_price) * 100;
								 	@endphp
					        <span class="badge badge-pill badge-danger">{{ round($discount)  }} %</span>
							 	@endif
							 </td>
							 <td>
							 	@if($product->status == 1)
							 		<span class="badge badge-pill badge-success"> Active </span>
							 	@else
					        <span class="badge badge-pill badge-danger"> InActive </span>
							 	@endif
							 </td>
								<td width="30%">
									<a href="{{ route('product.edit',$product->id) }}" class="btn btn-primary btn-md" title="Product Details Data"><i class="fa fa-eye"></i> </a>
									<a href="{{ route('product.edit',$product->id) }}" class="btn btn-info btn-md" title="Edit Data"><i class="fa fa-pencil"></i> </a>
									<a href="{{ route('product.delete',$product->id) }}" class="btn btn-danger btn-md" title="Delete Data" id="delete">
						 			<i class="fa fa-trash"></i></a>
						 			@if($product->status == 1)
										<a href="{{ route('product.inactive',$product->id) }}" class="btn btn-danger btn-md" title="Inactive Now"><i class="fa fa-arrow-down"></i> </a>
									@else
										<a href="{{ route('product.active',$product->id) }}" class="btn btn-success btn-md" title="Active Now"><i class="fa fa-arrow-up"></i> </a>
									 @endif
								</td>
						</tr> 
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



  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
@endsection