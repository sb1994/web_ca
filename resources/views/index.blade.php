<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" id="token" value="{{ csrf_token() }}">

        <title>Web Ca 2</title>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
        <meta name="csrf-token" id="token" value="{{ csrf_token() }}">
        
    </head>
    <body>
       <div id="app"></div>
       

        <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        
       <script src="{{asset('js/app.js')}}"></script>
       window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
        ]); ?>
    </body>
</html>
