@extends('_master')

@section('title')
	Create a new Catering Order
@stop

@section('content')

	<h1>Create a New Catering Order</h1>

	{{ Form::open(array('url' => '/orders/create')) }}
		
		@foreach($foods as $food)
	 		@if ($food->menu_code == 'catering' || $food->menu_code == 'both')
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
			  {{ Form::select('$food->name', array(
					'-'		=> '0',
					'1'       => '1',
					'2'     => '2',
					'3'     => '3'
						), '0') }}
  			@endif
  
		@endforeach
		<hr>
		{{ Form::label('date', 'date & time needed') }}
		{{ Form::text('date', '', array('id'=>'datepicker', 'class'=>'')) }}
		{{-- <p>Date: <input type="text" id="datepicker"></p> --}}
		<hr>
		{{ Form::label('comments', 'Comments') }}
		{{ Form::textarea('comments', '') }}
		
		

		<br><br>
		{{ Form::submit('Place my order!'); }}

	{{ Form::close() }}

@stop