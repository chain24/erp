@extends('layout.master')

@section('content')
<div class="header_bar">
	<h1>Orders</h1>
</div>
<table class="table table-bordered table-hover table-responsive table-striped">

	
	<thread>
		<tr class="success">
			
			<th>{{trans('names.supplier')}}</th>
			<th>{{trans('names.location')}}</th>
			<th>{{trans('names.total')}}</th>
			<th>{{trans('names.subtotal')}}</th>
			<th>{{trans('names.tax')}}</th>
			<th>{{trans('names.shippingType')}}</th>
			<th>{{trans('names.payType')}}</th>
			
		</tr>
	</thread>


	@if($orders)
	@foreach($orders as $order)
	<tr class="success">
		<td onclick="javascript:location.href='{{ url('/') }}/order/{{$order->pcs_order_id}}'">{{$order->supplier}}</td><td>{{$order->location}}</td><td>{{$order->total}}</td><td>{{$order->subtotal}}</td><td>{{$order->tax}}</td><td>{{$order->shippingType}}</td><td>{{$order->payType}}</td>
	</tr>
		@endforeach
		@endif
	</table>
</center>
{!! $orders->links() !!}		
</div>
@stop
