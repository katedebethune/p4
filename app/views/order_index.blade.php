@extends('_master')

@section('title')
	Orders for {{ Auth::user()->firstname; }} {{ Auth::user()->lastname;}}
@stop

@section('content')
@yield('nav')
  		{{ HTML::nav_open() }}
  		@if(Auth::check())
  			{{ HTML::nav_other_auth() }}
  		@else
  			{{ HTML::nav_other_non_auth() }}
  		@endif
  		{{ HTML::nav_close() }}
	<br><br>
	<div class="non-index-container">
	<h1>Orders for {{ Auth::user()->firstname; }} {{ Auth::user()->lastname;}}</h1>
	<!-- <div class="centered"> -->
			<a class="btn btn-primary btn-default btn-success" href="orders/create">Place a new order</a>
	<!-- </div> -->
	
	@foreach($orders as $order)
	<h4>{{'Order #'.$order['id'] }}</h4>
	<strong>{{ 'Due on: '.$order['due'].'<br><br>' }}</strong>
	
			<table class="table table-striped">
			
			
				
			<tr>
   				<th>Food</th>
   				<th>Quantity</th>
   				<th>Unit Price</th>
   				<th>Extended Price</th>
 			</tr>
			
			@foreach($order->food()->select('name','quantity', 'sold_by_desc', 'extended_price', 'price')->get() as $food)
			<tr>
				<td>
					{{ $food['name'] }}
				</td>
				<td>
					{{ $food['quantity'] }}
				</td>
				<td>
					{{ '$'.$food['price'].' '.$food['sold_by_desc'] }}
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
					<strong>{{ 'Grand Total (excluding tax): <br>' }}</strong>
				</td>
				<td></td><td></td>
				<td>
					<strong>{{ '$'.$order['order_total'] }}</strong>
				</td>
			</tr>
			</table>
			<a class="btn btn-primary btn-sm" href="/orders/edit/{{$order['id']}}">Edit or Delete Order {{ $order['id'] }}</a>
			<br><br>
	@endforeach
	</div>


@stop