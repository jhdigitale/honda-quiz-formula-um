@extends ('layouts.layout_admin')


@section ('content')
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
          <div class="">
            <table class="table table-bordered" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                    <th>CPF</th>
                    <th>Matrícula</th>
                     <th>Planta</th>

                     <th>Acertos</th>
                  
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

                  <th>{{ $register->correct }}</th>

                     
                        
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

        /*
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
        */

        // $(".kit").bind('change', function(){
        //     let value = this.checked; //<---
        //     let user = $(this).data("user");
        //     let _token = $("input[name='_token']").val();

        //     var formData = new FormData();
        //     formData.append('kit', value);
        //     formData.append('user', user);
        //     formData.append('_token', _token);

        //     $.ajax({
        //         type: "POST",
        //         url: "/admin/winners/kit",
        //         data: formData,
        //         contentType: false,
        //         processData: false,
        //         success: function(response){

        //             //let render = "<div class=\"list-group-item created\">" + answer +"</div>"
        //             //$("#sortable").append(render)
        //             //alert("Funcionou!");
        //         },
        //         error: function(XMLHttpRequest, textStatus, errorThrown) {
        //             alert("Status: " + textStatus); alert("Error: " + errorThrown);
        //         }
        //     });

        //     //alert(val);
        // });

        //$("#local").val($("#local_hdn").val());

    </script>

@endsection
