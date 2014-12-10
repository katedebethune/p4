@extends('_master')

@section('title')
	Edit or Delete a Catering Order
@stop

@section('content')

	<h1>Edit your Catering Order</h1>

	{{-- Form::open(array('url' => '/orders/edit/'.$order->id.'')) --}}
	{{ Form::open(array('url' => '/orders/edit/')) }}
	
	{{ Form::hidden('id',$order['id']); }}
	
	{{ 'Order #'.$order['id'].': Due on '.$order['due'].'<br>' }}
		
		@foreach($foods as $food)
				<hr>
				
				<h3>{{ $food->name }} </h3>
				<small>{{ $food->description }} </small>
				<br>
				{{ "$".$food->price }}
  
				  @if ($food->sold_by == 'unit' && $food->menu_code == 'catering')
					per person 
				  @elseif ($food->sold_by == 'weight' )
					per pound
				  @elseif ( $food->sold_by == 'unit' )
					each
				  @else
					per ounce
				  @endif 
				  <br><br>
				{{ Form::label($food->name, $food->name) }}	
				  @foreach($order_detail as $od) 
					@if( $food->id == $od->food_id )
						{{ Form::text($food->id, $od->quantity, array('id'=>'', 'class'=>'resizedTextbox')) }}
						@if ($flag = 1) @endif
					@endif
				  @endforeach
				  @if ($flag == 0)
					{{ Form::text($food->id, '#', array('id'=>'', 'class'=>'resizedTextbox')) }}
				  @endif
				  @if ($flag = 0) @endif
			  
		@endforeach
		<hr>
		{{ Form::label('date', 'date & time needed') }}
		{{ Form::text('date_due', $order->due_date, array('id'=>'datepicker', 'class'=>'')) }}
		{{ Form::text('time_due', $order->due_time) }}
		
		{{-- TRYING TO WORK OUT DATETIMEPICKER PLUGIN HERE --}}
		{{-- Form::text('time', '', array('id'=>'datetimepicker1', 'class'=>'')) --}}
		{{-- <input id="datetimepicker" type="text" > --}}
		{{--<p>Enter your time: <input type="text" id="defaultEntry" size="10"></p> --}}
		<hr>
		{{ Form::label('comments', 'Comments') }}
		{{ Form::textarea('comments', $order->comments) }}
		{{ Form::hidden('status', 'open') }}
		
		

		<br><br>
		{{ Form::submit('Update my order!'); }}

	{{ Form::close() }}
	
	{{---- DELETE -----}}
	{{ Form::open(array('url' => '/orders/delete')) }}
		{{ Form::hidden('id',$order['id']); }}
		{{ Form::submit('Delete my order') }}
	{{ Form::close() }}

@stop


