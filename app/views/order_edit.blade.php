@extends('_master')

@section('title')
	Edit or Delete a Catering Order
@stop

@section('content')

	<h1>Edit your Catering Order</h1>

	{{ Form::open(array('url' => '/orders/edit')) }}
	
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
			  {{-- Form::select($food->id, array( 
					'0'		=> '-',
					'1'       => '1',
					'2'     => '2',
					'3'     => '3'
						), '0') 
			   --}}
			  
			  {{ $qt = $order->food()->select('quantity') }}
			  
			  @if ($qt > 0 ) 
			  	 $qt = $qt 
			  @else 
			  	 $qt = '-' 
			  @endif
			
			  	
			  {{-- $qt or "-" --}}
			  {{ Form::text($food->id, isset($qt) ? $qt : '-') }}
			  {{-- Form::text($food->id, $qt) --}}
			  
			  
			
				
  
		@endforeach
		<hr>
		{{ Form::label('date', 'date & time needed') }}
		{{ Form::text('date_due', '', array('id'=>'datepicker', 'class'=>'')) }}
		{{ Form::text('time_due', '10:00') }}
		
		{{-- TRYING TO WORK OUT DATETIMEPICKER PLUGIN HERE --}}
		{{-- Form::text('time', '', array('id'=>'datetimepicker1', 'class'=>'')) --}}
		{{-- <input id="datetimepicker" type="text" > --}}
		{{--<p>Enter your time: <input type="text" id="defaultEntry" size="10"></p> --}}
		<hr>
		{{ Form::label('comments', 'Comments') }}
		{{ Form::textarea('comments', '') }}
		{{ Form::hidden('status', 'open') }}
		
		

		<br><br>
		{{ Form::submit('Update my order!'); }}

	{{ Form::close() }}

@stop

