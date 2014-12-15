<!DOCTYPE html>
<html>

<head>

	<title>@yield('title','Judith\'s Kitchen')</title>
	<meta charset='utf-8'>

	<!-- Latest compiled and minified CSS -->
	<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" -->
	<!-- FROM SHIELD - TEST IF THIS CAN BE COMMENTED OUT AND USE CDN INSTEAD Bootstrap core CSS -->
    <!-- link href="assets/css/bootstrap.css" rel="stylesheet" -->
    {{ HTML::style('assets/css/bootstrap.css') }}

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

	<!-- COMMENTING OUT, USING CALLS FROM THEME SHIELD BELOW -->
	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	
	{{-- SHIELD THEME ASSETS ADDED HERE --}}
	
	<!-- Bootstrap core CSS -->
    <!--link href="assets/css/bootstrap.css" rel="stylesheet"-->

    <!-- Custom styles for this template -->
    <!-- link href="assets/css/main.css" rel="stylesheet" -->
    {{ HTML::style('assets/css/main.css') }}
    
    <!-- link rel="stylesheet" href="assets/css/icomoon.css" -->
    {{ HTML::style('assets/css/icomoon.css') }}
    
    <!-- link href="assets/css/animate-custom.css" rel="stylesheet" -->
     {{ HTML::style('assets/css/animate-custom.css') }}
    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    
    <!--script src="assets/js/jquery.min.js"></script> -->
    {{ HTML::script('assets/js/jquery.min.js') }}
	<script type="text/javascript" src="assets/js/modernizr.custom.js"></script>
	
	{{-- END SHIELD THEME ASSETS --}}

	{{ HTML::style('styles/styles.css') }}

	@yield('head')

</head>
<body>

	{{-- 
	@if(Session::get('flash_message'))
		<div class='flash-message'>{{ Session::get('flash_message') }}</div>
	@endif


	<nav>
		<ul>
		@if(Auth::check())
			<li><a href='/'>Home</a></li>
			<li><a href='/logout'>Log out {{ Auth::user()->email; }}</a></li>
			<li><a href='/debug/routes'>Routes</a></li>
			<li><a href='/orders'>My Orders</a></li>
		@else
			<li><a href='/signup'>Sign up</a> or <a href='/login'>Log in</a></li>
		@endif
		</ul>
	</nav>
	--}}
	
	{{-- START OF SHIELD CODE --}}
	 {{--
	 @yield('nav')
  		@if(Auth::check())
  			{{ HTML::nav_index_auth() }}
  		@else
  			{{ HTML::nav_index_non_auth() }}
  		@endif
  		--}}
	 
	 {{--
	 
	 <body data-spy="scroll" data-offset="0" data-target="#navbar-main">
  	<div id="navbar-main">
      <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="glyphicon glyphicon-heart" style="font-size:30px; color:#3498db;"></span>
          </button>
          <a class="navbar-brand hidden-xs hidden-sm" href="#home"><span class="glyphicon glyphicon-heart" style="font-size:18px; color:#3498db;"></span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="#home" class="smoothScroll">Home</a></li>
			<li> <a href="#about" class="smoothScroll"> About</a></li>
			<li> <a href="#menu" class="smoothScroll">Cafe Menu</a></li>
			<li> <a href="#catering" class="smoothScroll">Catering Menu</a></li>
			<li> <a href="#contact" class="smoothScroll"> Contact</a></li>
			@if(Auth::check())
				<li><a href='/orders'>My Orders</a></li>
				<li><a href='/logout'>Log out {{ Auth::user()->email; }}</a></li>
			@else
				<li><a href='/signup'>Sign up</a></li>
				 <li><a href='/login'>Log in</a></li>
			@endif
			
        </div><!--/.nav-collapse -->
      </div>
    </div>
    </div>
    --}}
	
	
	{{-- END OF SHIELD CODE --}}

	@yield('content')

	@yield('/body')

</body>
	{{-- THIS AREA USED FOR DATE PICKER WIDGET --}}
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  	<script src="//cdn.jsdelivr.net/jquery.ui.timepicker.addon/1.4.5/jquery-ui-timepicker-addon.js"></script>
  	<script>
  	$(function() {
    	$('#dt_picker').datetimepicker({
			altField: "#dt_picker_alt",
			minDate: 3,
			hourMin: 10,
			hourMax: 16,
			stepMinute: 10,
			timeFormat: 'h:mm TT'
		});
  	});
  	</script> 
  	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/retina.js"></script>
	<script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="assets/js/smoothscroll.js"></script>
	<script type="text/javascript" src="assets/js/jquery-func.js"></script>
  	
</html>
