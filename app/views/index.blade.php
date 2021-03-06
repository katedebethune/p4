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
						<br /><br />
						<h1>{{HTML::image('assets/img/logo-sm-2.png') }} <br>
						Welcome to Judith's Kitchen</h1>
						{{-- HTML::image('assets/img/logo-sm-2.png') --}}
						<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
						<!-- <p>Coming Soon to West Newton</p>  -->
				</header>
			</div><!-- /home -->	    
	    </div><!-- /headerwrap -->

		<!-- ==== ABOUT ==== -->
		<!-- div class="container" id="about" name="about"-->
		<div class="container" data-name="about">
			<div id="about">
				<div class="row white">
				<br>
					
					<h1 class="centered">ABOUT JUDITH'S KITCHEN</h1>
					
					<hr>
					<div class="col-lg-offset-2 col-lg-8">
					<!-- <div class="col-lg-6"> -->
						<p class="lead">Judith's Kitchen is a market and cafe in West Newton, MA dedicated to providing fresh, delicious prepared foods
						from the finest locally-sourced ingredients. We offer prepared foods, artisanal baked goods, fine wine and beer,
						and a whole range of delectable, wholesome dishes for you and your family. </p>
					</div> <!-- col-lg-6 --> 

					
					<br />
					<div class="col-lg-offset-2 col-lg-8">
					<!-- <div class="col-lg-6"> -->
						<h2>Chef Judith Kalish</h2>
						<p>Judith Kalish, a local chef and West Newton resident, 
						loves nothing more than preparing beautiful meals from fresh ingredients 
						for friends and family. A graduate of The New England Culinary Institute, 
						she has been working in the Boston restaurant scene since the early 1990s. 
						Judith worked as a cook at Hamersley’s Bistro for eight years and 
						later served as the founding chef of Orleans in Somerville. 
						She has also served as manager of prepared foods for Whole Foods Market, 
						and most recently as manager of prepared foods at 
						Foodie’s Urban Market in the South End. 
					</div>  <!-- col-lg-6 -->
					

				
				<!--
					<h1 class="centered">WINE TASTING TONIGHT FROM 5:00 TO 8:00</h1>
				<hr>
				<div class="col-lg-6 centered">
						<img src="assets/img/bg/IMAG0402.jpg" alt="Judith's Kitchen Wine Tasting October 16th, 5 - 8 PM" height="711" width="400">
						<p>Stop by on your way home from work and enjoy selections from our wine collection!</p>		
				</div>
				-->
				
				
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

					<h4>Irish Baked Goods from Montgomery's Authentic Irish Breads</h4>
					<div class="floatright">
					 {{HTML::image('assets/img/murphy_sign.png') }} 
					
					
						{{HTML::image('assets/img/bread.png') }}
					</div>
					<p>Judith's Kitchen is delighted to offer authentic Irish baked goods from the kitchen of David McGimpsey, the original owner
					of the Keltic Krust. We will be selling some of his classic offerings including <strong>Irish Brown Bread 
					</strong>and <strong>Scones</strong>. These are the original baked goods offered by the Keltic Krust back when it started in the 1990s.
					Available on Saturday and Sunday only. </p>
					
					<div class="clearfloat"> </div>
					
					
					<!-- regular daily items and a seasonal specials. The itesm you can count on
					plus lots of seasonal dishes.  -->	
					<!-- NEW DIV TO FACILITATING STRIPING 6/8/2015 -->
					
						<div class="col-lg-offset-2 col-lg-8 centered">
						<h2>DAILY OFFERINGS</h2>
						<br/>
						</div>
						<div class="col-md-4 menu-list">
						
						<ul>
							<li>Chicken Salad</li>
							<li>Tuna Salad</li>
							<li>Kale Salad</li>
						</ul>
					</div>

					<div class="col-md-4 menu-list">
						<ul>
							<li>Grilled Flank Steak</li>
							<li>Roasted Turkey Breast</li>
							<li>Grilled Salmon</li>
						</ul>
					</div>

					<div class="col-md-4 menu-list">
						<ul>
							<li>Greens of the Day</li>
							<li>Soup of the Day</li>
							<li>Potatoes</li>
						</ul>
					</div>


					<div class="col-lg-offset-2 col-lg-8 centered">
						<p>&nbsp;</p>
						<h2>ROTATING ITEMS</h2>
						<br />
						</div>
						<div class="col-md-4 menu-list">
						<ul>
							<li>Grains & Beans</li>
							<li>Meatballs</li>
							<li>Chicken Loaf</li>
							<li>Pasta Salad</li>
							<li>Lasagna</li>
							<li>Swordfish</li>
							<li>Steak Tips</li>
						</ul>
					</div>

					<div class="col-md-4 menu-list">
						<ul>
							<li>Corn Salad</li>
							<li>Tomato Mozzarella Salad</li>
							<li>Winter Squash Salad</li>
							<li>Fennel Salad</li>
							<li>Mango Salad</li>
							<li>Cole Slaw</li>
							<li>Egg Salad</li>
						</ul>
					</div>

					<div class="col-md-4 menu-list">
						<ul>
							<li>Roasted Eggplant Salad</li>
							<li>Beet Salad</li>
							<li>Artichoke Salad</li>
							<li>Grilled Chicken Breast</li>
							<li>Grape Leaves</li>
							<li>Stuffed Cabbage</li>
							<li>Potato Salad</li>
						</ul>
					</div>


				

					
					<!--
					<p><strong>
					The following menu is a sampling of the dozens of dishes on offer . . .
					</strong></p> 
						<div id="menu-items">	
							<strong>Kale Salad</strong>
							<p>Kale, Shaved Parmesan Cheese, Garlic, Fresh Lemon Juice and Olive Oil </p>
					
							<strong>Greek Feta Salad</strong>
							<p>Chunks of Feta Cheese, Tomatoes, Cucumbers, Red Onions, Fresh Basil and Oregano, 
							Olive Oil</p>
							
						
							<strong>Turkey Sandwich</strong>
							<p>Boar's Head Oven Roasted Turkey, Basil Pesto, Hummus and Lettuce on Sourdough Bread </p>
						
							<strong>Curried Lentil Soup</strong>
							<p>Vegetarian Soup of Curried Lentils, Tomatoes and Spinach </p>
						
							<strong>Braised Leeks</strong>
							<p>Whole Leeks braised in White Wine and Lemon with Fennel Seeds, Thyme and Chili Flakes </p>
						
							<strong>Rotisserie Chicken</strong>
							<p>Whole Chicken marinated and roasted with Herbs and Spices </p>
						
							<strong>Grilled Salmon &#42;</strong>
							<p>Salmon Filet seasoned with Salt and Pepper and grilled to medium rare  </p>
						
							<strong>Chicken Salad</strong>
							<p>Roasted Chicken Breast cooked in the oven until tender, tossed with Celery, Onions, Parsley, 
							Olive Oil and Mayonnaise</p>
						
							<strong>Sauteed Greens</strong>
							<p>Sauteed Greens of the day with Garlic and Olive Oil  </p>
					
						</div> <!-- END NEW menu-items DIV -->
					
						<!--
						<small>&#42; These items may be served raw or undercooked. Consuming raw or 
						undercooked fish or meat may increase your risk of foodborne illness.</small> -->
						<!--
						<br />
						<br />
						<p>Download a {{ link_to('/assets/pdf/JK-MENU.pdf', 'printable copy') }} of this menu</p>
						<img src="{{asset('assets/img/jk-menu-snap.jpg')}}" >
						<br />
						<br /> -->
					</div><!-- col-lg -->
				</div><!-- row -->
			</div><!-- id -->
		</div><!-- container -->
		<br />
		
		{{-- END NEW HANDCODED MENU --}}

		{{-- THANKSGIVING MENU 10/27/2016 --}}
		
		
		
		{{-- END THANKSGIVING MENU 10/27/2016 --}}
		

		
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
  		
		{{-- CATERING SECTION --}}
		{{--
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
		
		<!-- ==== SECTION DIVIDER3 === -->
		<section class="section-divider textdivider divider3">
			<div class="container">
				<h1>CATERING</h1>
				<hr>
				<p>Fresh, delicious prepared foods for your next business lunch and festive event!</p>
			</div><!-- container -->
		</section><!-- section -->
		
		<!-- ==== CATERING ==== -->
		<!-- <div class="container" id="portfolio" name="portfolio"> -->
		<div class="container"  data-name="catering">
			<div id="catering">
		<br>
			<div class="row">
				<br>
				<h1 class="centered">JUDITH'S KITCHEN CATERING</h1>
				<hr>
				<br>
				<br>
			</div><!-- /row -->
			<div class="container">
			<div class="row">	
			
				<!-- PORTFOLIO IMAGE 1 -->
				<div class="col-md-4 ">
			    	<div class="grid mask">
						<figure>
							<img class="img-responsive" src="assets/img/bg/IMG_6506.JPG" alt="">
							<figcaption>
								<h5>PLATTERS</h5>
								<a data-toggle="modal" href="#myModal1" class="btn btn-primary btn-sm">details</a>
							</figcaption><!-- /figcaption -->
						</figure><!-- /figure -->
			    	</div><!-- /grid-mask -->
				</div><!-- /col -->
				
				
						 <!-- MODAL FOR CHEESE PLATTER -->
						      
						  <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						    <div class="modal-dialog">
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						          <h4 class="modal-title">CHEESE PLATTER</h4>
						        </div>
						        <div class="modal-body">
						          <p><img class="img-responsive" src="assets/img/bg/IMG_6506.JPG" alt=""></p>
						          <p>Cheese, cracker, and fruit platter. Small serves 12 to 15 ($45), Medium serves 16 to 20 ($60), and Large serves 20 to 25 ($75).</p>
						          <!-- <p><b><a href="#">Visit Site</a></b></p> -->
						        </div>
						        <div class="modal-footer">
						          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        </div>
						      </div><!-- /.modal-content -->
						    </div><!-- /.modal-dialog -->
						  </div><!-- /.modal -->
				
				
				<!-- PORTFOLIO IMAGE 2 -->
				<div class="col-md-4">
			    	<div class="grid mask">
						<figure>
							<img class="img-responsive" src="assets/img/bg/IMG_5005.JPG" alt="">
							<figcaption>
								<h5>SANDWICHES</h5>
								<a data-toggle="modal" href="#myModal2" class="btn btn-primary btn-sm">details</a>
							</figcaption><!-- /figcaption -->
						</figure><!-- /figure -->
			    	</div><!-- /grid-mask -->
				</div><!-- /col -->
				
						<!-- MODAL FOR SANDWICH PLATTER  -->
						      
						  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						    <div class="modal-dialog">
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						          <h4 class="modal-title">SANDWICH PLATTERS</h4>
						        </div>
						        <div class="modal-body">
						          <p><img class="img-responsive" src="assets/img/bg/IMG_5005.JPG" alt=""></p>
						          <p>Sandwiches are wrapped in Flour Tortillas and served in halves. 
						          Halves are substantial and usually enough to serve one person. Small (4 sandwiches) $45, 
						          Medium (8 sandwiches) $85, and Large (12 sandwiches) $125.
 								  </p>
						          <!-- <p><b><a href="#">Visit Site</a></b></p> -->
						        </div>
						        <div class="modal-footer">
						          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        </div>
						      </div><!-- /.modal-content -->
						    </div><!-- /.modal-dialog -->
						  </div><!-- /.modal -->
				
				<!-- PORTFOLIO IMAGE 3 -->
				<div class="col-md-4">
			    	<div class="grid mask">
						<figure>
							<img class="img-responsive" src="assets/img/bg/IMG_2375.JPG" alt="">
							<figcaption>
								<h5>SALADS</h5>
								<a data-toggle="modal" href="#myModal3" class="btn btn-primary btn-sm">details</a>
							</figcaption><!-- /figcaption -->
						</figure><!-- /figure -->
			    	</div><!-- /grid-mask -->
				</div><!-- /col -->
			</div><!-- /row -->
			
					<!-- MODAL FOR SALADS  -->
						      
						  <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						    <div class="modal-dialog">
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						          <h4 class="modal-title">SALADS</h4>
						        </div>
						        <div class="modal-body">
						          <p><img class="img-responsive" src="assets/img/bg/IMG_2375.JPG" alt=""></p>
						          <p>Choose from our most popular salads - Pasta, Kale, Caesar or Mixed Greens. Other options also available. 
						           Small serves 12, medium serves 16, and large serves 24. Prices vary depending on salad.
 								  </p>
						          <!-- <p><b><a href="#">Visit Site</a></b></p> -->
						        </div>
						        <div class="modal-footer">
						          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        </div>
						      </div><!-- /.modal-content -->
						    </div><!-- /.modal-dialog -->
						  </div><!-- /.modal -->

			
			
			</div><!-- /row -->
			<p>We offer a catering for any type of event from business luncheons to cocktail parties. Call us today at <strong>617-916-9282</strong> to discuss your catering needs.</p>
		</div><!-- /row -->
	</div><!-- /container -->
		
		<!-- ==== SECTION DIVIDER4 ==== -->
		<section class="section-divider textdivider divider4">
			<div class="container" >
				<h1>CURRENTLY ON VIEW</h1>
				<hr>
				<p>Occasional Exhibitions by Local Artists</p>
			</div><!-- container -->
		</section><!-- section -->
		
		<div class="container" data-name="on-view">
			<div id="on-view">
				<div class="row">
				<br>
					<h1 class="centered">JIM YOUNGERMAN</h1>
					<hr>
					<div class="col-lg-offset-2 col-lg-8">
					<!-- <div class="col-lg-6"> -->
						<p>Judith’s Kitchen is pleased to present the work  
						<a href="http://www.jimyoungerman.com/" target="blank">Jim Youngerman</a>. Youngerman's work has 
						been exhibited throughout the United States and Europe for more than four decades. His paintings 
						and drawings use simple lines in a lyrical, figurative, quasi-cartoon style to expose paradox and 
						probe the deeper meaning of his subjects. <em>Arts Magazine</em> said " . . . his caricture style of drawing
						reinforces the presence of a strange imagination" and <em>Art News</em> characterized his work as ". . . true
						American surrealism in it's influences - from comic strips to de Chirico."  On display througout the summer - please
						come in and check it out!</p>
					</div>
				</div><!-- row -->
			</div><!-- id -->
		</div><!-- container -->

		<!-- ==== SECTION DIVIDER6 ==== -->
		<section class="section-divider textdivider divider6">
			<div class="container" >
				<h1>THANKS FOR VISITING</h1>
				<hr>
				<p>Call us at: 617-916-9282</p>
				<p><a class="icon icon-twitter" href="https://twitter.com/judiths_kitchen"></a> | <a class="icon icon-facebook" href="https://www.facebook.com/pages/Judiths-Kitchen/1618203295121492/"></a></p>
				<!-- <p><a class="icon icon-twitter" style="color:#ffffff;" href="https://twitter.com/judiths_kitchen"> @judiths_kitchen </a> -->
			</div><!-- container -->
		</section><!-- section -->
		
		<div class="container" data-name="contact">
			<div id="contact">
				<div class="row">
				<br>
					<h1 class="centered">JOIN OUR MAILING LIST</h1>
					<hr>
					<h2 class="centered">
						<a href="/signup">Sign up here</a> and we'll keep you posted about news and specials!
					</h2>
					<p class="centered">
						We won't sell or trade your email address. We'll just use it to notify you of recurring specials and news.
					</p>
					
					<br>
					<br>
					<div class="col-lg-4">
						<h3>Contact Us:</h3>
						<p><span class="icon icon-home"></span> 1371 Washington St, West Newton, MA 02465<br/>
							<span class="icon icon-phone"></span> phone: 617-916-9282 <br/> 
							<span class="icon icon-phone"></span> fax: 617-916-9285 <br/>
							<!-- <span class="icon icon-envelop"></span> <a href="#"> info@jennys-kitchen.com</a> <br/> -->
							<span class="icon icon-twitter"></span> <a href="https://twitter.com/judiths_kitchen"> @judiths_kitchen </a> <br/>
							<span class="icon icon-facebook"></span> <a href="https://www.facebook.com/pages/Judiths-Kitchen/1618203295121492/">Judith's Kitchen</a> <br/>
						</p>
						<h3>Hours:</h3>
						<!--<p><strong>We will be closing at 6PM on Wednesday, November 23rd for the Thanksgiving holiday. We'll open again on Saturday, November 26th at 8AM.</strong><br> -->
						<p>Monday through Thursday: 7AM - 8PM, &nbsp; Friday: 7AM - 9PM, &nbsp; Saturday: 8AM - 9PM, &nbsp;  Sunday: 8AM - 8PM </p>
					</div><!-- col -->
					<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d2948.7112137110316!2d-71.2292368!3d42.348679999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x89e382fa19c2c639%3A0x54265bfdad654554!2s1371+Washington+St%2C+West+Newton%2C+MA+02465!3m2!1d42.348679999999995!2d-71.2292368!5e0!3m2!1sen!2sus!4v1439925266133" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div><!-- row -->
			</div><!-- id -->
		</div><!-- container -->
		
		<!-- Fixed "go to top" widget -->
		<!-- 
		<div id="gototop">
			<p><a href="#" class="smoothScroll">Top </a></p>
		</div> <!-- gototop div -->
		

{{-- END OF SHIELD THEME --}}


@stop

