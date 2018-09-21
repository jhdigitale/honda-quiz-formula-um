  @extends('layouts.layout')

  @section ('content')
  <div class="col-md-12 corpo cockpit">

      <div class="col-md-12 logo text-center logo">
          <img src="/assets/logo.png">


      </div>
      <div class="col-md-8 col-md-offset-2 featured">
          <div class="col-md-12 text-center">
              <div class="box-colored options">
                  <p>Quer estudar um pouco antes de dar a largada?
                  <br>
                  Separamos três sites para que você possa começar os estudos.
                  <br>
                      <b>É só escolher uma das opções abaixo:</b>
                  </p>
                  <br>
                  <div class="col-md-12 text-center">
                      <a href="http://www.honda.com.br" class="button" target="_blank">Competições da Honda</a>
                  </div>
                  <div class="col-md-12 text-center">
                      <a href="http://en.hondaracingf1.com/heritage.html" class="button" target="_blank">Filosofia Honda</a>
                  </div>
                  <div class="col-md-12 text-center">
                      <a href="https://pt.wikipedia.org/wiki/F%C3%B3rmula_1" class="button" target="_blank">GP de Fórmula 1</a>
                  </div>

                  <div class="clearfix"></div>


              </div>


              <div class="col-md-12 text-center">
                  <a href="/gp2018/cadastro" class="button">COMEÇAR</a>
              </div>

              <!--<a href="gabarito.html" class="">
                 <imr src="">
              </a>-->
          </div>
      </div>
  </div>
  @endsection