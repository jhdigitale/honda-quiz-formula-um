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
            <i class="fa fa-table"></i> Users
          </div>

          <!-- <div class="col-md-6 left text-right">
            <a class="btn btn-default edit" href="javascript:edit(0)" >New</a>
          </div> -->
        </div>

        <form id="edit">
  
         <div class="form-group form-lbl-box">
            <label for="email-pk-login">Nome</label>
            <input type="text" id="fullname" class="form-control" value="{{ $quiz->name }}" name="fullname" required> 
           </div>
         
           <div class="form-group form-lbl-box">
            <label for="email-pk-login">Data Início</label>
            <input type="text" id="email" class="form-control data" value="{{ $quiz->date_init }}" name="email" required> 
           </div>

           <div class="form-group form-lbl-box">
            <label for="email-pk-login">Data Final</label>
            <input type="text" id="email" class="form-control data" value="{{ $quiz->date_end }}" name="email" required> 
           </div>

           <div class="form-group form-lbl-box">
            <label for="email-pk-login">Data do sorteio</label>
            <input type="text" id="email" class="form-control data" value="{{ $quiz->date_lottery }}" name="email" required> 
           </div>

           <script>
             $(function () {
                  $('.data').datetimepicker();
              });
           </script>


      </div>
    </div>
@endsection
    <!-- Bootstrap core JavaScript-->
