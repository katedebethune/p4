<?php
Validator::extend('person_qt', function($attribute, $value, $parameters)
{
  //if(preg_match("/^#?([a-f0-9]{6}|[a-f0-9]{3})$/", $value))
  if(preg_match("/([0]|[1-9][0-9])/", $value))
  {
    return true;
  }
   
  return false;
});

?>