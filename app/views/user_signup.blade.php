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

     	<fieldset>
		<div class="form-group">
		{{ Form::label('firstname') }}
		{{ Form::text('firstname', '', array('class'=>'form-control')) }}
		</div>
	
    	<div class="form-group">
		{{ Form::label('lastname') }}
		{{ Form::text('lastname', '', array('class'=>'form-control')) }}
		</div>
	
		<div class="form-group">
		{{ Form::label('email') }}
		{{ Form::text('email', '', array('class'=>'form-control')) }}
		</div>
	
		<div class="form-group">
		{{ Form::label('password') }}
		{{ Form::password('password', array('class'=>'form-control')) }}
		<small>Min 6 characters</small>
		</div>
		
    

    {{ Form::submit('Submit') }}
    </fieldset>

{{ Form::close() }}

</div>

@stop


