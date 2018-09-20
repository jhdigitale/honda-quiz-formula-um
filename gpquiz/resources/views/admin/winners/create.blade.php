@extends('layouts.layout_admin')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">

          <div class="col-md-6 left">
            <i class="fa fa-table"></i> Criar Usuário Admin
          </div>

          <!-- <div class="col-md-6 left text-right">
            <a class="btn btn-default edit" href="javascript:edit(0)" >New</a>
          </div> -->
        </div>


        <div class="card-body">
            <form method="POST" action="/admin/users/create">

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
        </div>
      </div>
    </div>
@endsection


@section('scripts')


<script>
    $(function(){

        $(".datepicker").flatpickr({
            enableTime: true,
            minTime: "09:00",
            locale: 'pt'
        });


    });

</script>
@endsection