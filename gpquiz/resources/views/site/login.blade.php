@extends('layouts.layout')

@section ('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="col-md-12 corpo">
        <div class="col-md-12 logo text-center logo">
            <img src="/assets/logo.png">
        </div>
        <div class="col-md-12 featured no-padding-mobile">
            <div class="">
                <div class="col-md-10 col-md-offset-1 text-center no-padding-mobile">
                    <div class="col-md-6 col-md-offset-3 text-center texto-ligue">
                        <div class="col-md-12 no-padding-mobile">
                            <!-- <p>
                                Enquanto os motores aquecem, por favor, <b>preencha</b> <br>
                                <b>o formulário</b> corretamente para a corrida começar.
                            </p> -->
                            <!-- <p>Digite seus dados, da mesma forma que colocou para responder ao Quiz e confira a sua pontuação.</p>
 -->
                            <p>Digite seus dados, da mesma forma que colocou para responder ao Quiz e confira a sua pontuação.</p>

                            <!-- <p>Na próxima semana, confira os ganhadores aqui no site e também nos canais de Comunicação Interna!</p> -->
                        </div>
                    </div>
                    <form method="POST" action="/gp2018/login" id="form-enviar">


                        {{ csrf_field() }}

                        <div class="col-md-6 col-md-offset-3 text-center">
                            {{--<div class="col-md-12 no-padding-mobile">--}}
                                {{--<input class="form-control" type="text" placeholder="NOME" name="name" required="required" min-length="3" />--}}
                            {{--</div>--}}
                            {{--<div class="col-md-12 esp-margem email no-padding-mobile">--}}
                                {{--<input class="form-control" placeholder="E-MAIL*" type="email" name="email" required="required" min-length="3" />--}}
                                {{--<small style="position: relative; font-weight: bold; bottom: 14px;">*Caso não tenha e-mail corporativo, inserir seu e-mail pessoal.</small>--}}
                            {{--</div>--}}
                            <div class="col-md-6 esp-margem matricula no-padding-right no-padding-mobile">
                                <input class="form-control" type="text" placeholder="MATRÍCULA" required="required" name="register" min-length="3" />
                            </div>
                            <div class="col-md-6 esp-margem cpf no-padding-mobile">
                                <input class="form-control" placeholder="CPF" data-format="cpf" name="cpf" required="required" min="3" min-length="3" />
                            </div>
                            {{--<div class="col-md-4 esp-margem planta no-padding-left ">--}}
                                {{--<select class="" name="local" required="required" placeholder="PLANTA" required="required" min="3" min-length="3">--}}
                                    {{--<option value="">PLANTA</option>--}}
                                    {{--<option value="Manaus">Manaus</option>--}}
                                    {{--<option value="Morumbi">Morumbi</option>--}}
                                    {{--<option value="São Caetano">São Caetano</option>--}}
                                    {{--<option value="CETH Indaiatuba">CETH Indaiatuba</option>--}}
                                    {{--<option value="Peças Indaiatuba">Peças Indaiatuba</option>--}}
                                    {{--<option value="Jaboatão">Jaboatão</option>--}}
                                    {{--<option value="Recife">Recife</option>--}}
                                    {{--<option value="Benevides">Benevides</option>--}}
                                    {{--<option value="Sumaré - HAB">Sumaré - HAB</option>--}}
                                    {{--<option value="Sumaré - HSA">Sumaré - HSA</option>--}}
                                    {{--<option value="Sumaré - HRB/CPR">Sumaré - HRB/CPR</option>--}}
                                    {{--<option value="Sumaré - Peças">Sumaré - Peças</option>--}}
                                    {{--<option value="Sumaré - CT/MQC">Sumaré - CT/MQC</option>--}}
                                    {{--<option value="Itirapina">Itirapina</option>--}}
                                    {{--<option value="Paulínia">Paulínia</option>--}}
                                    {{--<option value="Xangri-lá">Xangri-lá</option>--}}
                                    {{--<option value="Cariacica">Cariacica</option>--}}
                                    {{--<option value="Joinville">Joinville</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
                            <div class="clearfix"></div>
                            <br>
                            {{--<div class="col-md-12 read-regulation no-padding-mobile">--}}
                                {{--<input type="checkbox" value="true" name="check" id="verificado"><span><b> Li e concordo com o <a href="/gp2018/regulamento" target="_blank">regulamento</a> da ação<br></b></span>--}}
                            {{--</div>--}}
                            <br><br>

                            @if($errorRegister != null)
                                <script>
                                    alert('{{$errorRegister}}');
                                </script>

                            @endif


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

    if($("input[name='register']").val().length < 3){
        alert("Preencha corretamente o campo: " + $("input[name='register']").attr("placeholder"));
        $("input[name='register']").focus();
    } else if($("input[name='cpf']").val().length < 3){
        alert("Preencha corretamente o campo: " + $("input[name='cpf']").attr("placeholder"));
        $("input[name='cpf']").focus();
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
