<!DOCTYPE html>
<html>
<head>

	<title>@yield('title','Judith\'s Kitchen')</title>
	<meta charset='utf-8'>

	{{-- <link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css" rel="stylesheet"> --}}
	{{-- <link rel='stylesheet' href='/styles/styles.css' type='text/css'> --}}
	
  	
  	{{-- THIS AREA USED FOR DATE PICKER WIDGET --}}
  	
  	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  	<link rel="stylesheet" href="/resources/demos/style.css">
  	<script>
  	$(function() {
    	$( "#datepicker" ).datepicker();
  	});
  	</script> 
  	
  	
  	{{-- USING THIS AREA TO TRY TO WORK OUT DATE TIME PICKER PLUG IN --}}
  	
  	{{--
  	
  	<link rel="stylesheet" type="text/css" href="datetimepicker/jquery.datetimepicker.css"/ >
  	<script src="datetimepicker/jquery.js"></script>
	<script src="datetimepicker/jquery.datetimepicker.js"></script>
	
	--}}
	
    
    {{-- HTML::style('datetimepicker/jquery.datetimepicker.css') --}}
    {{-- HTML::script('datetimepicker/jquery.js') --}}
    {{-- HTML::script('datetimepicker/jquery.datetimepicker.js') --}}
  	
  	{{--
  	<script>
	$('#datetimepicker1').datetimepicker({
		datepicker:false,
		format:'H:i',
		step:5
	});
	</script>
	--}}
	
	{{-- END OF AREA FOR DATETIME PICKER EXPERIMENT --}}
  	
  

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

	{{ HTML::style('styles/styles.css') }}

	@yield('head')


</head>
<body>

	@if(Session::get('flash_message'))
		<div class='flash-message'>{{ Session::get('flash_message') }}</div>
	@endif

	{{-- <a href='/'><img class='logo' src='/images/laravel-foobooks-logo@2x.png' alt='Foobooks logo'></a> --}}

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

	<a href='https://github.com/katedebethune/p4'>p4 on Github</a>

	@yield('content')

	@yield('/body')

</body>
</html>
