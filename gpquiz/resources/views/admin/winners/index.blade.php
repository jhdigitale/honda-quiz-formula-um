@extends ('layouts.layout_admin')


@section ('content')

<meta name="csrf-token" content="{{ csrf_token() }}">


       <div class="content-wrapper">

           {{ csrf_field() }}


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
                    <th>Ganhador</th>
                    <th>Kit</th>
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
                            <a href="{{ $register->id }}"><span class="fa fa-edit"></span></a>
                            <a href="{{ $register->id }}" class="remove"><span class="fa fa-close"></span></a>
                        </th>

                        <th>
                            <input type="checkbox" name="winner" class="winner" data-user="{{ $register->id }}"

                                   @if($register->winner == 1)
                                        checked
                                         value="1"
                                   @else
                                        value="0"
                                   @endif
                            >

                        </th>

                        <th>
                            <input type="checkbox" name="kit" class="kit" data-user="{{ $register->id }}"

                                   @if($register->kit == 1)
                                   checked
                                   value="1"
                                   @else
                                   value="0"
                                    @endif
                            >

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

        $(".winner").bind('change', function(){
            let value = this.checked; //<---
            let user = $(this).data("user");
            let _token = $("input[name='_token']").val();

            var formData = new FormData();
            formData.append('win', value);
            formData.append('user', user);
            formData.append('_token', _token);

            $.ajax({
                type: "POST",
                url: "/admin/winners/win",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){

                    //let render = "<div class=\"list-group-item created\">" + answer +"</div>"
                    //$("#sortable").append(render)
                    //alert("Funcionou!");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus); alert("Error: " + errorThrown);
                }
            });

            //alert(val);
        });


        $(".kit").bind('change', function(){
            let value = this.checked; //<---
            let user = $(this).data("user");
            let _token = $("input[name='_token']").val();

            var formData = new FormData();
            formData.append('kit', value);
            formData.append('user', user);
            formData.append('_token', _token);

            $.ajax({
                type: "POST",
                url: "/admin/winners/kit",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){

                    //let render = "<div class=\"list-group-item created\">" + answer +"</div>"
                    //$("#sortable").append(render)
                    //alert("Funcionou!");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus); alert("Error: " + errorThrown);
                }
            });

            //alert(val);
        });

        $(function(){

          $(".remove").click(function(e){
              e.preventDefault();

              if (confirm('Você deseja deletar este dado?')) {

                  let register = $(this).attr("href");

                  $.ajax({
                      type: 'POST',
                      url: '/admin/winners/'+ register + '/delete',
                      data: {register: register, _method: "PATCH"},
                      success: function(data) {
                          //$('body').append(data);
                          //alert(data);
                          window.location.reload();
                      }
                  });
              }

          });

          });

        //$("#local").val($("#local_hdn").val());

    </script>

@endsection
