<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>
            window.Laravel = { csrfToken: '{{ csrf_token() }}' }
        </script>
        <link href="css/app.css" rel="stylesheet">
    </head>
    <body>
        
        <div id='app' class="container">
            <task-list></task-list>
        </div>
        
        <script src="js/app.js"></script>
    </body>
</html>
