  @extends('layouts.layout')

  @section ('content')
  <div class="col-md-12 corpo">
      <small style="
          position: absolute;
          left: 10px;
          bottom: 20px;
      ">
                                *Caso não tenha e-mail corporativo, inserir seu e-mail pessoal.
                            </small>
      <div class="col-md-12 logo text-center logo">
          <img src="/assets/logo.png">
      </div>
      <div class="col-md-12 featured">
          <div class="">
              <div class="col-md-10 col-md-offset-1 text-center">
                  <div class="col-md-6 col-md-offset-3 text-center texto-ligue">
                      <div class="col-md-12">
                          <p>Enquanto os motores aquecem, por favor, preencha <br>
                             o formulário corretamente para a corrida começar.</p>
                      </div>
                  </div>
                  <form method="POST" action="/gp2018/cadastro" id="form-enviar">


                      {{ csrf_field() }}

                      <div class="col-md-10 col-md-offset-1 text-center">
                          <div class="col-md-12">
                              <input class="form-control" placeholder="NOME" name="name" required="required">
                          </div>
                          <div class="col-md-12 esp-margem email">
                              <input class="form-control" placeholder="E-MAIL" type="email" name="email" required="required">
                          </div>
                          <div class="col-md-4 esp-margem matricula no-padding-right">
                              <input class="form-control" placeholder="MATRÍCULA" required="required" name="register">
                          </div>
                          <div class="col-md-4 esp-margem cpf">
                              <input class="form-control" placeholder="CPF" data-format="cpf" name="cpf" required="required">
                          </div>
                          <div class="col-md-4 esp-margem planta no-padding-left">
                              <select class="select-control" name="local" required="required" placeholder="PLANTA">
                                  <option value="">UNIDADES</option>
                                  <option value="Manaus">Manaus</option>
                                  <option value="Morumbi, São Caetano, CETH Indaiatuba, Peças Indaiatuba, Jaboatão, Recife e Benevides">Morumbi, São Caetano, CETH Indaiatuba, Peças Indaiatuba, Jaboatão, Recife e Benevides</option>
                                  <option value="Sumaré (HAB, HSA, HRB-S, Peças, CT/MQC, Itirapina, Paulínia, Xangri-lá, Cariacica, Joinville)">Sumaré (HAB, HSA, HRB-S, Peças, CT/MQC, Itirapina, Paulínia, Xangri-lá, Cariacica, Joinville)</option>
                              </select>
                          </div>
                          <div class="clearfix"></div>
                          <br>
                          <div class="col-md-12" style="color:#000;">
                              <input type="checkbox" value="true" name="check" id="verificado"><span><b> Li e concordo com o <a href="/gp2018/regulamento">regulamento</a> da ação<br></b></span>
                          </div>
                          <br><br>
                          <div class="col-md-8 col-md-offset-2 esp-margem">
                              <a class="button" id="enviar">CONTINUAR</a>
                          </div>
                      </div>
                  </form>
                  <div class="clearfix"></div>
                  <br>

              </div>
          </div>
      </div>
  </div>
  @endsection

  @section('script')

    $(function(){
      $("input[data-format='cpf']").mask("000.000.000-00").blur(function () { vcpf($(this)[0]); });

      $("#enviar").click(function(e){
        var enviar = false;

          /*$('#form-enviar input,select').each(function(){
              if($(this).val().length <= 0){
                alert("Preencha corretamente o campo:" + $(this).attr("placeholder"))
                $(this).focus();
                return false;
              } else {
                enviar = true;
              }
            });*/

            if($("input[name='nome']").val() <= 0){
              alert("Preencha corretamente o campo: " + $("input[name='nome']").attr("placeholder"));
              $("input[name='nome']").focus();
            } else if($("input[name='email']").val() <= 0){
              alert("Preencha corretamente o campo: " + $("input[name='email']").attr("placeholder"));
              $("input[name='email']").focus();
            } else if($("input[name='matricula']").val() <= 0){
              alert("Preencha corretamente o campo: " + $("input[name='matricula']").attr("placeholder"));
              $("input[name='matricula']").focus();
            } else if($("input[name='cpf']").val() <= 0){
              alert("Preencha corretamente o campo: " + $("input[name='cpf']").attr("placeholder"));
              $("input[name='cpf']").focus();
            }else if($("select[name='planta']").val() <= 0){
              alert("Preencha corretamente o campo: PLANTA");
              $("select[name='planta']").focus();
            } else if($("input[name='check']").is(':checked') != true){
              alert("Confirme a leitura do regulamento");
              $("input[name='check']").focus();
            } else {
              $("#form-enviar").submit();
            }



          });

    });

    function vcpf(campo) {
      if (campo.value != '') {
        cpf = campo.value;
        cpf = cpf.replace(/\./g, '')
        cpf = cpf.replace(/\-/g, '')
        erro = new String;
        if (cpf.length < 11) { erro = "CPF inválido. Tente novamente." }
          var nonNumbers = /\D/;
        if (nonNumbers.test(cpf)) { erro = "CPF inválido. Tente novamente." }
          if (cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999") { erro = "CPF inválido. Tente novamente." }
            var a = [];
          var b = new Number;
          var c = 11;
          for (i = 0; i < 11; i++) {
            a[i] = cpf.charAt(i);
            if (i < 9) b += (a[i] * --c);
          }
          if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11 - x }
            b = 0;
          c = 11;
          for (y = 0; y < 10; y++) b += (a[y] * c--);
            if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11 - x; }
          if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10])) {
            erro = "CPF inválido. Tente novamente.";
          }
          if (erro.length > 0) {
            alert(erro);
            campo.value = '';
            campo.focus();
            return false;
          }
          return true;
        }
      }
  @endsection