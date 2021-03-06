@extends('frontend.main_master')
@section('content')

@section('title')
Orders
@endsection


<div class="body-contet">
	<div class="container">
		<div class="row">
			
			@include('frontend.common.user_sidebar')

			<br><br><!-- <div class="col-md-2"></div> -->
			<div class="col-md-10">
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr style="background: #e2e2e2;">
                <td class="col-md-2">
                  <label for=""> Date</label>
                </td>

                <td class="col-md-2">
                  <label for=""> Total</label>
                </td>

                <td class="col-md-1">
                  <label for=""> Payment</label>
                </td>

                <td class="col-md-2">
                  <label for=""> Invoice</label>
                </td>

                 <td class="col-md-1">
                  <label for=""> Order</label>
                </td>

                 <td class="col-md-3">
                  <label for=""> Action </label>
                </td>
              </tr>

              @foreach($orders as $order)
		       		<tr>
                <td>
                  <label for=""> {{ $order->order_date }}</label>
                </td>

                <td>
                  <label for=""> &#2547; {{ $order->amount }}</label>
                </td>

                <td>
                  <label for=""> {{ $order->payment_method }}</label>
                </td>

                <td>
                  <label for=""> {{ $order->invoice_no }}</label>
                </td>

                <td>
                  <label for=""> 
                    <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span>
                  </label>
                </td>

				        <td>
				          <a href="{{ route('order_details', ['order_id' => $order->id]) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>
				          <a href="{{ route('invoice_download', ['order_id' => $order->id]) }}" target="_blank" class="btn btn-sm btn-danger"><i class="fa fa-download" style="color: white;"></i> Invoice </a>
				        </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
       </div> <!-- / end col md 8 -->
		</div><!-- / end Row -->
	</div>
</div>
@endsection