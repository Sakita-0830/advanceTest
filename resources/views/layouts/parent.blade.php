<!DOCTYPE html>
<html lang="jp">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('css')
    <title>@yield('title')</title>
  </head>
  <body>
    <div>@yield('content')</div>
  </body>
</html>