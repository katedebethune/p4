@extends('_master')

@section('title')
	Create a new Catering Order
@stop

@section('content')

	<h1>Create a New Catering Order</h1>

	{{ Form::open(array('url' => '/orders/create')) }}
		
		$food_options
		{{ Form::label('food_options', 'Food Options') }}
		{{ Form::select('food_options[]', $food_options, null, ['name' => 'food_options', 'multiple' => 'multiple']) }}
		{{-- Form::select('food_options[]', $dogs, $customer->dogs->lists('id'), ['id' => 'dogs', 'multiple' => 'multiple']) --}}
		{{-- Form::select('food_options[]', $food_options, $orders->food_options->lists('id'), ['id' => 'food_options', 'multiple' => 'multiple']) --}}
		
		{{-- Form::label('dogs', 'Dogs') --}}
{{-- Form::select('dogs[]', $dogs, null, ['id' => 'dogs', 'multiple' => 'multiple']) --}}

		 {{ "<br><br>Multidimensional array of selects <br><br>" }}
    
    	{{ Form::label('bear', 'Bears are?') }}
    	{{ Form::select('bear', array(
        	'Panda' => array(
            	'red'       => 'Red',
            	'black'     => 'Black',
            	'white'     => 'White'
        	),
        	'Character' => array(
            	'pooh'      => 'Pooh',
            	'baloo'     => 'Baloo'
        	)
    	), 		'black') }}


		
		<hr>
		{{ Form::label('date', 'date & time needed') }}
		{{ Form::text('date', '', array('id'=>'datepicker', 'class'=>'')) }}
		{{ Form::text('time', '10:00') }}
		
		{{-- TRYING TO WORK OUT DATETIMEPICKER PLUGIN HERE --}}
		{{-- Form::text('time', '', array('id'=>'datetimepicker1', 'class'=>'')) --}}
		{{-- <input id="datetimepicker" type="text" > --}}
		{{--<p>Enter your time: <input type="text" id="defaultEntry" size="10"></p> --}}
		<hr>
		{{ Form::label('comments', 'Comments') }}
		{{ Form::textarea('comments', '') }}
		
		

		<br><br>
		{{ Form::submit('Place my order!'); }}

	{{ Form::close() }}

@stop