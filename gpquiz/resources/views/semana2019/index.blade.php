  @extends('layouts.semana2019.layout')

  @section ('content')
  <div class="col-md-12 corpo">

      <div class="logo-honda"></div>

      <div class="col-md-12 logo text-center logo text-center">
        <img src="/assets/sustentabilidade/logo.png" width="513">

          <p>TESTE SEUS CONHECIMENTOS<br>
              PARA <b>CONCORRER</b> A <b>PRÊMIOS!</b></p>
      </div>

      <div class="col-md-8 col-md-offset-2 featured">


        <div class="col-md-12 block-home">
            Agora que a Semana da Sustentabilidade 2019 está chegando ao fim, é hora de rever os aprendizados e testar seus conhecimentos. Caso queira lembrar das condutas que sustentam um mundo melhor, clique em "Estudar"; se já estiver se sentindo pronto,
            é só escolher "Iniciar".

            <div class="col-md-12 text-center">
                <a href="/semana2019/estudo" class="button" style="margin-right: 10px;">
                    ESTUDAR
                </a>

                <a href="/semana2019/cadastro" class="button">
                    INICIAR
                </a>
            </div>

        </div>
        {{--<div class="col-md-6 text-left">--}}
          {{--<img class="icon-home" src="/assets/ico1.png">--}}
          {{--<div class="box-colored">--}}
            {{--<p><strong>O GP Quiz da Honda tem três etapas com os temas</strong>:--}}
                {{--Competições da Honda, Filosofia Honda e Fórmula 1. Estude cada circuito e fique ainda mais por dentro dos temas!</p>--}}
              {{--<a href="/gp2018/cockpit" class="button">CONFIRA</a>--}}
          {{--</div>--}}

        {{--</div>--}}

        {{--<div class="col-md-6 text-left">--}}
          {{--<img class="icon-home" src="/assets/ico2.png">--}}
          {{--<div class="box-colored">--}}
            {{--<p>Ligue seus motores. Ao iniciar você deverá preencher seus dados e responder às--}}
                {{--<strong>20 questões de alternativa.</strong>--}}
                {{--<br><br>--}}
                {{--<strong>Vamos nessa?</strong>--}}
            {{--</p>--}}
              {{--<a href="/gp2018/cadastro" class="button">INICIAR</a>--}}
          {{--</div>--}}

        {{--</div>--}}

      </div>
     
  </div>
  @endsection