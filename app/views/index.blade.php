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
	    	<div id="home" >
				<header class="clearfix">
						<!-- <h1><span class="glyphicon glyphicon-heart"></span></h1> -->
						<!-- <p>Judith's Kitchen</p> -->
						<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
						<!-- <p>Coming Soon to West Newton</p> -->
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
						<p class="lead">Construction is well under way and Judith’s Kitchen will be coming soon to West Newton!
						We are very excited to be a part of this wonderful neighborhood. We will be serving homemade prepared food for dining in and take out, including soups, rotisserie chickens, sandwiches, salads, grilled and roasted meats and fish, vegetarian entrees, side dishes, pastas, grains and beans, and an assortment of delicious comfort foods.
						We'll also offer coffee, tea, juices, and breakfast pastries for the morning commute!
						We look forward with great joy to becoming part of the West Newton community.</p>
					</div><!-- col-lg-6 -->
					<div class="col-lg-6">
						<h2>Chef Judith Kalish</h2>
						<p>Judith Kalish, a local chef and West Newton resident, 
						loves nothing more than preparing beautiful meals from fresh ingredients 
						for friends and family. A graduate of The New England Culinary Institute, 
						she has been working in the Boston restaurant scene since the early 1990s. 
						Judith worked as a cook at Hamersley’s Bistro for eight years and 
						later served as the founding chef of Orleans in Somerville. 
						She has also served as manager of prepared foods for Whole Foods Market, 
						and most recently as manager of prepared foods at 
						Foodie’s Urban Market in the South End.</p>
					</div><!-- col-lg-6 -->
				
				</div><!-- row -->
			</div><!-- id -->
		</div><!-- container -->
		
		
		{{-- NEW HANDCODED MENU SECTION 5/13/2015 --}}
	
		<!-- ==== SECTION DIVIDER1 -->
		<section class="section-divider textdivider divider1">
			<div class="container">
				<h1>GOURMET FOOD & WINE FROM OUR CAFE</h1>
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
					<h1 class="centered">JUDITH'S KITCHEN MENU</h1>
					<hr>
					<br>
					
					<div class="col-lg-offset-2 col-lg-8">
					
					<p>Judith's Kitchen is pleased to offer a regular daily menu 
					as well as a wide variety of seasonal specials made from the freshest, 
					locally-sourced ingredients.
					
					Our menu  includes prepared foods, soups, salads, sandwiches and breakfast 
					pastries as well as coffee & tea, wine & beer and other refreshing beverages.  
					
					 
					
					We are also delighted to offer artisanal breads, cookies, pastries and desserts
					from Iggy's, Pain d'Avignon, Bisousweet and other local bakeries. 
					</p>
					
					<p><strong>
					The following menu is a sampling of dishes we will be offering . . .
					</strong></p>
					
					<!-- regular daily items and a seasonal specials. The itesm you can count on
					plus lots of seasonal dishes.  -->	
					<!-- NEW DIV TO FACILITATING STRIPING 6/8/2015 -->
						<div id="menu-items">	
							<strong>Kale Salad</strong>
							<p>Kale, Shaved Parmesan Cheese, Garlic, Fresh Lemon Juice and Olive Oil </p>
					
							<strong>Greek Feta Salad</strong>
							<p>Chunks of Feta Cheese, Tomatoes, Cucumbers, Red Onions, Fresh Basil & Oregano, 
							Olive Oil</p>
							
						
							<strong>Turkey Sandwich</strong>
							<p>Boar's Head Oven Roasted Turkey, Basil Pesto, Hummus & Lettuce on Sourdough Bread </p>
						
							<strong>Curried Lentil Soup</strong>
							<p>Vegetarian Soup of Curried Lentils, Tomatoes and Spinach </p>
						
							<strong>Braised Leeks</strong>
							<p>Whole Leeks braised in White Wine and Lemon with Fennel Seeds, Thyme & Chili Flakes </p>
						
							<strong>Spicy Jambalaya</strong>
							<p>Spicy Chicken and Rice Dish with Sausage, Peppers, Onions and Tomatoes 
							cooked in Herbed Chicken Stock</p>
						
							<strong>Rotisserie Chicken</strong>
							<p>Whole Chicken marinated and roasted with Herbs and Spices </p>
						
							<strong>Grilled Salmon &#42;</strong>
							<p>Salmon Filet seasoned with Salt & Pepper and grilled to medium rare  </p>
						
							<strong>Chicken Salad</strong>
							<p>Roasted Chicken Breast cooked in the oven until tender, tossed with Celery, Onions, Parsley, 
							Olive Oil and Mayonnaise</p>
						
							<strong>Sauteed Greens</strong>
							<p>Sauteed Greens of the day with Garlic and Olive Oil  </p>
						
							<!-- 
							<strong>Comfort Foods</strong>
							<br>
							<p>Chicken Salad &#9900; Tuna Salad &#9900; Potato Salad &#9900; Cole Slaw</p>
						
							<strong>Sandwiches</strong>
							<br>
							<p>Turkey & Cheese &#9900; Ham & Cheese &#9900; Roast Beef & Boursin &#9900; Vegetarian</p>
						
							<strong>Panini</strong>
							<br>
							<p>Cubano &#9900; Smoked Ham &#9900; BBQ Chicken &#9900; Caprese &#9900; Eggplant & Tomato &#9900; Grilled Cheese &#9900; Chicken BLT &#9900; Sausage, Marinara Sauce, Peppers & Onions</p>
						
							<strong>Salads</strong>
							<br>
							<p>Sauteed Greens &#9900; Kale Salad &#9900; Mushroom Salad &#9900; Grain Salads &#9900; Pasta Salads &#9900; Bean Salads &#9900; Fresh Mozzarella & Tomato &#9900; Greek Feta, Tomato, & Cucumber</p>
						
							<strong>Pastas</strong>
							<br>
							<p>Lasagna &#9900; Tortellini Salad &#9900; Assorted Pasta Salads &#9900; Ravioli &#9900; Gnocchi</p>
						
							<strong>Entrees</strong>
							<br>
							<p>Grilled Flank Steak&#42; &#9900; Grilled & Sauteed Salmon&#42; &#9900; Sauteed Shrimp &#9900; Roasted Turkey Breast &#9900; Grilled Chicken Breast &#9900; Roasted Pork Loin&#42; &#9900; Baked White Fish </p>
						
							<strong>Breakfast Sandwiches</strong>
							<br>
							<p>Egg, Spinach, & Cheese &#9900; Bacon, Egg, & Cheddar</p>
						
							<strong>Pastries</strong>
							<br>
							<p>Croissants &#9900; Muffins &#9900; Scones &#9900; Bagels &#9900; Sticky Buns</p>
							-->
						</div> <!-- END NEW menu-items DIV -->
					
						<small>&#42; These items may be served raw or undercooked. Consuming raw or 
						undercooked fish or meat may increase your risk of foodborne illness.</small>
						
						
					</div><!-- col-lg -->
				</div><!-- row -->
				<br />
				<p>Download a {{ link_to('/assets/pdf/JK-MENU.pdf', 'printable copy') }} of this menu</p>
						<img src="{{asset('assets/img/jk-menu-snap.jpg')}}" >
			</div><!-- id -->
		</div><!-- container -->
		{{-- END NEW HANDCODED MENU --}}
		
		{{-- ORIGINAL MENU GENERATION - Currently non-operational - reactivate to use database-driven menu (5/14/2015) --}}
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
		--}}
  		
		
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
			<p> catering content goes here </p>
				<!--div class="row white centered"-->
				{{-- 
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
				
				--}}
			</div><!-- id -->
		</div><!-- container -->
		<!-- END CATERING MENU -->
		
		
		<!-- ==== SECTION DIVIDER6 ==== -->
		<section class="section-divider textdivider divider6">
			<div class="container">
				<h1>THANKS FOR VISITING</h1>
				<hr>
				<p>We can't wait to open our doors!</p>
				<!-- <p>617-xxx-xxxx</p>  -->
				<!-- <p><a class="icon icon-twitter" href="#"></a> | <a class="icon icon-facebook" href="#"></a></p> -->
				<p><a class="icon icon-twitter" style="color:#ffffff;" href="https://twitter.com/judiths_kitchen"> @judiths_kitchen </a> 
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
							<!-- <span class="icon icon-phone"></span> phone: 617-916-9282 <br/> -->
							<!-- <span class="icon icon-phone"></span> fax: 617-916-9285 <br/> -->
							<!-- <span class="icon icon-envelop"></span> <a href="#"> info@jennys-kitchen.com</a> <br/> -->
							<span class="icon icon-twitter"></span> <a href="https://twitter.com/judiths_kitchen"> @judiths_kitchen </a> <br/>
							<!-- <span class="icon icon-facebook"></span> <a href="#"> Jenny's Kitchen </a> <br/> -->
						</p>
					</div><!-- col -->
				</div><!-- row -->
			</div><!-- id -->
		</div><!-- container -->

{{-- END OF SHIELD THEME --}}


@stop

