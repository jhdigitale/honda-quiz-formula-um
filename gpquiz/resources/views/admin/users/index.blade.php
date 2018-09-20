@extends ('layouts.layout_admin')


@section ('content')

  <meta name="csrf-token" content="{{ csrf_token() }}">





  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      {{--<ol class="breadcrumb">--}}
        {{--<li class="breadcrumb-item active">Uusu</li>--}}
      {{--</ol>--}}
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">

          <div class="col-md-6 left">
            <i class="fa fa-table"></i> Usuários
          </div>

          <div class="col-md-6 left text-right">
            <a class="btn btn-primmary edit" href="/admin/users/create" >Novo</a>
          </div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                    <th>Email</th>
                  <th>Ações</th>
                </tr>
              </thead>

              <tbody>

                @foreach ($registers as $register)
                <tr>
                      <th>{{ $register->id }}</th>
                      <th>{{ $register->name }}</th>
                        <th>{{ $register->email }}</th>
                        {{--<th>{{ $register->cpf }}</th>--}}
                        {{--<th>{{ $register->register }}</th>--}}
                        {{--<th><a href="#">40</a></th>--}}

                        <th>
                            <a href="/admin/users/{{ $register->id }}"><span class="fa fa-edit"></span></a>
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



@section('scripts')
  <script>

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $(function(){

          $(".remove").click(function(e){
              e.preventDefault();

              if (confirm('Você deseja deletar este dado?')) {

                  let user = $(this).attr("href");

                  $.ajax({
                      type: 'POST',
                      url: '/admin/users/'+ user + '/delete',
                      data: {user: user, _method: "PATCH"},
                      success: function(data) {
                          //$('body').append(data);
                          //alert(data);
                          window.location.reload();
                      }
                  });
              }

          });

      });

  </script>

@endsection



