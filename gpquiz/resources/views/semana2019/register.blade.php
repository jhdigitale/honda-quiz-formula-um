  @extends('layouts.semana2019.layout')

  @section ('content')
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <div class="col-md-12 corpo">
      <div class="col-md-12 logo text-center logo">
          <img src="/assets/sustentabilidade/logo.png" width="513">
      </div>
      <div class="col-md-12 featured no-padding-mobile">
          <div class="">
              <div class="col-md-10 col-md-offset-1 text-center no-padding-mobile">
                  <div class="col-md-12 text-center texto-ligue">
                      <div class="col-md-12 no-padding-mobile logo">
                          <p>Antes de começar o quiz, precisamos de algumas informações suas. <b>Preencha corretamente os campos e boa sorte!</b><br/><br/></p>
                      </div>
                  </div>
                  <form method="POST" action="/semana2019/cadastro" id="form-enviar">


                      {{ csrf_field() }}

                      <div class="col-md-10 col-md-offset-1 text-center">
                          <div class="col-md-12 no-padding-mobile">
                              <input class="form-control" type="text" placeholder="NOME" name="name" required="required" min-length="3" />
                          </div>
                          <div class="col-md-12 esp-margem email no-padding-mobile">
                              <input class="form-control" placeholder="E-MAIL*" type="email" name="email" required="required" min-length="3" />
{{--<small style="position: relative; font-weight: bold; bottom: 14px;">*Caso não tenha e-mail corporativo, inserir seu e-mail pessoal.</small>--}}
                          </div>
                          <div class="col-md-4 esp-margem matricula no-padding-right no-padding-mobile">
                              <input class="form-control" type="text" placeholder="MATRÍCULA" required="required" name="register" min-length="3" />
                          </div>
                          <div class="col-md-4 esp-margem cpf no-padding-mobile">
                              <input class="form-control" placeholder="CPF" data-format="cpf" name="cpf" required="required" min="3" min-length="3" />
                          </div>
                          <div class="col-md-4 esp-margem planta no-padding-left ">
                              <select class="" name="local" required="required" placeholder="PLANTA" required="required" min="3" min-length="3">

                                  <option value="">PLANTA</option>


                                  <option value="HSA">HSA</option>
                                  <option value="HRB-S">HRB-S</option>
                                  <option value="CPR">CPR</option>
                                  <option value="Peças-SUM">Peças-SUM</option>
                                  <option value="Peças-Indaiatuba">Peças-Indaiatuba</option>
                                  <option value="IPL">IPL</option>
                                  <option value="MQC">MQC</option>
                                  <option value="DEQ">DEQ</option>
                                  <option value="CT Recife">CT Recife</option>
                                  <option value="Paulínia">Paulínia</option>
                                  <option value="HAB I (Unidade Sumaré)">HAB I (Unidade Sumaré)</option>
                                  <option value="HAB II (Unidade Itirapina)">HAB II (Unidade Itirapina)</option>
                                  <option value="HDA (Unidade Manaus)">HDA (Unidade Manaus)</option>
                                  <option value="HEN">HEN</option>
                                  <option value="CETH Indaiatuba">CETH Indaiatuba</option>
                                  <option value="CETH Recife">CETH Recife</option>
                                  <option value="CETH Manaus">CETH Manaus</option>
                                  <option value="MORUMBI (HSF/HDA/BHB)">MORUMBI (HSF/HDA/BHB)</option>
                                  <option value="São Caetano do Sul">São Caetano do Sul</option>
                                  <option value="Jaboatão">Jaboatão</option>
                                  <option value="Benevides">Benevides</option>
                                  <option value="HAR">HAR</option>
                                  <option value="HSP">HSP</option>
                                  <option value="HDP">HDP</option>
                                  <option value="HMDC">HMDC</option>

                              </select>
                          </div>
                          <div class="clearfix"></div>
                          <br>
                          <div class="col-md-12 read-regulation no-padding-mobile">
                              <input type="checkbox" value="true" name="check" id="verificado"><span><b> Li e concordo com o <a href="/semana2019/regulamento" target="_blank">regulamento</a> da ação<br></b></span>
                          </div>
                          <br><br>

                          @if($errorRegister != null)
                           <script>
                            alert('{{$errorRegister}}');
                           </script>

                          @endif

                          <input type="hidden" name="quiz" id="quiz" value="2">

                          <div class="col-md-8 col-md-offset-2 esp-margem">
                              <a class="button" id="enviar">ENTRAR</a>
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
                alert("Preencha corretamente o campo: " + $(this).attr("placeholder"))
                $(this).focus();
                return false;
              } else {
                enviar = true;
              }
            });*/

            if($("input[name='name']").val().length < 3){
              alert("Preencha corretamente o campo: " + $("input[name='name']").attr("placeholder"));
              $("input[name='name']").focus();
            } else if($("input[name='email']").val().length < 3 || !validateEmail($("input[name='email']").val())){
              alert("Preencha corretamente o campo: " + $("input[name='email']").attr("placeholder"));
              $("input[name='email']").focus();
            } else if($("input[name='register']").val().length < 3){
              alert("Preencha corretamente o campo: " + $("input[name='register']").attr("placeholder"));
              $("input[name='register']").focus();
            } else if($("input[name='cpf']").val().length < 3){
              alert("Preencha corretamente o campo: " + $("input[name='cpf']").attr("placeholder"));
              $("input[name='cpf']").focus();
            }else if($("select[name='local']").val().length < 3){
              alert("Preencha corretamente o campo: PLANTA");
              $("select[name='local']").focus();
            } else if($("input[name='check']").is(':checked') != true){
              alert("Confirme a leitura do regulamento");
              $("input[name='check']").focus();
            } else {
              $("#form-enviar").submit();
            }

          });

    });

    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

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
