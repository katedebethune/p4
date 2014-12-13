<?php
Validator::extend('person_qt', function($attribute, $value, $parameters)
{
  if(preg_match("/^(0?|[1-9][0-9]|100)$/", $value))
  {
    return true;
  }
  return false;
});

?>