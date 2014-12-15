@extends('_master')

@section('title')
	Log in
@stop

@section('content')

{{ HTML::nav_open() }}
  		@if(Auth::check())
  			{{ HTML::nav_other_auth() }}
  		@else
  			{{ HTML::nav_other_non_auth() }}
  		@endif
{{ HTML::nav_close() }}
  		


<br><br>
<div class="non-index-container">
<h1>Sign up</h1>

<br>


@foreach($errors->all() as $message)
	<div class='error'>{{ $message }}</div>
@endforeach


{{ Form::open(array('url' => '/signup')) }}

     
		{{ Form::label('firstname') }}
		{{ Form::text('firstname') }}
	
    
		{{ Form::label('lastname') }}
		{{ Form::text('lastname') }}
	
	
		{{ Form::label('email') }}
		{{ Form::text('email') }}
	
	
		{{ Form::label('password') }}
		{{ Form::password('password') }}
		<small>Min 6 characters</small>
    

    {{ Form::submit('Submit') }}

{{ Form::close() }}

</div>

@stop

