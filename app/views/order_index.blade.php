@extends('_master')

@section('title')
	Your Orders for 
@stop

@section('content')

	<h1>Orders for {{ Auth::user()->firstname; }} {{ Auth::user()->lastname;}}</h1>
	
	@foreach($orders as $order)
	{{'Order #'.$order['id'].': Due on '.$order['due'].'<br>' }}
			<table class="table table-bordered">
			
			
				
			<tr>
   				<th>Quantity</th>
   				<th>Food</th>
   				<th>Unit Price</th>
   				<th>Extended Price</th>
 			</tr>
			
			@foreach($order->food()->select('name','quantity', 'sold_by_desc', 'extended_price', 'price')->get() as $food)
			<tr>
				<td>
					{{ $food['quantity'] }}
				</td>
				<td>
					{{ $food['name'] }}
				</td>
				<td>
					{{ $food['price'].' '.$food['sold_by_desc'] }}
				</td>
				<td>
					{{ '$'.$food['extended_price'] }}
				</td>
				
				{{-- $food['quantity'].' '.
					$food['name'].' at $'.$food['price'].' '.
					$food['sold_by_desc'].': $'.$food['extended_price'].'<br>' --}}
			</tr>
			@endforeach
			<tr>
				<td>
					{{ 'Grand Total (excluding tax): $'.$order['order_total'].'<br>' }}
				</td>
				<td>
					<a class="btn btn-default btn-xs" href="/orders/edit/{{$order['id']}}">Edit or Delete</a>
				</td>
			</tr>
			</table>
	@endforeach


@stop