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

<h1>Log in</h1>
<br>

{{ Form::open(array('url' => '/login')) }}

    {{ Form::label('email') }}
    {{ Form::text('email','kdebethune@gmail.com') }}

    {{ Form::label('password') }}
    {{ Form::password('password') }}

    {{ Form::submit('Submit') }}

{{ Form::close() }}

</div>

@stop