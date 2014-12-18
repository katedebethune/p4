<?php

/*
|--------------------------------------------------------------------------
| Register The Laravel Class Loader
|--------------------------------------------------------------------------
|
| In addition to using Composer, you may use the Laravel class loader to
| load your controllers and models. This is useful for keeping all of
| your classes in the "global" namespace without Composer updating.
|
*/

ClassLoader::addDirectories(array(

	app_path().'/commands',
	app_path().'/controllers',
	app_path().'/models',
	app_path().'/database/seeds',

));

/*
|--------------------------------------------------------------------------
| Application Error Logger
|--------------------------------------------------------------------------
|
| Here we will configure the error logger setup for the application which
| is built on top of the wonderful Monolog library. By default we will
| build a basic log file setup which creates a single file for logs.
|
*/

Log::useFiles(storage_path().'/logs/laravel.log');

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code)
{
	Log::error($exception);
});

/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenance mode is in effect for the application.
|
*/

App::down(function()
{
	return Response::make("Be right back!", 503);
});

/*
|--------------------------------------------------------------------------
| Require The Filters File
|--------------------------------------------------------------------------
|
| Next we will load the filters file for the application. This gives us
| a nice separate location to store our route and application filter
| definitions instead of putting them all in the main routes file.
|
*/

require app_path().'/filters.php';

/*
|--------------------------------------------------------------------------
| Require The Validator File
|--------------------------------------------------------------------------
|
| Next we will load the validator file for the application. This gives us
| a reference for a file where custom validation rules can be defined. 
| Useful especially for regexes which can't be piped in the regular 
| validation usage.
|
*/

require app_path().'/validator.php';

/*
|--------------------------------------------------------------------------
| HTML macros - for context dependent navigation
|--------------------------------------------------------------------------
|
| The Shield theme used for this app was intended to be a one-page theme.
| This code adapts the theme for use on this small, multi-page site. 
| HTML macros are called by child pages because the menu context & behaviors
| differ dependingon whether the user is on the home page or an interior page.
|
*/

HTML::macro('nav_open', function()
{
	return
	'
    <!-- body data-spy="scroll" data-offset="0" data-target="#navbar-main"-->
    <div id="navbar-main">
      <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="glyphicon glyphicon-heart" style="font-size:30px; color:#3498db;"></span>
          </button>
          <a class="navbar-brand hidden-xs hidden-sm" href="/#home"><span class="glyphicon glyphicon-heart" style="font-size:18px; color:#3498db;"></span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">';
}); 

HTML::macro('nav_close', function()
{
	return
	'
   		 </ul>
   		</div><!--/.nav-collapse -->
      </div>
    </div>
    </div>
    ';
});


HTML::macro('nav_index_auth', function()
{
    return
    '
            <li><a href="#home" class="smoothScroll">Home</a></li>
			<li> <a href="#about" class="smoothScroll"> About</a></li>
			<li> <a href="#menu" class="smoothScroll">Cafe Menu</a></li>
			<li> <a href="#catering" class="smoothScroll">Catering Menu</a></li>
			<li> <a href="#contact" class="smoothScroll"> Contact</a></li>
			<li><a href=\'/orders\'>My Orders</a></li>
			<!-- <li><a href=\'/logout\'>Log out '.Auth::user()->email.'</a></li> -->
			<li><a href=\'/logout\'>Log out </a></li>
    ';
});

HTML::macro('nav_index_non_auth', function()
{  
    return
    '
            <li><a href="#home" class="smoothScroll">Home</a></li>
			<li> <a href="#about" class="smoothScroll"> About</a></li>
			<li> <a href="#menu" class="smoothScroll">Cafe Menu</a></li>
			<li> <a href="#catering" class="smoothScroll">Catering Menu</a></li>
			<li> <a href="#contact" class="smoothScroll"> Contact</a></li>
			<li><a href=\'/signup\'>Sign up</a></li>
			<li><a href=\'/login\'>Log in</a></li>
    ';
});

HTML::macro('nav_other_auth', function()
{
    return
    '
            <li><a href="/#home" class="smoothScroll">Home</a></li>
			<li> <a href="/#about" class="smoothScroll"> About</a></li>
			<li> <a href="/#menu" class="smoothScroll">Cafe Menu</a></li>
			<li> <a href="/#catering" class="smoothScroll">Catering Menu</a></li>
			<li> <a href="/#contact" class="smoothScroll"> Contact</a></li>
			<li><a href=\'/orders\'>My Orders</a></li>
			<!-- <li><a href=\'/logout\'>Log out '.Auth::user()->email.'</a></li> -->
			<li><a href=\'/logout\'>Log out </a></li>
    ';
});

HTML::macro('nav_other_non_auth', function()
{
    return
    '
            <li><a href="/#home" class="smoothScroll">Home</a></li>
			<li> <a href="/#about" class="smoothScroll"> About</a></li>
			<li> <a href="/#menu" class="smoothScroll">Cafe Menu</a></li>
			<li> <a href="/#catering" class="smoothScroll">Catering Menu</a></li>
			<li> <a href="/#contact" class="smoothScroll"> Contact</a></li>
			<li><a href=\'/signup\'>Sign up</a></li>
			<li><a href=\'/login\'>Log in</a></li>
    ';
});

HTML::macro('footer', function()
{
	return
	'
		<footer class="site-footer">
			<div id="footerwrap">
					<div class="container">
							<h4>&copy; Copyright '. date('Y') .', Jenny\'s Kitchen&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="http://blacktie.co">Credits</a>&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="http://freefoodphotos.com">Photography</a></h4>
							
					</div>
			</div>
		</footer>
		
	';
});

/*
|--------------------------------------------------------------------------
| BarryVDH - debugbar: Environment dependent switch
|--------------------------------------------------------------------------
|
| 
|
*/

if(Config::get('app.debug_bar') == true) {
	Debugbar::enable();
}
else {
	Debugbar::disable();
}


