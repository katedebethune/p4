@extends('_master')

@section('title')
	Your Orders for 
@stop

@section('content')

	<h1>Orders for {{ Auth::user()->firstname; }} {{ Auth::user()->lastname;}}</h1>
	
	{{-- $orders --}}
	
	@foreach($orders as $order)
			{{'Order #'.$order['id'].': Due on '.$order['due'].'<br>' }}
			
			@foreach($order->food()->select('name','quantity', 'sold_by_desc', 'extended_price', 'price')->get() as $food)
				{{ $food['quantity'].' '.
					$food['name'].' at $'.$food['price'].' '.
					$food['sold_by_desc'].': $'.$food['extended_price'].'<br>' }}
			@endforeach
			{{ 'Grand Total (excluding tax): $'.$order['order_total'].'<br>' }}
			<a class="btn btn-default btn-xs" href="/orders/edit/{{$order['id']}}">Edit or Delete</a>
			'<br><br>'
	@endforeach


@stop