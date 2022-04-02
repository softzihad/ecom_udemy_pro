@extends('admin.admin_master')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-lg-12">

		<div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title" id="hhh">Pending Orders List</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
				  <table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
								<th>Date</th>
								<th>Invoice</th>
								<th>Amount</th>
								<th>Payment</th>
								<th>Status</th>
								<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($orders as $order)
						<tr>
							<td> {{ $order->order_date }}  </td>
							<td> {{ $order->invoice_no }}  </td>
							<td> <span>&#2547;</span> {{ $order->amount }}  </td>
							<td> {{ $order->payment_method }}  </td>
							<td> <span class="badge badge-pill badge-primary">{{ $order->status }}</span></td>

							<td>
					 			<a href="{{ route('coupon.update',$order->id) }}" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal{{ $order->id }}" title="Edit Data"><i class="fa fa-pencil"></i> </a>
					 			<a href="{{ route('coupon.delete',$order->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete">
					 			<i class="fa fa-trash"></i></a>
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