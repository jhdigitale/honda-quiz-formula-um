  @extends('layouts.semana2019.layout')

  @section ('content')
      <div class="col-md-12 corpo">
          <div class="logo-honda"></div>
          <div class="col-md-12 logo text-center logo text-center">
              <img src="/assets/sustentabilidade/logo.png" width="513">
          </div>
          <div class="col-md-6 col-md-offset-3 featured">
              <div class="text-center">
                  <div class="box-colored gabarito">
                      <p><b>Baixe suas respostas</b> para checar com o gabarito, que será divulgado, e ver como foi seu desempenho.</p>
                  </div>
                  <br>
                  <a href="/semana2019/gabarito" target="_blank" class="button" id="parabens">DOWNLOAD</a>
              </div>
          </div>
      </div>


  @endsection

  @section('script')

          $("#parabens").click(function(e){

              e.preventDefault();
              var url = $(this).attr("href");

              var win = window.open(url, '_blank');
              win.focus();

              window.location.href = "/semana2019/parabens";
          });

  @endsection