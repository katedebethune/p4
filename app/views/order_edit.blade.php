@extends('_master')

@section('title')
	Edit or Delete a Catering Order
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
<br>
<br>
<div class="non-index-container">
	<h1>Edit Catering Order #{{ $order['id'] }} </h1>
	<h3>{{ date_format($dt, 'l, F j, Y g:i A') }} </h3>
	<br>
	
	@if($errors->all())
		{{ 'Please correct the input errors listed below' }}
	@endif

	{{ Form::open(array('url' => '/orders/edit/')) }}
	
	{{ Form::hidden('id',$order['id']); }}
		
		@foreach($foods as $food)	
				<strong>{{ $food->name }} </strong>
				<br>
				{{ $food->description }} 
				<br>
				<strong>{{ "$".$food->price }} </strong> {{ ' '.$food->sold_by_desc }}
				<br>
				{{ Form::label($food->name, $food->name, array('class'=>'small')) }}
				{{-- COMPARE EACH $order_detail KEY WITH THE KEYS IN $foods; IF MATCH, POPULATE TEXT BOX --}}	
				@foreach($order_detail as $od) 
					@if( $food->id == $od->food_id )
						{{ Form::text($food->id, $od->quantity, array('id'=>'', 'class'=>'form-control form-control-inline')) }}
						{{ '<br>'.$errors->first($food->id) }}
						@if ($flag = 1) @endif
					@endif
				@endforeach
				@if ($flag == 0)
					{{ Form::text($food->id, '0', array('id'=>'', 'class'=>'form-control form-control-inline')) }}
					{{ '<br>'.$errors->first($food->id) }}
				@endif
				@if ($flag = 0) @endif
				{{-- @if($order_detail->contains($food->id)) --}}
			    {{-- @if($order_detail->food->contains($food->id))
					{{ 'A match was found' }}
					{{ Form::text($food->id, $order_detail->food(id)->quantity, array('id'=>'', 'class'=>'form-control form-control-inline')) }}
					{{ '<br>'.$errors->first($food->id) }}
				@else
					{{ 'A match was not found' }}
					{{ Form::text($food->id, '0', array('id'=>'', 'class'=>'form-control form-control-inline')) }}
					{{ '<br>'.$errors->first($food->id) }}
				@endif --}}
				<br>  
		@endforeach
		<br>
		{{ Form::label('date', 'Date & time needed') }}
		{{ Form::text('date_due', date_format($dt, 'm/d/Y'), array('id'=>'dt_picker', 'class'=>'')) }}
		{{ Form::text('time_due', date_format($dt, 'g:i A'), array('id'=>'dt_picker_alt', 'class'=>'')) }}
		<br>
		{{ $errors->first('date_due') }}
		{{ $errors->first('time_due') }}
		<br><br>
		{{ Form::label('comments', 'Comments') }}
		{{-- Form::textarea('comments', $order->comments) --}}
		{{ Form::textarea('comments', $order->comments, array('class'=>'form-control', 'rows'=>'3')) }}
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
	</div>

@stop

