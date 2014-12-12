@extends('_master')

@section('title')
	Edit or Delete a Catering Order
@stop

@section('content')

	<h1>Edit your Catering Order</h1>

	{{-- --}}
	{{-- --}}
	
	{{--
		{{ Form::model($nerd, array('route' => 'nerd.edit', $nerd->id)) }}	

		<!-- name -->
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name') }}

		<!-- email -->
		{{ Form::label('email', 'Email') }}
		{{ Form::email('email') }}		

		{{ Form::submit('Update Nerd!') }}

		{{ Form::close() }}
		
		return View::make('order_edit2')
    		->with('order', Order::find($id))
    		->with('foods', Food::all())
    		->with('order_detail', $order_detail)
    		->with('flag', $flag)
    		->with('dt', $dt);
	
	--}}
	
	{{-- --}}
	{{-- --}}
	
	{{--
	
	{{ Form::model($model->toArray(), ['url' => ['route', $model->id]]); }}
 
	{{ Form::text('model_value'); }}
	{{ Form::text('related_model.value'); }}
 
	{{ Form::submit('Save') }}
 
	{{ Form::close(); }}
	
	--}}
	
	{{-- --}}
	{{-- --}}
	
	{{ Form::model($foods->toArray(), ['url' => ['/orders/edit2', $order->id]]); }}
 
	{{ Form::text('order.quantity'); }}
	{{-- Form::text('related_model.value'); --}}
 
	{{ Form::submit('Save') }}
 
	{{ Form::close(); }}

	
	{{-- --}}
	{{-- --}}
	
	@foreach($foods as $food)
		@if (in_array($food->id, $order_detail))
			{{ 'YES' }} 
		@else
			{{ 'NO' }}
		@endif
	@endforeach
    
    {{-- --}}
	{{-- --}}
	
	{{--
	{{ Form::model($order, array('route' => 'order.edit2', $order->id)) }} 
	{{-- Form::open(array('url' => '/orders/edit/')) --}}
	
	{{ Form::hidden('id',$order['id']); }}
	
	{{ 'Order #'.$order['id'].': Due on '.$order['due'].'<br>' }}
		
		@foreach($foods as $food)
				<hr>
				
				<h3>{{ $food->name }} </h3>
				<small>{{ $food->description }} </small>
				<br>
				{{ "$".$food->price.' '.$food->sold_by_desc }}
  				
				  <br><br>
				
				{{ Form::label('name', $food->name) }}	
				  {{-- @foreach($order_detail as $od)  --}}
				{{--	@if( $food->id == $od->food_id ) --}}
						{{-- Form::text($food->id, $od->quantity, array('id'=>'', 'class'=>'resizedTextbox')) --}}
						{{ Form::text($order->food()->id, $order->food()->quantity, array('id'=>'', 'class'=>'resizedTextbox')) }}
					{{--	@if ($flag = 1) @endif --}}
					{{--@endif --}}
				{{--  @endforeach --}}
				{{--  @if ($flag == 0) --}}
				{{--	{{ Form::text($food->id, '#', array('id'=>'', 'class'=>'resizedTextbox')) }} --}}
			{{--	  @endif --}}
			{{--	  @if ($flag = 0) @endif --}}
				  
			  
		@endforeach
		<hr>
		{{ Form::label('date', 'date & time needed') }}
		{{ Form::text('date_due', date_format($dt, 'm/d/Y'), array('id'=>'dt_picker', 'class'=>'')) }}
		{{ Form::text('time_due', date_format($dt, 'g:i A'), array('id'=>'dt_picker_alt', 'class'=>'')) }}
		
		
		{{-- TRYING TO WORK OUT DATETIMEPICKER PLUGIN HERE --}}
		{{-- Form::text('time', '', array('id'=>'alt_example_1_alt', 'class'=>'')) --}}
		{{-- <input id="datetimepicker" type="text" > --}}
		{{--<p>Enter your time: <input type="text" id="defaultEntry" size="10"></p> --}}
		<hr>
		{{ Form::label('comments', 'Comments') }}
		{{ Form::textarea('comments', $order->comments) }}
		{{ Form::hidden('status', 'open') }}
		<br><br>
		{{ Form::submit('Update my order!', array('id'=>'', 'class'=>'btn btn-primary btn-sm')); }}

	{{ Form::close() }}
	--}}
	<br>
	
	{{---- DELETE -----}}
	{{ Form::open(array('url' => '/orders/delete')) }}
		{{ Form::hidden('id',$order['id']); }}
		{{ Form::submit('Delete my order', array('id'=>'', 'class'=>'btn btn-primary btn-sm')) }}
	{{ Form::close() }}

@stop


