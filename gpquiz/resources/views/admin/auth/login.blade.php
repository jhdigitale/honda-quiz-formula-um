
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Gp Quiz</title>

    <!-- Bootstrap core CSS-->
    <link href="/js/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/js/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/js/admin/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="/css/admin/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form id="login" method="POST" action="/admin/login">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input class="form-control" id="email" type="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" id="password" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Remember Password</label>
                    </div>
                </div>

                @include('layouts.errors')

                <button class="btn btn-primary btn-block" type="submit">Login</button>
            </form>
            <!-- <div class="text-center">
              <a class="d-block small mt-3" href="register.html">Register an Account</a>
              <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
            </div> -->
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
