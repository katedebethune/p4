@extends('_master')

@section('title')
	Create a new Catering Order
@stop

@section('content')

	<h1>Create a New Catering Order</h1>
	
	@if($errors->all())
		{{ 'Please correct the input errors listed below' }}
	@endif
	
	{{--
	 @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
    @endforeach
    --}}
	
	
	{{ Form::open(array('url' => '/orders/create')) }}
		
		@foreach($foods as $food)
				<hr>
				
				<h3>{{ $food->name }} </h3>
				<small>{{ $food->description }} </small>
			
				{{-- '$'.$food->price.' '.$food->sold_by_desc --}}
			
			 
			  <br><br>
			  {{ Form::label('', '$'.$food->price.' '.$food->sold_by_desc) }}	
			  {{-- Form::select($food->id, array( 
					'0'		=> '-',
					'1'       => '1',
					'2'     => '2',
					'3'     => '3'
						), '0') --}} 
			  {{ Form::text($food->id, '#', array('id'=>'', 'class'=>'resizedTextbox')) }}
			  {{-- Form::checkbox($food->id, '0', false) --}}
  
		@endforeach
		<hr>
		
		
		{{ Form::label('date', 'date & time needed') }}
		{{ Form::text('date_due', '', array('id'=>'datepicker', 'class'=>'')) }}
		{{ Form::text('time_due') }}
		<br>
		{{ $errors->first('date_due') }}
		{{ $errors->first('time_due') }}
		
		{{-- TRYING TO WORK OUT DATETIMEPICKER PLUGIN HERE --}}
		{{-- Form::text('time', '', array('id'=>'datetimepicker1', 'class'=>'')) --}}
		{{-- <input id="datetimepicker" type="text" > --}}
		{{--<p>Enter your time: <input type="text" id="defaultEntry" size="10"></p> --}}
		<hr>
		{{ Form::label('comments', 'Comments') }}
		{{ Form::textarea('comments', '') }}
		{{ Form::hidden('status', 'open') }}
		
		

		<br><br>
		{{ Form::submit('Place my order!'); }}

	{{ Form::close() }}

@stop