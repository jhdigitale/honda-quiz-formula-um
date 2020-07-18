  @extends('layouts.site2019.layout')

  @section ('content')
  <div class="col-md-12 corpo">

      <div class="logo-honda"></div>

      <div class="col-md-12 logo text-center logo">
      <img src="/assets/gpquiz2019/logo.png">

          <p>
            COLOQUE SEU CONHECIMENTO À PROVA E <b>CONCORRA <br>
            A UM INGRESSO</b> PARA O GRANDE PRÊMIO DO BRASIL DE FÓRMULA 1!
          </p>
          
          
          <!-- PARTICIPE DO GP QUIZ DE
              FÓRMULA 1 E <b>CONCORRA A UM <br> INGRESSO</b>
              PARA O GP DO BRASIL! -->
      </div>

      <div class="col-md-8 col-md-offset-2 featured">


        <div class="col-md-6 text-left">
          <img class="icon-home" src="/assets/ico1.png">
          <div class="box-colored">
            <p><strong>O Grande Prêmio da Honda está dividido em 4 temas:</strong>
            Competições, Filosofia Honda, História da Marca e Segurança no Trânsito. Estude cada um deles e aprimore seus conhecimentos.</p>
              <a href="/gp2019/cockpit" class="button">CONFIRA</a>
          </div>

        </div>

        <div class="col-md-6 text-left">
          <img class="icon-home" src="/assets/ico2.png">
          <div class="box-colored">
            <p> Ligue seus motores! Primeiro, você deverá informar seus dados pessoais e, depois, responder às 
                <strong>20 questões de múltipla escolha.</strong>
                <br><br>
                <strong>BOA SORTE!</strong>
            </p>
              <a href="/gp2019/cadastro" class="button">INICIAR</a>
          </div>

        </div>

      </div>
     
  </div>
  @endsection