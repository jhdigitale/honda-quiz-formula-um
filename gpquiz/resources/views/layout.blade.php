<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>GP Quiz - Honda</title>


  <!-- Bootstrap core CSS -->
  <link href="/css/libs/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">


</head>

<body>
    
    @include('layouts.menu')

    @yield('content')

    @include('layouts.rodape')


    <script src="/js/jquery.js"></script>
    <script src="/js/libs/plg/bootstrap.min.js"></script>

    <script>
      @yield('script')
    </script>

</body>
</html>
