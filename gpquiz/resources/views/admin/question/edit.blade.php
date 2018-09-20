@extends('layouts.layout_admin')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Users</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">

          <div class="col-md-6 left">
            <i class="fa fa-table"></i> Editar questão
          </div>

          <div class="col-md-6 left text-right">
            <a class="btn btn-primary edit" href="/admin/question/{{ $question->id }}" >Voltar</a>
          </div>
        </div>

          <div class="card-body">
              <form id="edit" method="POST" action="/admin/question/{{$quiz->id}}/{{$question->id}}">

                  {{ csrf_field() }}
                  @method('PATCH')

                  <div class="col-md-8 no-padding">
                      <div class="form-group form-lbl-box ">
                          <label for="email-pk-login">Pergunta</label>
                          <input type="text" id="fullname" class="form-control" value="{{ $question->question }}" name="question" >
                      </div>

                      <div class="form-group form-lbl-box ">
                          <label for="email-pk-login">Resposta Descritiva</label>
                          <input type="text" id="answer" class="form-control" value="{{ $question->answer }}" name="answer" >
                      </div>

                      <input type="file" name="image" id="image" accept="image/*"/>


                      <img src="{{ url("/storage/question/{$question->image}") }}" class="img-responsive" width="100%" alt="">


                      <br><br>
                      <button type="submit" class="btn btn-primary">Enviar</button>

                  </div>

              </form>


              <br/>


              <div class="col-md-12">

                  <h5>Respostas</h5>


              <div class="list-group"  id="sortable">

                  @if(count($question) > 0)

                      @foreach ($question->answers as $answer)
                          <div class="list-group-item created">
                              <div class="row">
                                  {{--<div class="col col-md-1">--}}
                                      {{--<span class="fa fa-arrows"></span>--}}
                                  {{--</div>--}}
                                  <div class="col col-md-11">
                                      {{ $answer->answer }}<br/>
                                      <img src="{{ url("answer/{$answer->image}") }}" class="img-responsive" width="100%" alt="">
                                  </div>
                                  <div class="col col-md-1 text-right">
                                      <span class="fa fa-close"></span>
                                  </div>
                              </div>

                          </div>
                      @endforeach

                  @endif

              </div>

            <br><br>

              <div class="list-group">
                <form id="create-question">

                    {{ csrf_field() }}

                    <div class="list-group-item">
                        <div class="form-group form-lbl-box">
                            <label for="email-pk-login">Adicionar resposta</label>
                            <input type="text" id="answer-right" class="form-control" value="" name="answer-right" >
                        </div>

                        <div class="form-group form-lbl-box">
                            <input type="checkbox" name="correct" id="correct" value="1">  Resposta correta<br>
                        </div>

                        <input type="file" name="image-answer" id="image-answer" accept="image/*">
                        <br><br>
                        <button type="submit" class="btn btn-primary">Enviar</button>

                    </div>

                    @include('layouts.errors')
                </form>

              </div>

              </div>



           @include ('layouts.errors')
           <div class="alert alert-errors">
            
              

           </div>

          </div>

         
       </form>

      </div>
    </div>


@endsection

@section('scripts')
<script>
  $( function() {
     // $('#sortable').sortable({
     //      stop: function(e, ui) {
     //          console.log($.map($(this).find('li'), function(el) {
     //              return el.id + ' = ' + $(el).index();
     //          }));
     //      }
     //  });

      $("#create-question").submit(function(e) {

          e.preventDefault();

          let answer = $("#answer-right").val();
          let order = $('#sortable .created').length + 1;
          let correct = $("#correct").is(':checked')? '1' : '0';
          let _token = $("#create-question input[name='_token']").val();
          let image = $("#create-question input[name='image-answer']").prop('files')[0];

          var formData = new FormData();
          formData.append('answer', answer);
          formData.append('order', order);
          formData.append('correct', correct);
          formData.append('_token', _token);
          formData.append('image', image);


          $.ajax({
              type: "POST",
              url: "/admin/question/{{ $question->id }}/answer",
              data: formData,
              contentType: false,
              processData: false,
              success: function(response){

                  let render = "<div class=\"list-group-item created\">" + answer +"</div>"
                  $("#sortable").append(render)
                  //alert("Funcionou!");
              },
              error: function(XMLHttpRequest, textStatus, errorThrown) {
                  alert("Status: " + textStatus); alert("Error: " + errorThrown);
              }
          });

      });

      // $( "#draggable" ).draggable({
      //     connectToSortable: "#sortable",
      //     helper: "clone",
      //     revert: "invalid"
      // });
      $( "ul, li" ).disableSelection();
  } );

</script>
@endsection
