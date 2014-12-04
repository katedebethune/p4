@extends('_master')

@section('title')
	Your Orders for 
@stop

@section('content')

	<h1>Orders for {{-- Auth::user()->firstname; --}} {{-- Auth::user()->lastname; --}}</h1>


	

	@if(sizeof($orders) == 0)
		No results
	@else
		@foreach($orders as $order)

				<h2>Order # {{ $order['id']; }}</h2>
				{{ $order['due']; }}
				<ul>
				@foreach($orders->food as $food)
					<li>{{ $food['name']; }} {{ $food['quantity']; }}</li>
				@endforeach
				</ul>

				{{-- Auth::user()->email; --}}
				{{-- Auth::user()->firstname; --}}
				{{-- $order->user->firstname; --}}
				{{-- $example_array['message']; --}}
				
				
		@endforeach

	@endif

@stop