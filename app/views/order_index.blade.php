@extends('_master')

@section('title')
	Your Orders for 
@stop

@section('content')

	<h1>Orders for {{ Auth::user()->firstname; }} {{ Auth::user()->lastname;}}</h1>
	
	@foreach($orders as $order)
			<table class="table table-bordered">
			<tr>
				<td>
			{{'Order #'.$order['id'].': Due on '.$order['due'].'<br>' }}
				</td>
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
			</tr>
			
			<a class="btn btn-default btn-xs" href="/orders/edit/{{$order['id']}}">Edit or Delete</a>
			'<br><br>'
			</table>
	@endforeach


@stop