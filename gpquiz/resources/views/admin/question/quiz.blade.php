@extends ('layouts.layout_admin')


@section ('content')
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

        <div class="card-body">


            <div class="col-md-12">
                <form id="form">
                <div class="col-md-8">
                    <div class="form-group">
                        <select name="quiz" id="quiz">
                            @foreach($quizzes as $quiz)
                                <option value="{{ $quiz->id }}">{{ $quiz->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" id="search">Busca</button>
                    </div>

                </div>

                </form>

            </div>
        </div>
      </div>
    </div>

    </div>

    
@endsection


@section ('scripts')
    <script>
        $(function(){
            $("#form").submit(function(e){

                e.preventDefault();
                window.location.href = "/admin/question/list/" + $("#quiz").val();

            });
        });
    </script>

@endsection

