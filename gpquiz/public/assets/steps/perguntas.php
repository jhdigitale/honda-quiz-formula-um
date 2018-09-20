<?php include ("dbconect.php"); ?>
<!-- ENVIANDO PARA O EMAIL -->

<?php

$nome = (utf8_decode($_POST['nome']));
$email = $_POST['email'];
$matricula = $_POST['matricula'];
$cpf = $_POST['cpf'];
$planta = $_POST['planta'];

$sql = ("SELECT * FROM hq_quiz where email = '$email' and matricula = '$matricula'");

            $resultado = mysqlexecuta($id,$sql);
            $qtd = mysql_num_rows($resultado);

            if($qtd > 0 ) {
              $msg = "Desculpe, mas só é permitido uma participação por colaborador.";
            } else {
                //Inclui o cadastro no mysql
                $sql_inclu = "INSERT INTO `hq_quiz`(`nome`,`email`,`matricula`,`cpf`,`planta`) VALUES 
                ('$nome','$email', '$matricula', '$cpf', '$planta')";
                $exe_inclu = mysql_query($sql_inclu) or die (mysql_error());
                $biler = mysql_insert_id();
             
                $msg = "SUA PARTICIPAÇÃO FOI REGISTRADA CRUZE OS DEDOS";
            }

?>

<?php 
/*  executa um comando SQL no banco de dados*/ 
function mysqlexecuta($id,$dbname,$erro = 1) { 
    if(empty($dbname) OR !($id)) 
       return 0; //Erro na conexão ou no comando SQL   
   if (!($res = @mysql_query($dbname,$id))) { 
      if($erro) 
        echo "Ocorreu um erro.";
      exit;
   } 
    return $res; 
}

?>
<?php include ("dbconect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>GP Quiz - Honda</title>

  <script src="http://code.jquery.com/jquery-1.7.1.js"></script>
  <script src="http://code.jquery.com/ui/1.8.22/jquery-ui.min.js"></script>
  <script src="js/libs/plg/bootstrap.min.js"></script>
  <script src="js/jquery.slides.min.js"></script>

  <!-- Bootstrap core CSS -->
  <link href="css/libs/bootstrap.min.css" rel="stylesheet">


   <style>
    @import url(http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500italic,500,700,700italic,900italic,900);

    html, body {
      height: 100%;
    }
    body{
      background-image: url('assets/bg.jpg');
      height: 100%;
      font-family: 'Roboto', sans-serif;
      background-size: 110%;
      background-repeat: no-repeat;

    }

    .button{
          border-radius: 30px;
    background-color: transparent;
    border: 2px solid #fff;
    padding: 10px;
    width: 100%;
    color: #000;
    font-size: 16px;
    margin-top: 10px;
    text-align: left;
    background-color: #fff;
    }
    .button.active{
      border-color:red;
      color:red;
    }
    
    p{
      color: #ffffff;
      margin-top: 10px;
    }
    .form-control{
          border-radius: 20px;
    background-color: #e4e4e4;
    }

   footer{
    width: 100%;
    position: relative;
    height: 50px;
    border-top: 4px solid #ff9e0d;
    bottom: 0px;
    background-color: green;
    color: white;
    padding:10px;
   }
   .logo{
    padding-top: 75px;
   }
   .featured{
    padding-top: 0px;
   }
   .velocimetro{
    position: absolute;
    margin:0 auto;
    width: 990px;
    left:0;
    right: 0;
    top:370px;

   }
   .esp-margem{
    margin-top: 25px;
    text-align: center;
   }
   .email input{
    width:80%;
    margin:0 auto;
   }
   .matricula input{
    width:80%;
    margin:0 auto;
   }
   .planta select{
    width:80%;
    margin:0 auto;
   }

   .bg-contador{
       background-image: url('assets/contador.png');
    height: 130px;
    width: 240px;
    color: white;
    font-size: 28px;
    padding-top: 75px;
    letter-spacing: 16px;
    text-indent: 6px;
        margin-top: 50px;

   }
   .proximo{
    display: none;
          border-radius: 30px;
          background-color: transparent;
          border: 2px solid #fff;
          padding: 10px;
          width: 120px;
          color: white;
          font-size: 16px;
          margin-top: 10px;
              float: right;
    }
    .mapa{
          padding-top: 150px;
    }

    .questao{
      color: white;
    }


   .sidebarmenu{
       position: absolute;
    left: -260px;
    width: 260px;
    height: 100%;
    background-color: green;
    z-index: 8;
    padding-top: 80px;

  }

  .sidebarmenu ul{
        width: 80%;
    line-height: 20px;
    padding-left: 26px;
    color: white;
  }

  .sidebarmenu li {
      border-bottom: 1px solid orange;
      display: inline-block;
      width: 100%;
      color: white;
      line-height: 30px;
  }

  .sidebarmenu li a{
    color:white;
  }


/* NAV 1 */
 #nav-toggle {
        position: absolute;
    left: 50px;
    top: 40px;
    height: 50px;
    width: 50px;
    cursor: pointer;
    -webkit-transform: translateX(-50%) translateY(-50%);
    -moz-transform: translateX(-50%) translateY(-50%);
    -ms-transform: translateX(-50%) translateY(-50%);
    -o-transform: translateX(-50%) translateY(-50%);
    transform: translateX(-50%) translateY(-50%);
    z-index: 9;
}
#nav-toggle span, #nav-toggle span:before, #nav-toggle span:after {
    cursor: pointer;
    border-radius: 1px;
    height: 2px;
    width: 35px;
    background: white;
    position: absolute;
    left: 0;
    top: 50%;
    display: block;
    content:'';
}
#nav-toggle span:before {
    top: -10px;
}
#nav-toggle span:after {
    top: 10px;
}
#nav-toggle span, #nav-toggle span:before, #nav-toggle span:after {
    transition: all 0.5s ease-in-out;
}
#nav-toggle.active span {
    background-color: transparent;
}
#nav-toggle.active span:before, #nav-toggle.active span:after {
    top: 0;
}
#nav-toggle.active span:before {
    transform: rotate(135deg);
}
#nav-toggle.active span:after {
    transform: rotate(-135deg);
}
/* NAV 2 */
 .cd-primary-nav-trigger {
    position: absolute;
    right: 50%;
    top: 50%;
    height: 50px;
    width: 50px;
    background-color: #03263d;
}
.cd-primary-nav-trigger .cd-menu-icon {
    /* this span is the central line of the menu icon */
    display: inline-block;
    position: absolute;
    left: 50%;
    top: 50%;
    bottom: auto;
    right: auto;
    -webkit-transform: translateX(-50%) translateY(-50%);
    -moz-transform: translateX(-50%) translateY(-50%);
    -ms-transform: translateX(-50%) translateY(-50%);
    -o-transform: translateX(-50%) translateY(-50%);
    transform: translateX(-50%) translateY(-50%);
    width: 35px;
    height: 2px;
    background-color: white;
    -webkit-transition: background-color 0.3s;
    -moz-transition: background-color 0.3s;
    transition: background-color 0.3s;
    /* these are the upper and lower lines in the menu icon */
}
.cd-primary-nav-trigger .cd-menu-icon::before, .cd-primary-nav-trigger .cd-menu-icon:after {
    content:'';
    width: 100%;
    height: 100%;
    position: absolute;
    background-color: white;
    right: 0;
    -webkit-transition: -webkit-transform .3s, top .3s, background-color 0s;
    -moz-transition: -moz-transform .3s, top .3s, background-color 0s;
    transition: transform .3s, top .3s, background-color 0s;
}
.cd-primary-nav-trigger .cd-menu-icon::before {
    top: -10px;
}
.cd-primary-nav-trigger .cd-menu-icon::after {
    top: 10px;
}
.cd-primary-nav-trigger .cd-menu-icon.is-clicked {
    background-color: rgba(255, 255, 255, 0);
}
.cd-primary-nav-trigger .cd-menu-icon.is-clicked::before, .cd-primary-nav-trigger .cd-menu-icon.is-clicked::after {
    background-color: white;
}
.cd-primary-nav-trigger .cd-menu-icon.is-clicked::before {
    top: 0;
    -webkit-transform: rotate(135deg);
    -moz-transform: rotate(135deg);
    -ms-transform: rotate(135deg);
    -o-transform: rotate(135deg);
    transform: rotate(135deg);
}
.cd-primary-nav-trigger .cd-menu-icon.is-clicked::after {
    top: 0;
    -webkit-transform: rotate(225deg);
    -moz-transform: rotate(225deg);
    -ms-transform: rotate(225deg);
    -o-transform: rotate(225deg);
    transform: rotate(225deg);
}
.questoes-while 
{
  display: none;
}
@media(max-width: 667px){
  body{
    background-image:none;
    background-color: black;
  }
  .bg-contador{
        margin-bottom: 30px;
  }
  .cockpit{
    margin-bottom: 20px;
  }
  .no-padding-right{
     padding-right:15px;
   }
   .no-padding-left{
     padding-left:15px;
   }

}

   </style>
</head>

<body>
<div class="logo-honda" style="
    position: absolute;
    right: 20px;
    top: 30px;
">
    <img src="assets/logo_honda.png">
  </div>

<a id="nav-toggle" href="#"><span></span></a>

  <div class="sidebarmenu">
               <ul>
                <li>
                  <a href="index.html">GP Quiz Honda </a>
                </li>
                <li>
                  <a href="regulamento.html">Regulamento</a>
                </li>
                <li>
                  <a href="premio.html">Prêmios</a>
                </li>
               </ul>
         </div>

  <script>
  $("#nav-toggle").click(function(){
    
    if($(this).hasClass("active")){
      $(this).removeClass("active");
    } else {
      $(this).addClass("active");
    }
  });

    $(document).ready(function() {


        $('#nav-toggle').click(function() {
        var hidden = $(this).hasClass("active");
        //$('#nav-toggle').text(hidden ? 'Hide Menu' : 'Show Menu');
        if(hidden){
            $('.sidebarmenu').animate({
                left: '0px'
            },500)
        } else {
            $('.sidebarmenu').animate({
                left: '-260px'
            },500)
        }
        //$('.sidebarmenu,.image').data("hidden", !hidden);

        });
    }); 

   
  </script>

  
  <div class="col-md-12">


      <div class="col-md-6 logo text-center logo">
        <div class="col-md-6">
          <img src="assets/logo.png">
        </div>
        <div class="col-md-6 bg-contador" id="bg-contador">
         00:00
        </div>

        <div class="col-md-12 text-left">


        <?php
          // definições de host, database, usuário e senha
          $host = "bdquiz.mysql.dbaas.com.br";
          $db   = "devmedia";
          $user = "bdquiz";
          $pass = "e3707717";
          // conecta ao banco de dados
          $con = mysql_pconnect($host, $user, $pass) or trigger_error(mysql_error(),E_USER_ERROR); 
          // seleciona a base de dados em que vamos trabalhar
          mysql_select_db($db, $con);
          // cria a instrução SQL que vai selecionar os dados
          $query = sprintf("SELECT * FROM hq_quiz_questoes");
          // executa a query
          $dados = mysql_query($query, $con) or die(mysql_error());
          // transforma os dados em um array
          $linha = mysql_fetch_assoc($dados);
          // calcula quantos dados retornaram
          $total = mysql_num_rows($dados);
          ?>

          <?php
            // se o número de resultados for maior que zero, mostra os dados
            if($total > 0) {
              
              do {
          ?>

                <div class="questoes-while">
                  <span class="questao"><?=utf8_encode($linha['titulo'])?></span>
                  <button class="button resposta" id="q1" data="1"><?=utf8_encode($linha['questao1'])?></button>
                  <button class="button resposta" id="q2" data="2"><?=utf8_encode($linha['questao2'])?></button>
                  <button class="button resposta" id="q3" data="3"><?=utf8_encode($linha['questao3'])?></button>
                  <button class="button resposta" id="q4" data="4"><?=utf8_encode($linha['questao4'])?></button>
                </div>

          <?php
              // finaliza o loop que vai mostrar os dados
              }while($linha = mysql_fetch_assoc($dados));
            // fim do if 
            }?>

          

          <form action="gabarito.php" method="post">
              <input type="hidden" id="usuario" name="usuario" value="<?php echo $biler ?>">
              <input type="hidden" id="resposta-enviar" name="resposta"/> 
          </form>

          <button type="button" class="proximo">PROXIMO</button>
          <br><br><br>
        </div>



        <script>
          function setQuestao(num){
            $(".questoes-while").hide()
            $($(".questoes-while")[num]).fadeIn();
          }

          var num = 0;
          var respostas_usuario = "";
          var resposta_setada = "";
      

          $(function(){

              setQuestao(0);

              $(".proximo").click(function(){
                $(this).hide();
                respostas_usuario = respostas_usuario + resposta_setada + ",";
                var objetos_finais = [];
                num++;
                clearInterval(timer);
                        count = arguments[0];
                        counting = false;
                        start(30);

                if(num > 19){
                   $("#resposta-enviar").val(respostas_usuario);
                   //alert(respostas_usuario);
                   //window.location.href="gabarito.html";
                   $("form").submit();
                }

                $(".mapa img").attr("src", "assets/steps/pista-"+ (num + 1) +".png");
                setQuestao(num);
                $(".resposta").removeClass("active");
                
              });

              
              $(".resposta").click(function(){
                $(".proximo").show();
                $(".resposta").removeClass("active");
                $(this).addClass("active");

                resposta_setada = $(this).attr("data");
              });

          
        });


        var log = document.getElementById("bg-contador");
        //var btn = document.getElementById("btn");
        var counting = false;
        var timer;

        function start(count) {
            //console.log(counting);
            if (!counting) {
                counting = true;
                log.innerHTML = "00:" + count;
                timer = setInterval(function() {
                    if (count > 0) {
                        if(count < 9){
                          log.innerHTML = "00:0" + count;
                        }else {
                          log.innerHTML = "00:" + count;
                        }
                        
                        count--;
                    } else {
                        clearInterval(timer);
                        count = arguments[0];
                        counting = false;

                        start(30);
                        respostas_usuario = respostas_usuario + 0 + ",";
                        var objetos_finais = [];
                        num++;
                        if(num > 19){
                           $("#resposta-enviar").val(respostas_usuario);
                           //alert(respostas_usuario);
                           //window.location.href="gabarito.html";
                           $("form").submit();
                        }

                        $(".mapa img").attr("src", "assets/steps/pista-"+ (num + 1) +".png");
                        setQuestao(num);
                        $(".resposta").removeClass("active");
                        
                    }
                }, 1000);
            }
        }

        
         start(30);
        </script>

      </div>

      <div class="col-md-6 mapa hidden-xs hidden-sm">
        <img src="assets/steps/pista-1.png" />
      </div>
      
      

  </div>

  <div class="clearfix"></div>
  <footer class="footer">
    <div class="col-md-6">
    2016 @ Honda - Todos os direitos Reservados
    </div>
    <div class="col-md-6">
    GP Quiz Honda
    </div>
  </footer>

</body>
</html>
