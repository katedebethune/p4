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

@foreach($errors as $message)
	<div class='error'>{{ $message }}</div>
@endforeach

<h1>Log in</h1>
<br>
{{ Form::open(array('url' => '/login')) }}
	<fieldset>
	<div class="form-group">
    {{ Form::label('email') }}
    {{ Form::text('email','', array('class'=>'form-control')) }}
    </div>
	<div class="form-group">
    {{ Form::label('password') }}
    {{ Form::password('password', array('class'=>'form-control')) }}
	</div>
    {{ Form::submit('Submit') }}
    </fieldset>

{{ Form::close() }}

</div>
<br>
<br>
<br>
<br>
<br>

@stop