@extends('layouts.layout_admin')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      {{--<ol class="breadcrumb">--}}
        {{--<li class="breadcrumb-item active">Users</li>--}}
      {{--</ol>--}}
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">

          <div class="col-md-6 left">
            <i class="fa fa-table"></i> Criar questão
          </div>

          <!-- <div class="col-md-6 left text-right">
            <a class="btn btn-default edit" href="javascript:edit(0)" >New</a>
          </div> -->
        </div>

          <div class="card-body">

          <form id="edit" method="POST" action="/admin/question/{{ $quiz->id }}/create" enctype="multipart/form-data">

          {{ csrf_field() }}

          <div class="">
                <div class="col-md-8 no-padding">
                    <div class="form-group form-lbl-box ">
                        <label for="email-pk-login">Pergunta</label>
                        <input type="text" id="question" class="form-control" value="" name="question" >
                    </div>

                    <div class="form-group form-lbl-box ">
                        <label for="email-pk-login">Resposta Descritiva</label>
                        <input type="text" id="answer" class="form-control" value="" name="answer" >
                    </div>

                    <input type="file" name="image" id="image" accept="image/*">
                    <br><br>
                    <button type="submit" class="btn btn-primary">Enviar</button>

                </div>
          </div>
          </form>


           @include ('layouts.errors')
           <div class="alert alert-errors">
            
           </div>

           </div>

          </div>

         
       </form>

      </div>
    </div>


@endsection

