@extends('_master')

@section('title')
	Welcome to Jenny&#39;s Kitchen - Gourmet Prepared Foods in Newton, MA
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
{{-- START OF SHIELD THEME --}}
		<!-- ==== HEADERWRAP ==== -->
	    <!-- div id="headerwrap" id="home" name="home"-->
	    <div id="headerwrap" data-name="home">
	    	<div id="home">
				<header class="clearfix">
						<h1><span class="glyphicon glyphicon-heart"></span></h1>
						<p>Jenny's Kitchen</p>
						<p>Bistro-Style Cooking from the Heart</p>
				</header>
			</div><!-- /home -->	    
	    </div><!-- /headerwrap -->

		<!-- ==== ABOUT ==== -->
		<!-- div class="container" id="about" name="about"-->
		<div class="container" data-name="about">
			<div id="about">
				<div class="row white">
				<br>
					<h1 class="centered">A LITTLE BIT ABOUT US</h1>
					<hr>
				
					<div class="col-lg-6">
						<p>Lobortis luctus aliquam egestas a phasellus bibendum tempus mattis quisque volutpat congue, dolor phasellus eleifend lacus ut conubia ultrices ut litora purus lacus, non malesuada ultricies malesuada justo risus condimentum iaculis sociosqu molestie. Sodales nunc ut risus tellus ut accumsan in laoreet tincidunt enim, quisque consectetur tempus per fermentum bibendum porta commodo neque ante, blandit ultrices phasellus duis egestas sed inceptos ultrices elementum. Tempus nullam eget velit eros arcu gravida conubia proin eu, dui phasellus orci aliquet imperdiet sociosqu feugiat in at nam, et enim dictum lectus ut suscipit orci habitasse. Odio facilisis cubilia suspendisse curae ac ligula nostra, volutpat ipsum sapien eros augue dui sociosqu habitasse, eu suspendisse sem aliquet scelerisque ad.</p>
					</div><!-- col-lg-6 -->
				
					<div class="col-lg-6">
						<p>Nostra dui nam nunc quisque cras aliquam magna lacus fames dolor, quisque nulla eu sit fermentum mollis consectetur maecenas. Cursus interdum pellentesque turpis vehicula maecenas aliquam commodo justo, convallis conubia nullam felis habitant tincidunt suscipit, aenean fermentum elit quis consequat neque augue. </p>
					</div><!-- col-lg-6 -->
				</div><!-- row -->
			</div><!-- id -->
		</div><!-- container -->
		
		<!-- ==== SECTION DIVIDER1 -->
		<section class="section-divider textdivider divider1">
			<div class="container">
				<h1>GOURMET FOODS FROM OUR CAFE</h1>
				<hr>
				<p>Entrees, sides, soups, salads, sandwiches, and sweets for dining in or to go.</p>
			</div><!-- container -->
		</section><!-- section -->
		
		
		<!-- ==== MENU ==== -->
		<div class="container" data-name="menu">
			<div id="menu">
				<br>
				<br>
				<div class="row">
					<h2 class="centered">CAFE MENU</h2>
					<hr>
					<br>
					<div class="col-lg-offset-2 col-lg-8">	
							@foreach($cafe_menu as $food)
								<strong> {{ $food->name }} </strong>
								<br>
								{{ $food->description }}
								<br>
								<strong>{{ '$'.$food->price }}</strong>{{' '.$food->sold_by_desc }}
								<br><br>
							@endforeach

					</div><!-- col-lg -->
				</div><!-- row -->
			</div><!-- id -->
		</div><!-- container -->
  		

		<!-- ==== SECTION DIVIDER2 -->
		<section class="section-divider textdivider divider2">
			<div class="container">
				<h1>CATERING</h1>
				<hr>
				<p>Fresh, delicious prepared foods for business lunches and festive events! Order online.</p>
			</div><!-- container -->
		</section><!-- section -->

		<!-- ==== CATERING SERVICES ==== -->
		<div class="container"  data-name="catering">
			<div id="catering">
			<br>
				<!--div class="row white centered"-->
				<div class="row">
					<h1 class="centered">CATERING MENU</h1>
					<hr>
					<br>
					@if(!Auth::check())
					<div class="centered">
						<a class="btn btn-primary btn-lg" href="orders/create">Login or Sign up to place a catering order</a>
					</div>
					@else
					<div class="centered">
						<a class="btn btn-primary btn-lg" href="orders/create">Place a catering order</a>
					</div>
					@endif
					<br>
					<div class="col-lg-offset-2 col-lg-8">
						@foreach($catering_menu as $food)
								<strong> {{ $food->name }} </strong>
								<br>
								{{ $food->description }}
								<br>
								<strong>{{ '$'.$food->price }}</strong>{{' '.$food->sold_by_desc }}
								<br><br>
							@endforeach
					</div><!-- col-lg -->
				</div><!-- row -->
				{{-- 
				@if(!Auth::check())
					<div class="centered">
						<a class="btn btn-primary btn-lg" href="orders/create">Login or Sign up to place a catering order</a>
					</div>
				@else
					<div class="centered">
						<a class="btn btn-primary btn-lg" href="orders/create">Place a catering order</a>
					</div>
				@endif
				--}}
			</div><!-- id -->
		</div><!-- container -->
		<!-- END CATERING MENU -->

		<!-- ==== SECTION DIVIDER6 ==== -->
		<section class="section-divider textdivider divider6">
			<div class="container">
				<h1>COME SEE US IN WEST NEWTON!</h1>
				<hr>
				<p>xxxx Washington Street, West Newton, MA 02465</p>
				<p>617-xxx-xxxx</p>
				<p><a class="icon icon-twitter" href="#"></a> | <a class="icon icon-facebook" href="#"></a></p>
			</div><!-- container -->
		</section><!-- section -->
		
		<div class="container" data-name="contact">
			<div id="contact">
				<div class="row">
				<br>
					<h1 class="centered">THANKS FOR VISITING</h1>
					<hr>
					<br>
					<br>
					<div class="col-lg-4">
						<h3>Contact Information</h3>
						<p><span class="icon icon-home"></span> xxxx Washington Street, West Newton, MA 02465<br/>
							<span class="icon icon-phone"></span> 617-xxx-xxxx <br/>
							<!-- <span class="icon icon-mobile"></span> +34 59855 9853 <br/> -->
							<span class="icon icon-envelop"></span> <a href="#"> info@jennys-kitchen.com</a> <br/>
							<span class="icon icon-twitter"></span> <a href="#"> @jennys-kitchen </a> <br/>
							<span class="icon icon-facebook"></span> <a href="#"> Jenny's Kitchen </a> <br/>
						</p>
					</div><!-- col -->
				</div><!-- row -->
			</div><!-- id -->
		</div><!-- container -->

{{-- END OF SHIELD THEME --}}


@stop

