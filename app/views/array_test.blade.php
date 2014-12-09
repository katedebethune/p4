<!doctype html>
<html>
  <head>
    <title>Input Array Test</title>
  </head>

  <body>
    {{ Form::open(array('url' => 'input-test')) }}
      
      {{ Form::label('foods[name][]', 'foods:') }} <br>
      {{ Form::text('foods[name][]', null) }}
      {{ Form::submit('Submit') }}
    {{ Form::close() }}
  </body>
</html>