  @extends('layouts.layout')

  @section ('content')
  <div class="col-md-12 corpo">

      <div class="logo-honda"></div>

      <div class="col-md-12 logo text-center logo">
        <img src="/assets/logo.png">

          <p>Participe do Quiz de Fórmula 1 e <b>concorra ao<br> ingresso</b>
              para o GP do Brasil!</p>
      </div>

      <div class="col-md-8 col-md-offset-2 featured">


        <div class="col-md-6 text-left">
          <img class="icon-home" src="/assets/ico1.png">
          <div class="box-colored">
            <p>O GP Quiz da Honda tem três etapas com os temas:
                Competições da Honda, Filosofia Honda e Fórmula 1. Estude cada circuito e fique ainda mais por dentro dos temas!</p>
              <a href="/gpquiz2018/cockpit" class="button">CONFIRA</a>
          </div>

        </div>

        <div class="col-md-6 text-left">
          <img class="icon-home" src="/assets/ico2.png">
          <div class="box-colored">
            <p>Ligue seus motores, ao iniciar você deverá preencher seus dados e responder às
                20 questões de alternativa.
                <br><br>
                Vamos nessa?
            </p>
              <a href="/gpquiz2018/cadastro" class="button">INICIAR</a>
          </div>

        </div>

      </div>
     
  </div>
  @endsection