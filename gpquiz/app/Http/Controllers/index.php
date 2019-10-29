<!DOCTYPE html>
<html lang="pt-BR">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ganhar BTC</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


  
  <?php

    $campanha = "main";
    $indicador = "main";

    $id_campanha = 1;
    $id_indicador = 1;

    $id = "";
    $titulo_site = "";
    $subtitulo_site = "";
    $titulo = "";
    $url = "";

    $imagem_desk = "";
    $imagem_mobile = "";
    $imagem_video = "";

    $depoimento = "";
    $depoimento_nome = "";
    $depoimento_lista = "";

    $faq_lista = "";
  
  include ("indicador/admin_php/dbconect.php");

              // Query de produto
              if(isset($_GET['product'])){
                
                $campanha = $_GET['product'];
                $query_1 = "SELECT * FROM produtos WHERE url ='".$campanha."'";
                $result_1 = $mysqli->query($query_1);
                while($row_1 = $result_1->fetch_array())
                {
                  $rows_1[] = $row_1;
                }
                foreach($rows_1 as $row)
                {
                  $id_campanha = $row['id'];
                }
              }

              // Query de lead
              if(isset($_GET['lead'])){
               // Query de leads
               $indicador = $_GET['lead'];
               $query_2 = "SELECT * FROM leads WHERE url ='".$indicador."'";
               $result_2 = $mysqli->query($query_2);
              
               while($row_2 = $result_2->fetch_array())
                {
                  $rows_2[] = $row_2;
                }

                foreach($rows_2 as $row)
                {
                  $id_indicador = $row['id'];
                }

              }

            
              if($campanha == "main" && $indicador == "main"){
                $query_3 = "SELECT * FROM produtos WHERE main = 1";
              } else {
                $query_3 = "SELECT * FROM produtos WHERE id =". $id_campanha;

              }

              $result_3 = $mysqli->query($query_3);

              while($row_3 = $result_3->fetch_array())
              {
                $rows_3[] = $row_3;
              }

              foreach($rows_3 as $row)
              {
                
                $id = $row['id'];
				  
                $titulo_site = $row['titulo_site'];
                $subtitulo_site = $row['subtitulo_site'];
                $titulo = $row['titulo'];

                $imagem_desk = $row['imagem_desk'];
                $imagem_mobile = $row['imagem_mobile'];
                $imagem_video = $row['imagem_video'];

                $depoimento = $row['depoimento'];
                $depoimento_nome = $row['depoimento_nome'];
                $depoimento_lista = $row['depoimento_lista'];
                $faq_lista = $row['faq_lista'];
        
                //printf ("<th>".$row['id']."</th>");
                // printf ("<th>".$row['title']."</th>");
                // printf ("<th>

                //   <a href='javascript:edit(".$row['id'].")' class='edit'>
                //   <i class='fa fa-pencil'></i>
                //   </a> 

                //   <a href='javascript:trash(".$row['id'].")' class='trash'>
                //   <i class='fa fa-trash'></i>
                //   </a>

                //   </th>");
                // printf ("</tr>");

              }  
                              
              $result_3->close();
              $mysqli->close();
                  
              ?>
  <!-- Theme CSS -->
  <!-- <link href="css/freelancer.min.css" rel="stylesheet"> -->

  <style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700,800&display=swap');
    html,body{
      font-family: 'Montserrat', sans-serif;
    }
    .error-form{
      color:red;
    }
    .btn-green{
      margin-top: 5px;
      padding: 10px 20px;
      background-color: #00ac00;
      font-weight: bold;
      border-radius: 10px;
      font-size: 16px;
      color:white;
      text-transform: uppercase;
    }

    .masthead{
      padding-top:50px;
      /* background-image: url('assets/ganhar-btc-banner-desk-bg.jpg'); */

      background-image: url('admin/admin_php/uploads/<?php echo $imagem_desk ?>');
      
      background-size: cover;
      min-height:450px;
      padding-bottom: 50px;
      background-color:#000;
    }
    
    .left-banner h1{
      font-weight:bold;
      margin-top: 88px;
    }
    .left-banner p{
      font-weight:regular;
      font-size:18px;
      margin-top:15px;
    }
    
    .right-banner .panel{
      background-color: #fb0;
      padding: 20px 40px;
      background-image: url('assets/ganhar-btc-formulario-bg');
      margin-top: 120px;
      max-width: 83%;
      float: right;
      border-radius: 10px;
      background-position: center center;
    }
    .right-banner h3{
      margin-top: 0px;
      text-shadow: 2px 2px 2px rgba(0,0,0,0.22);
      font-size: 18px;
      margin-bottom:15px;
    }
    .right-banner h3 b{
      font-size: 20px;
    }
    .right-banner input{
      background-color: #fdfeff;
      padding: 25px 10px;
      font-size: 16px;
      border:none;
      border-radius:10px;
      
    }
    /* .right-banner .panel{
      background-color: #fb0;
      padding: 20px 40px;
    } */
    .video-bg{
      padding-top:50px;
      background-image: url('assets/ganhar-btc-destaque-video-parallax.jpg');
      background-size: cover;
      min-height:450px;
      padding-bottom: 50px;
    }

    .video-bg h2{
      font-size: 19px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 20px;
    text-shadow: 2px 2px 2px rgba(0,0,0,0.22);
    }

    .video-bg button{
      margin-top:30px;
    }

    .video-bg button:hover{
      color:white;
    }

    .arguments{
      padding-top:50px;
      padding-bottom: 70px;

    }
    .arguments h3{
      font-size: 26px;
      font-weight: bold;
    }

    .arguments .panel{
      background-color: #ccc;
      margin-top:20px;
      border-radius: 30px;
      padding: 10px 20px 30px 20px;
      background-image: url('assets/ganhar-btc-destaque-bg.jpg');
      background-position: center center;
    }
    .arguments .panel h3{
      font-size:16px;
      font-weight:bold;
      text-transform: uppercase;
    }

    .arguments hr{
      max-width: 20%;
      border-color:#000;
      background-color:#000;
      height:2px;
    }

    .learn{
      padding:50px 0px;
    }
    .learn h3{
      font-size: 26px;
      font-weight: bold;
    }
    .learn hr{
      max-width:80px;
      height:2px;
      border-color: #000;
      margin-top:10px;
      margin-bottom:25px;
    }

    .panel-group .panel {
        margin-bottom: 0;
        border-radius: 4px;
        border: none;
    }

    .panel-default>.panel-heading {
        color: #333;
        border-color: #ddd;
        border: none;
        border-bottom: 0px;
    }

    .panel-default>.panel-heading {
        color: #333;
        border-color: #ddd;
        border: none;
        border-bottom: 0px;
        background-color: #ffff;
        text-align: left;
    }
    
    .panel-title {
        margin-top: 0;
        margin-bottom: 0;
        font-size: 16px;
        color: inherit;
        background-color: white;
        font-weight: bold;
        font-size: 21px;
    }
    .shortcuts{
      background-color: #fb0;
      padding: 30px;
      color: white;
      font-size: 16px;
      margin-bottom: 20px;
    }
    .shortcuts a{
      color:white;
    }

    @media(max-width:990px){
      .masthead{
        background-image:url('admin/admin_php/uploads/<?php echo $imagem_mobile ?>');
      }
      .left-banner .logo{
        text-align:center;
      }
      .left-banner img{
        margin:0 auto;
      }
      .left-banner h1{
        font-weight:bold;
        margin-top: 40px;
        text-align:center;
      }
      .right-banner .panel{
        margin: 0 auto;
        float: none;
        max-width: 480px;
        margin-top: 40px;
      }
    }
    @media(max-width:480px){
      .left-banner .logo{
        text-align:center;
      }
      .left-banner h1{
        font-size:21px;
      }
      .left-banner p{
        font-size:14px;
      }
      .right-banner{
        padding:0px;
      }
      .right-banner .panel{
        padding:15px;
        margin: 0 auto;
        float: none;
        max-width: 480px;
        margin-top: 40px;
      }
      .right-banner h3 {
          margin-top: 0px;
          text-shadow: 2px 2px 2px rgba(0,0,0,0.22);
          font-size: 15px;
          margin-bottom: 15px;
      }
      .right-banner h3 b {
          font-size: 18px;
          margin-bottom: 5px;
      }
      .arguments h3 {
          font-size: 16px;
          font-weight: bold;
      }
      .panel-title {
          margin-top: 0;
          margin-bottom: 0;
          font-size: 16px;
          color: inherit;
          background-color: white;
          font-weight: bold;
          font-size: 14px;
      }
    }
  </style>

</head>

<body id="page-top">


  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container">
      

      <div class="col-md-6 text-left left-banner">
          <div class="logo">
              <a href="/">
                <img src="assets/ganhar-btc-logo.png" alt="" class="img-responsive">
              </a>
            </div>

        <h1><?php echo $titulo_site ?></h1>

        <p><?php echo $subtitulo_site ?></p>
      </div>

      <div class="col-md-5 col-md-offset-1 right-banner">
        <div class="panel">
          <h3>
            <b>Saiba como isso é possível!</b><br>
            Cadastre-se e assista ao vídeo
          </h3>
          <div class="form-news">
            <form id="cadastro_lead">
                <div class="form-group">
                    <input type="text" placeholder="Nome" name="nome" id="nome" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="email" placeholder="Email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="phone" placeholder="Whatsapp" name="whatsapp" id="whatsapp" class="form-control" required>
                  </div>
                <div class="form-group">
                    <input type="password" placeholder="Senha" name="senha" id="senha" class="form-control" required>
                  </div>
                <div class="form-group">
                    <input type="password" placeholder="Confirmar Senha" class="form-control" id="senha_confirm" required>
                </div>

                <input type="hidden" name="id_indicador" class="form-control" value="<?php echo $id_indicador ?>" id="id_indicador" required>

                <button class="btn btn-green">QUERO VER O VÍDEO</button>
                
            </form>
          </div>

        </div>
      </div>

    </div>
  </header>

  <!-- Portfolio Section -->
  <section class="page-section arguments" id="portfolio">
    <div class="container text-center">
      
      <div class="col-md-8 col-md-offset-2">
          <h3 class="main-testiomonial text-center"><?php echo $depoimento ?></h3>
          <span>
          <?php echo $depoimento_nome ?>
          </span>
      </div>

      
      
      <div class="row">
        <div class="col-md-12">

        <?php

          $obj = json_decode($depoimento_lista);

          if(sizeof($obj) > 0){
            foreach($obj as $row_json_depo)
            {
          ?>
          <div class="col-md-3 col-md-6 col-xs-12">
            <div class="panel">
              <h3><?php echo $row_json_depo->title ?></h3>
              <hr>
              <p>
                <?php echo $row_json_depo->text ?>
              </p>
            </div>
          </div>

          <?php

            }
          }
          ?>




        </div>
      </div>

    </div>
  </section>

  <!-- About Section -->
  <section class="page-section video-bg" id="about">
    <div class="container">

      <!-- About Section Heading -->
      <h2 class="page-section-heading text-center">ASSISTA AO VÍDEO E CONHEÇA MAIS SOBRE O PRODUTO</h2>

      <div class="col-md-6 col-md-offset-3 text-center">
          
          <img src="admin/admin_php/uploads/<?php echo $imagem_video ?>" alt="" class="img-responsive"/>
          
          <button class="btn btn-green" id="see-video">Quero ver o vídeo</button>
      </div>



    </div>
  </section>

  <section class="learn">
    <div class="container text-center">
      <h3>
          CONFIRA ALGUMAS DAS DÚVIDAS MAIS FREQUÊNTES
      </h3>
      <hr>

      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


          <?php

          $obj = json_decode($faq_lista);
          $counter = 0;
          
          if(sizeof($obj) > 0){
            foreach($obj as $row_json_depo)
            {
          ?>

          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading<?php echo $counter ?>">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $counter ?>" aria-expanded="true" aria-controls="collapseOne">
                  <?php echo $row_json_depo->title ?>
                </a>
              </h4>
              <i class="fa fa-plus"></i>
              <i class="fa fa-minus" style="display: none"></i>
            </div>
            <div id="collapse<?php echo $counter ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $counter ?>">
              <div class="panel-body">
              <?php echo $row_json_depo->text ?>
              </div>
            </div>
          </div>

          <?php
              $counter++;
              
            }
          }
          ?>
          
          <!-- <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
              <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Collapsible Group Item #2
                </a>
              </h4>
              <i class="fa fa-plus"></i>
              <i class="fa fa-minus" style="display: none"></i>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
              <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Collapsible Group Item #3
                </a>
              </h4>
              <i class="fa fa-plus"></i>
              <i class="fa fa-minus" style="display: none"></i>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
              <div class="panel-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
          </div> -->
        </div>

    </div>
  </section>

  <section class="shortcuts text-center">
    <a href="#">Termos</a> •
    <a href="#">Política de Privacidade</a> •
    <a href="#">Contato</a>
  </section>



  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>
          Copyright 2019 - BTC - Todos os direitos Reservados
          <br><br>
          Programa Leads FA Treinamentos Digitais LTDA - EPP | CNPJ 28.707.728/0001-77<br>
          Av. Das Américas 700 bl1 - Sala 331 - Rio de Janeiro /RJ | CEP 22640-100<br><br>
      </small>
    </div>
  </section>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

  <script>

    $(function(){

      
      $("#cadastro_lead").submit(function(e){

        //alert("Envia");

        e.preventDefault();
        $(".error-form").hide();

        var senha = $("#senha").val();
        var confirmacao = $("#senha_confirm").val();
        
        if(senha !== confirmacao){
          $(".right-banner .panel").append("<div class='error-form'>Senhas não correspondem</div>");

          return false;
        }

        var dados = $("#cadastro_lead").serialize();

        $.ajax({
				    type: "POST",  
				    url: "salvar_lead.php",
				    data: dados, 
				    success: function(response){  
              //console.log(response);
              if(JSON.parse(response).fail){
                $(".right-banner .panel").append("<div class='error-form'>" + JSON.parse(response).fail + "</div>");
              } else {
                $(".right-banner .panel").html("<h5>Agradeçemos seu contato, efetue seu login. \n <a target='_blank' href='/login.php'> Clique aqui </a></h5>");
              }

              $(".panel").focus();
              
				    	//alert("Agradeçemos seu contato, efetue seu login. \n " + window.location.href + "/indicador");
              //window.location.reload();
				    },
				    error: function(XMLHttpRequest, textStatus, errorThrown) { 
				        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
				    }       
				});
        
      })
    });

    $("#see-video").click(function(){
      $("#nome").focus();
    });

    $("#whatsapp")
        .mask("(99) 9999-9999?9")
        .focusout(function (event) {  
            var target, phone, element;  
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
            phone = target.value.replace(/\D/g, '');
            element = $(target);  
            element.unmask();  
            if(phone.length > 10) {  
                element.mask("(99) 99999-999?9");  
            } else {  
                element.mask("(99) 9999-9999?9");  
            }  
        });

    $('.panel-collapse').on('show.bs.collapse', function () {
      $(this).parent('.panel').find('.fa-minus').show();
      $(this).parent('.panel').find('.fa-plus').hide();
    })
    $('.panel-collapse').on('hide.bs.collapse', function () {
      $(this).parent('.panel').find('.fa-minus').hide();
      $(this).parent('.panel').find('.fa-plus').show();
    })
  </script>
</body>

</html>
