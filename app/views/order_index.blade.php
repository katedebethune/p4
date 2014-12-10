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
			@foreach($order->food()->select('name','quantity', 'price')->get() as $food)
				{{ $food['quantity'].' '.$food['name'].' '.$food['price'].'<br>' }}
			@endforeach
			'<br>'
	@endforeach


@stop