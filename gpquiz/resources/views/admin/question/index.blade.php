@extends ('layouts.layout_admin')


@section ('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Quiz > Questões</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">

          <div class="col-md-6 left">
            <i class="fa fa-question"></i> Questões
          </div>

          <div class="col-md-6 left text-right">
            <a class="btn btn-primary edit" href="/admin/question/1/create" >Novo</a>
          </div>
        </div>

        <div class="card-body">
            @if(count($questions) > 0)
                <div class="list-group" id="sortable">

                    @foreach ($questions as $question)
                        <div class="list-group-item created" id="{{ $question->id }}">

                            <div class="row">
                                {{--<div class="col col-md-1">--}}
                                    {{--<span class="fa fa-arrows"></span>--}}
                                {{--</div>--}}
                                <div class="col col-md-11">
                                    {{ $question->question }}<br/>
                                    <img src="{{ url("question/{$question->image}") }}" class="img-responsive" width="100%" alt="">
                                </div>
                                <div class="col col-md-1 text-right">
                                    <a href="/admin/question/{{ $question->quiz_id }}/{{ $question->id }}"><span class="fa fa-edit"></span></a>
                                    <a href="{{ $question->id }}" class="remove"><span class="fa fa-close"></span></a>
                                </div>
                            </div>


                        </div>
                    @endforeach

                </div>
            @else
                <h4 class="text-center">Você ainda não possui questões</h4>
            @endif

        </div>
      </div>
    </div>

    </div>
    
@endsection


@section('scripts')
    <script>

    
        // $('#sortable').sortable({
        //   stop: function(e, ui) {
        //     //alert('Soltou');
        //     updateOrder($('#sortable').sortable('toArray'));
        //   }
        // });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function updateOrder(object){
            var objects = $('#sortable').sortable('toArray');
            let quiz = 1;

            $.ajax({
                type: 'POST',
                url: '/admin/question/'+ quiz +'/orderUpdate',
                data: {questions: objects, _method: "PATCH"},
                success: function(data) {
                    //$('body').append(data);
                    //alert(data);
                    window.location.reload();
                }
            });

        }

        $(function(){

            $(".remove").click(function(e){
                e.preventDefault();

                if (confirm('Você deseja deletar este dado?')) {

                    let quiz = 1;
                    let question = $(this).attr("href");

                    $.ajax({
                        type: 'POST',
                        url: '/admin/question/'+ quiz + '/'+ question + '/delete',
                        data: {question: question, _method: "PATCH"},
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


