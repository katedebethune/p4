@extends('_master')

@section('title')
	Welcome to Judith's Kitchen - Gourmet Prepared Foods in West Newton, MA 02465
@stop

@section('head')

@stop

@section('content')
@yield('nav')
  		{{ HTML::nav_open() }}
  		@if(Auth::check())
  			{{ HTML::nav_index_auth() }}
  		@else
  			{{ HTML::nav_index_non_auth() }}
  		@endif
  		{{ HTML::nav_close() }}

<br>
<h1>Judith's Kitchen</h1>
<h2>About</h2>
<h2>Cafe Menu</h2>
	@foreach($cafe_menu as $food)
  {{ $food->name }} 
  <br><br>
  {{ $food->description }}
  <br><br>
  {{ '$'.$food->price.' '.$food->sold_by_desc }}

@endforeach

<h2>Catering</h2>
  <h3>Catering Menu</h3>
   @foreach($catering_menu as $food)
	  {{ $food->name }} 
	  <br><br>
	  {{ $food->description }}
	  <br><br>
	  {{ '$'.$food->price.' '.$food->sold_by_desc }}
@endforeach
<br>

@if(!Auth::check())
<a class="btn btn-primary btn-lg" href="orders/create">Login or Sign up to place a catering order</a>
@else
<a class="btn btn-primary btn-lg" href="orders/create">Place a catering order</a>
@endif

  <h2>Contact</h2>

@stop