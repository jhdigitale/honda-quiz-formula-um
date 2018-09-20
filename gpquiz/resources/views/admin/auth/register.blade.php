<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>GP Quiz</title>

  <link href="/js/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/js/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="/js/admin/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="/css/admin/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registrar</div>
      <div class="card-body">
        <form method="POST" action="/admin/register">

          {{ csrf_field() }}

          <div class="form-group">
            <div class="form-row">
                <label for="exampleInputName">Nome</label>
                <input class="form-control" id="name" name="name" type="text" aria-describedby="name" placeholder="Digite seu nome">


            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input class="form-control" id="email" name="email" type="email" aria-describedby="emailHelp" placeholder="Digite seu email">
          </div>

          <div class="form-group">
            <div class="form-row">
                <label for="exampleInputPassword1">Senha</label>
                <input class="form-control" id="password" name="password" type="password" placeholder="Digite sua senha">
            </div>
          </div>

          <div class="form-group">
              <div class="form-row">
                  <label for="exampleInputPassword1">Confirmar senha</label>
                  <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" placeholder="Repita sua senha">
              </div>
           </div>

            @include('layouts.errors')

          <button class="btn btn-primary btn-block">Cadastrar</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login">Login </a>
          <!-- <a class="d-block small" href="forgot-password.html">Forgot Password?</a> -->
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
