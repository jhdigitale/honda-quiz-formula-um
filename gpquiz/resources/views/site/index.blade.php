  @extends('layouts.layout')

  @section ('content')
  <div class="col-md-12 corpo">

      <div class="logo-honda"></div>

      <div class="col-md-12 logo text-center logo">
        <img src="/assets/logo.png">

          <p>PARTICIPE DO GP QUIZ DE
              FÓRMULA 1 E <b>CONCORRA A UM <br> INGRESSO</b>
              PARA O GP DO BRASIL!</p>
      </div>

      <div class="col-md-8 col-md-offset-2 featured">


        <div class="col-md-6 text-left">
          <img class="icon-home" src="/assets/ico1.png">
          <div class="box-colored">
            <p><strong>GP Quiz da Honda tem três etapas com os temas</strong>:
                Competições da Honda, Filosofia Honda e Fórmula 1. Estude cada circuito e fique ainda mais por dentro dos temas!</p>
              <a href="/gp2018/cockpit" class="button">CONFIRA</a>
          </div>

        </div>

        <div class="col-md-6 text-left">
          <img class="icon-home" src="/assets/ico2.png">
          <div class="box-colored">
            <p>Ligue seus motores, ao iniciar você deverá preencher seus dados e responder às
                <strong>20 questões de alternativa.</strong>
                <br><br>
                <strong>Vamos nessa?</strong>
            </p>
              <a href="/gp2018/cadastro" class="button">INICIAR</a>
          </div>

        </div>

      </div>
     
  </div>
  @endsection