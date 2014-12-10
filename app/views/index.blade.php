@extends('_master')

@section('title')
	Welcome to Foobooks
@stop

@section('head')

@stop

@section('content')

<h1>Judith's Kitchen</h1>
<h2>About</h2>
<h2>Cafe Menu</h2>
	@foreach($cafe_menu as $food)
  <hr>
  {{ $food->name }} 
  <br><br>
  {{ $food->description }}
  <br><br>
  {{ '$'.$food->price.' '.$food->sold_by_desc }}

@endforeach

<h2>Catering</h2>
  <h3>Catering Menu</h3>
   @foreach($catering_menu as $food)
	  <hr>
	  {{ $food->name }} 
	  <br><br>
	  {{ $food->description }}
	  <br><br>
	  {{ '$'.$food->price.' '.$food->sold_by_desc }}
  
@endforeach

  <h2>Contact</h2>

@stop