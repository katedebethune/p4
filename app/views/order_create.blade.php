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
		
			
				<h3>{{ $food->name }} </h3>
			
				<!--small-->{{ $food->description }} <!--/small-->
			
		  	<div class='form-group'> 
		  		{{ Form::label('', '$'.$food->price.' '.$food->sold_by_desc) }}	
		  		{{ Form::text($food->id, '0', array('id'=>'', 'class'=>'resizedTextbox')) }}
		  	</div>
		  	
		  
  
		@endforeach
		
		
		
		{{ Form::label('date', 'date & time needed') }}
		{{ Form::text('date_due', '', array('id'=>'dt_picker', 'class'=>'')) }}
		{{ Form::text('time_due', '', array('id'=>'dt_picker_alt', 'class'=>'')) }}
		<br>
		{{ $errors->first('date_due') }}
		{{ $errors->first('time_due') }}
		<hr>
		{{ Form::label('comments', 'Comments') }}
		<!--textarea class="form-control" rows="3"-->
			{{ Form::textarea('comments', '', array('class'=>'form-control', 'rows'=>'3')) }}
		<!--/textarea-->
		{{ Form::hidden('status', 'open') }}
		
		

		<br><br>
		{{ Form::submit('Place my order!', array('id'=>'', 'class'=>'btn btn-primary btn-lg')); }}

	{{ Form::close() }}

@stop