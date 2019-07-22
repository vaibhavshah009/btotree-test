<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="css/app.css" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center full-height">
            <div class="content">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="/backup">
                    @csrf
                    <button type="submit" class="btn btn-primary" value="backup">Backup Database</button>
                </form>
            </div>
        </div>
    </body>
</html>
