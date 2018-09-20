@extends ('layouts.layout_admin')


@section ('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Quiz</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">

          <div class="col-md-6 left">
            <i class="fa fa-table"></i> Quiz
          </div>

          <div class="col-md-6 left text-right">
            <a class="btn btn-primary edit" href="/admin/quiz/create">Novo</a>
          </div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Data inicio</th>
                  <th>Data fim</th>
                  <th>Data sorteio</th>
                  <th>Ações</th>
                </tr>
              </thead>

              <tbody>

                @foreach ($quizzes as $quiz)
                <tr>
                      <th>{{ $quiz->id }}</th>
                      <th><a href="/admin/question/{{ $quiz->id }}">{{ $quiz->name }}</a></th>
                      <th>{{ $quiz->date_init }}</th>
                      <th>{{ $quiz->date_end }}</th>
                      <th>{{ $quiz->date_lottery }}</th>
                      <th>
                          <a href="/admin/quiz/{{ $quiz->id }}"><span class="fa fa-edit"></span></a>
                          <a href="{{ $quiz->id }}" class="remove"><span class="fa fa-close"></span></a>
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

                    let quiz = $(this).attr("href");

                    $.ajax({
                        type: 'POST',
                        url: '/admin/quiz/' + quiz + '/delete',
                        data: {quiz: quiz, _method: "PATCH"},
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

