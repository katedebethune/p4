@extends('_master')

@section('title')
	Your Orders for 
@stop

@section('content')

	<h1>Orders for {{-- Auth::user()->firstname; --}} {{-- Auth::user()->lastname; --}}</h1>

	Hello
	
	{{ $orders }}


@stop