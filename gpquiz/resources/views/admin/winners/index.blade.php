@extends ('layouts.layout_admin')


@section ('content')
       <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      {{--<ol class="breadcrumb">--}}
        {{--<li class="breadcrumb-item active">Ganhadores</li>--}}
      {{--</ol>--}}
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">

          <div class="col-md-6 left">
            <i class="fa fa-table"></i> Ganhadores
          </div>

          <!-- <div class="col-md-6 left text-right">
            <a class="btn btn-default edit" href="javascript:edit(0)" >New</a>
          </div> -->
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                    <th>CPF</th>
                    <th>Matrícula</th>
                     <th>Planta</th>

                     <th>Acertos</th>
                    <th>Ações</th>
                </tr>
              </thead>

              <tbody>

                @foreach ($registers as $register)
                <tr>
                      <th>{{ $register->id }}</th>
                      <th>{{ $register->name }}</th>
                        <th>{{ $register->cpf }}</th>
                        <th>{{ $register->register }}</th>
                        <th>{{ $register->local }}</th>

                  <th><a href="/admin/winners/{{ $register->id }}/pdf">{{ $register->correct }}</a></th>

                        <th>
                            <a href="/admin/winners/{{ $register->id }}"><span class="fa fa-edit"></span></a>
                            <a href="{{ $register->id }}" class="remove"><span class="fa fa-close"></span></a>
                        </th>
                </tr>
                @endforeach
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    </div>
    
@endsection

