<?php

/*
|--------------------------------------------------------------------------
| Validator.php stores custom validation rules for this app.
|--------------------------------------------------------------------------
|
| Next we will load the validator file for the application. This gives us
| a reference for a file where custom validation rules can be defined. 
| Useful especially for regexes which can't be piped in the regular 
| validation usage.
|
*/
Validator::extend('person_qt', function($attribute, $value, $parameters)
{
  if(preg_match("/^(0?|[1-9][0-9]|100)$/", $value))
  {
    return true;
  }
  return false;
});

?>