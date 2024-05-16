<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
        <h1>@yield('header')</h1>

        @yield('content')
    </body>
</html>
