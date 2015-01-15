@extends('_master')

@section('title')
	Welcome to Judith&#39;s Kitchen - Gourmet Prepared Foods in Newton, MA
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
						<p>Judith's Kitchen</p>
						<p>Coming Soon to West Newton</p>
				</header>
			</div><!-- /home -->	    
	    </div><!-- /headerwrap -->

		<!-- ==== ABOUT ==== -->
		<!-- div class="container" id="about" name="about"-->
		<div class="container" data-name="about">
			<div id="about">
				<div class="row white">
				<br>
					<h1 class="centered">CONSTRUCTION IS UNDER WAY!</h1>
					<hr>
				
					<div class="col-lg-6">
						<p class="lead">Construction is well under way and Judith’s Kitchen will be coming soon to the West Newton!
						We are very excited to be a part of this wonderful neighborhood. We will be serving homemade prepared food for dining in and take out, including soups, rotisserie chickens, sandwiches, salads, grilled and roasted meats and fish, vegetarian entrees, side dishes, pastas, grains and beans, and an assortment of delicious comfort foods.
						We'll also offer coffee, tea, juices, and breakfast pastries for the morning commute!
						We look forward with great joy to becoming part of the West Newton community.</p>
					</div><!-- col-lg-6 -->
					
					<div class="col-lg-6">
						<h2>Chef Judith Kalish</h2>
						<p>Judith Kalish, a local chef and West Newton resident, will be opening Judith’s Kitchen, a cafe located in the storefront that was formerly Keltic Krust in West Newton Center. Judith's Kitchen will offer fresh, simply-prepared entrees, sides, soups, salads, and sandwiches both to go and for dining in. Kalish, a graduate of New England Culinary Institute, has been working in the Boston restaurant scene since the early 1990s. She was as a cook at Hamersley’s Bistro for seven years, and then later served as the founding chef of Orleans in Davis Square, Somerville.
						She has served as the manager of prepared foods for the Whole Foods Market in Alewife, and most recently as the manager of prepared foods for Foodie’s Urban Market in the South End. </p>
					</div><!-- col-lg-6 -->
				
				</div><!-- row -->
			</div><!-- id -->
		</div><!-- container -->
		
		{{--
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
				
				@if(!Auth::check())
					<div class="centered">
						<a class="btn btn-primary btn-lg" href="orders/create">Login or Sign up to place a catering order</a>
					</div>
				@else
					<div class="centered">
						<a class="btn btn-primary btn-lg" href="orders/create">Place a catering order</a>
					</div>
				@endif
				
			</div><!-- id -->
		</div><!-- container -->
		<!-- END CATERING MENU -->
		--}}
		<!-- ==== SECTION DIVIDER6 ==== -->
		<section class="section-divider textdivider divider6">
			<div class="container">
				<h1>THANKS FOR VISITING</h1>
				<hr>
				<p>We can't wait to open our doors!</p>
				<!-- <p>617-xxx-xxxx</p> -->
				<!-- <p><a class="icon icon-twitter" href="#"></a> | <a class="icon icon-facebook" href="#"></a></p> -->
			</div><!-- container -->
		</section><!-- section -->
		
		<div class="container" data-name="contact">
			<div id="contact">
				<div class="row">
				<br>
					<h1 class="centered">JOIN OUR MAILING LIST</h1>
					<hr>
					<h2 class="centered">
						<a href="/signup">Sign up here</a> and we'll invite you to our grand opening!
					</h2>
					<p class="centered">
						We won't sell, trade, or otherwise abuse your email in any way. We'll just use it to notify you of our opening activities and then we'll give you the opportunity to opt-in again for recurring specials and news.
					</p>
					
					<br>
					<br>
					<div class="col-lg-4">
						<h3>Coming this spring to:</h3>
						<p><span class="icon icon-home"></span> 1371 Washington Street, West Newton, MA 02465<br/>
							<!-- <span class="icon icon-phone"></span> 617-xxx-xxxx <br/> -->
							<!-- <span class="icon icon-envelop"></span> <a href="#"> info@jennys-kitchen.com</a> <br/> -->
							<!-- <span class="icon icon-twitter"></span> <a href="#"> @jennys-kitchen </a> <br/> -->
							<!-- <span class="icon icon-facebook"></span> <a href="#"> Jenny's Kitchen </a> <br/> -->
						</p>
					</div><!-- col -->
				</div><!-- row -->
			</div><!-- id -->
		</div><!-- container -->

{{-- END OF SHIELD THEME --}}


@stop

