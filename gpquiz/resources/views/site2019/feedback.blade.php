  @extends('layouts.site2019.layout')

  @section ('content')
      <div class="col-md-12 corpo">
          <div class="logo-honda"></div>
          <div class="col-md-12 logo text-center logo">
            <img src="/assets/gpquiz2019/logo.png">
          </div>
          <div class="col-md-6 col-md-offset-3 featured">
              <div class="text-center">
                  <div class="box-colored gabarito">
                      <p>Você pode baixar sua lista de respostas para conferir com o gabarito que será divulgado posteriormente.</p>
                  </div>
                  <br>
                  <a href="/gp2019/gabarito" target="_blank" class="button" id="parabens">DOWNLOAD</a>
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

              window.location.href = "/gp2019/parabens";
          });

  @endsection