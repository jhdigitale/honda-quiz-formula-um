  @extends('layouts.layout')

  @section ('content')
      <div class="col-md-12 corpo">
          <div class="logo-honda"></div>
          <div class="col-md-12 logo text-center logo">
              <img src="/assets/logo.png">
          </div>
          <div class="col-md-6 col-md-offset-3 featured">
              <div class="text-center">
                  <div class="box-colored gabarito">
                      <p>Baixe suas respostas para checar com o gabarito, que será divulgado, e ver como foi seu desempenho.</p>
                  </div>
                  <br>
                  <a href="/gpquiz2018/gabarito" target="_blank" class="button" id="parabens">DOWNLOAD</a>
              </div>
          </div>
      </div>


  @endsection

  @section('script')

          $("#parabens").click(function(){
            window.location.href = "/gpquiz2018/parabens";
          });

  @endsection