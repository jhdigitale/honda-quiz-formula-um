  @extends('layouts.layout')

  @section ('content')
  <div class="col-md-12 corpo">

      <div class="col-md-12 logo text-center logo">
          <img src="assets/logo.png">
      </div>
      <div class="col-md-6 col-md-offset-3 featured">
          <div class="col-md-10 col-md-offset-1 text-center">
              <div class="box-colored options">
                  <p>Separamos três sites em que poderá saber mais sobre a Honda e a Formula 1. Clique nos links abaixo:</p>
                  <div class="col-md-12 text-center">
                      <a href="http://www.honda.com.br" class="button" target="_blank">Honda Brasil</a>
                  </div>
                  <div class="col-md-12 text-center">
                      <a href="http://en.hondaracingf1.com/heritage.html" class="button" target="_blank">Honda na Fórmula 1</a>
                  </div>
                  <div class="col-md-12 text-center">
                      <a href="https://pt.wikipedia.org/wiki/F%C3%B3rmula_1" class="button" target="_blank">História e Regulamento da F1</a>
                  </div>

                  <div class="clearfix"></div>

                  <div class="col-md-12 text-center">
                      <a href="/cadastro" class="button bordered">ESTOU PREPARADO!</a>
                  </div>

              </div>

              <!--<a href="gabarito.html" class="">
                 <imr src="">
              </a>-->
          </div>
      </div>
  </div>
  @endsection