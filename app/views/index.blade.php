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
	@foreach($foods as $food)
	 @if ($food->menu_code == 'cafe' || $food->menu_code == 'both')
  <hr>
  {{ $food->name }} 
  <br><br>
  {{ $food->description }}
  <br><br>
  {{ $food->price }}
  
 
	  @if ($food->sold_by == 'weight' )
		per pound
	  @elseif ( $food->sold_by == 'unit' )
		each
	  @else
		per ounce
	  @endif
  @endif
  
 
  
  {{--
  <div class="row">
    
    <div class="col-md-12">
    @for ($i=1; $i <= 5 ; $i++)
      <span class="glyphicon glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
    @endfor
    --}}

    
    {{--
    {{ $review->user ? $review->user->name : 'Anonymous'}} <span class="pull-right">{{$review->timeago}}</span> 

    <p>{{{$review->comment}}}</p> 
    </div>
     
    
  </div>
  --}}
@endforeach

<h2>Catering</h2>
  <h3>Catering Menu</h3>
   @foreach($foods as $food)
	 @if ($food->menu_code == 'catering' || $food->menu_code == 'both')
	  <hr>
	  {{ $food->name }} 
	  <br><br>
	  {{ $food->description }}
	  <br><br>
	  {{ $food->price }}
  
  	  @if ($food->sold_by == 'unit' && $food->menu_code == 'catering')
  		per person 
	  @elseif ($food->sold_by == 'weight' )
		per pound
	  @elseif ( $food->sold_by == 'unit' )
		each
	  @else
		per ounce
	  @endif
  @endif
  
@endforeach

   
  
  <h2>Contact</h2>
	
	{{--
	{{ Form::open(array('url' => '/book', 'method' => 'GET')) }}

		{{ Form::label('query','Search') }}

		{{ Form::text('query'); }}

		{{ Form::submit('Search'); }}

	{{ Form::close() }}
	--}}

@stop