@extends('_master')

@section('title')
	Edit or Delete a Catering Order
@stop

@section('content')

	<h1>Edit your Catering Order</h1>

	{{ Form::open(array('url' => '/orders/edit/')) }}
	
	{{ Form::hidden('id',$order['id']); }}
	
	{{ 'Order #'.$order['id'].': Due on '.$order['due'].'<br>' }}
		
		@foreach($foods as $food)
				<hr>
				
				<h3>{{ $food->name }} </h3>
				<small>{{ $food->description }} </small>
				<br>
				{{ "$".$food->price.' '.$food->sold_by_desc }}
  				
				  <br><br>
				{{ Form::label($food->name, $food->name) }}	
				  @foreach($order_detail as $od) 
					@if( $food->id == $od->food_id )
						{{ Form::text($food->id, $od->quantity, array('id'=>'', 'class'=>'resizedTextbox')) }}
						@if ($flag = 1) @endif
					@endif
				  @endforeach
				  @if ($flag == 0)
					{{ Form::text($food->id, '0', array('id'=>'', 'class'=>'resizedTextbox')) }}
				  @endif
				  @if ($flag = 0) @endif
				  
			  
		@endforeach
		<hr>
		{{ Form::label('date', 'date & time needed') }}
		{{ Form::text('date_due', date_format($dt, 'm/d/Y'), array('id'=>'dt_picker', 'class'=>'')) }}
		{{ Form::text('time_due', date_format($dt, 'g:i A'), array('id'=>'dt_picker_alt', 'class'=>'')) }}
		
		<hr>
		{{ Form::label('comments', 'Comments') }}
		{{ Form::textarea('comments', $order->comments) }}
		{{ Form::hidden('status', 'open') }}
		<br><br>
		{{ Form::submit('Update my order!', array('id'=>'', 'class'=>'btn btn-primary btn-sm')); }}

	{{ Form::close() }}
	<br>
	
	{{---- DELETE -----}}
	{{ Form::open(array('url' => '/orders/delete')) }}
		{{ Form::hidden('id',$order['id']); }}
		{{ Form::submit('Delete my order', array('id'=>'', 'class'=>'btn btn-primary btn-sm')) }}
	{{ Form::close() }}

@stop
