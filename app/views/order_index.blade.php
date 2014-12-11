@extends('_master')

@section('title')
	Your Orders for 
@stop

@section('content')

	<h1>Orders for {{ Auth::user()->firstname; }} {{ Auth::user()->lastname;}}</h1>
	
	{{-- $orders --}}
	
	@foreach($orders as $order)
			{{ 'Order #'.$order['id'].': Due on '.$order['due'].'<br>' }}
			<a href='/orders/edit/{{$order['id']}}'>Edit or Delete</a>{{ '<br>'}}
			{{ 'quantity item price<br>' }}
			@foreach($order->food()->select('name','quantity', 'sold_by_desc', 'extended_price', 'price')->get() as $food)
				{{ $food['quantity'].' '.
					$food['name'].' at $'.$food['price'].' '.
					$food['sold_by_desc'].': $'.$food['extended_price'].'<br>' }}
			@endforeach
			'<br>'
	@endforeach


@stop