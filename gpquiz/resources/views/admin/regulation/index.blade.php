@extends('layouts.layout_admin')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">

                <div class="col-md-6 left">
                    <i class="fa fa-table"></i> Regulamento
                </div>

                <!-- <div class="col-md-6 left text-right">
                  <a class="btn btn-default edit" href="javascript:edit(0)" >New</a>
                </div> -->
            </div>


            <div class="card-body">
                <form method="POST" action="/admin/users/create">

                    {{ csrf_field() }}



                    <div class="form-group">
                        <div class="form-row">
                            <label for="exampleInputPassword1">Regulamento</label>
<!--                            <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" placeholder="Repita sua senha">-->
                            <textarea id="texto">

                            </textarea>
                        </div>
                    </div>

                    @include('layouts.errors')

                    <button class="btn btn-primary btn-block">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
    @endsection


    @section('scripts')

    <script src='/js/admin/tinymce/tinymce.min.js'></script>

    <script>
        $(function(){

            tinymce.init({
                selector: 'textarea',
                images_upload_url: '/admin/admin_php/postAcceptor.php',
                images_upload_base_path: '/admin/admin_php/',
                images_upload_credentials: true,
                height: 150,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor textcolor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code help wordcount'
                ],

                toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
                content_css: [
                    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                    '//www.tinymce.com/css/codepen.min.css']
            });



        });

    </script>
    @endsection