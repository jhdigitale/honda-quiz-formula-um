<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>Honda - Sustentar um mundo melhor</title>


  <!-- Bootstrap core CSS -->
  <link href="/css/libs/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/semana2019/style.css">

    <script src="/js/jquery.js"></script>
    <script src="/js/jquery.mask.min.js"></script>
    <script src="/js/libs/plg/bootstrap.min.js"></script>
    <script src="/js/jquery.slides.min.js"></script>

</head>

<body>
    
    @include('layouts.semana2019.menu')

    @yield('content')

    @include('layouts.semana2019.footer')

  <script>
  @yield('script')
  </script>

</body>
</html>
