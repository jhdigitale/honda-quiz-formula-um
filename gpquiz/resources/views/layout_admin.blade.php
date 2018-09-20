<!DOCTYPE html>
<html lang="en">
   <head>
      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>GP Quiz - Admin</title>
        <link href="/js/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/js/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="/js/admin/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="/css/admin/sb-admin.css" rel="stylesheet">
      </head>
   </head>
   <body>
      
      @include('layouts.nav')

      @yield('content')

      @include('layouts.footer')


    <!-- Bootstrap core JavaScript-->
    <script src="/js/admin/jquery/jquery.min.js"></script>
    <script src="/js/admin/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/js/admin/jquery-easing/jquery.easing.min.js"></script>
    <script src="/js/admin/datatables/jquery.dataTables.js"></script>
    <script src="/js/admin/datatables/dataTables.bootstrap4.js"></script>
    <script src="/js/admin/sb-admin.min.js"></script>
    <script src="/js/admin/sb-admin-datatables.min.js"></script>
   </body>
</html>