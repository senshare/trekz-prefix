<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="{{ url('frontend/images/globe.png')}}" />

  <title>@yield('title', 'TREKZ')</title>
  @include('includes.style')
  @stack('append-style')
</head>
<body>
  @include('includes.navbar')
  @yield('content')
  @include('includes.footer')
  @include('includes.script')
  @stack('append-script')
</body>
</html>