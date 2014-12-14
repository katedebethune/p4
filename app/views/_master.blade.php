<!DOCTYPE html>
<html>
<head>

	<title>@yield('title','Judith\'s Kitchen')</title>
	<meta charset='utf-8'>

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
</html>
