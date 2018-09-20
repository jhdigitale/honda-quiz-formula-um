@extends('layouts.layout_admin')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">

          <div class="col-md-6 left">
            <i class="fa fa-table"></i> Criar Quiz
          </div>

          <!-- <div class="col-md-6 left text-right">
            <a class="btn btn-default edit" href="javascript:edit(0)" >New</a>
          </div> -->
        </div>


        <div class="card-body">
        <form id="edit" method="POST" action="/admin/quiz/create">
          
          {{ csrf_field() }}

            <div class="col col-md-12">
          <div class="row">
           <div class="col col-md-12">
                <div class="form-group form-lbl-box">
                <label for="email-pk-login">Nome</label>
                <input type="text" id="name" class="form-control" value="" name="name" >
           </div>
              </div>
           <div class="col col-md-4">
               <div class="form-group form-lbl-box">
                   <label for="email-pk-login">Data Inicio</label>
                   <input type="text" id="date_init" class="form-control datepicker" value="" name="date_init" >
               </div>

           </div>

              <div class="col col-md-4">
           <div class="form-group form-lbl-box">
            <label for="email-pk-login">Data Final</label>
            <input type="text" id="date_end" class="form-control datepicker" value="" name="date_end" >
           </div>
              </div>


                  <div class="col col-md-4">
           <div class="form-group form-lbl-box">
            <label for="email-pk-login">Data do sorteio</label>
            <input type="text" id="date_lottery" class="form-control datepicker" value="" name="date_lottery" >
           </div>
                  </div>

              <div class="col col-md-12">
           <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
           @include ('layouts.errors')
           <div class="alert alert-errors">
            
              

           </div>

          </div>

            </div>
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