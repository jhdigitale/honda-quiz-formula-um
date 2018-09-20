@extends('layouts.layout_admin')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">

          <div class="col-md-6 left">
            <i class="fa fa-table"></i> Editar Usuário Admin
          </div>

          <!-- <div class="col-md-6 left text-right">
            <a class="btn btn-default edit" href="javascript:edit(0)" >New</a>
          </div> -->
        </div>


        <div class="card-body">
            <form method="POST" action="/admin/winners/{{ $register->id }}">

                {{ csrf_field() }}
                @method('PATCH')

                <div class="form-group">
                    <div class="form-row">
                        <label for="exampleInputName">Nome</label>
                        <input class="form-control" id="name" name="name" type="text" aria-describedby="name" placeholder="Digite seu nome" value="{{ $register->name }}">


                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input class="form-control" id="email" name="email" type="email" aria-describedby="emailHelp" placeholder="Digite seu email" value="{{ $register->email }}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Matrícula</label>
                    <input class="form-control" id="register" name="register" type="register" placeholder="Digite sua Matricula" value="{{ $register->register }}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">CPF</label>
                    <input class="form-control" id="email" name="cpf" type="cpf"  placeholder="Digite seu cpf" value="{{ $register->cpf }}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Local</label>
                    <select class="select-control form-control" name="local" id="local" required="required" placeholder="PLANTA">
                        <option value="">UNIDADES</option>
                        <option value="Manaus">Manaus</option>
                        <option value="Morumbi, São Caetano, CETH Indaiatuba, Peças Indaiatuba, Jaboatão, Recife e Benevides">Morumbi, São Caetano, CETH Indaiatuba, Peças Indaiatuba, Jaboatão, Recife e Benevides</option>
                        <option value="Sumaré (HAB, HSA, HRB-S, Peças, CT/MQC, Itirapina, Paulínia, Xangri-lá, Cariacica, Joinville)">Sumaré (HAB, HSA, HRB-S, Peças, CT/MQC, Itirapina, Paulínia, Xangri-lá, Cariacica, Joinville)</option>
                    </select>
                </div>

                <input type="hidden" id="local_hdn" value="{{ $register->local }}">

                @include('layouts.errors')

                <button class="btn btn-primary btn-block">Cadastrar</button>
            </form>
        </div>
      </div>
    </div>
@endsection


@section('scripts')
<script>
    $("#local").val($("#local_hdn").val());

</script>

@endsection