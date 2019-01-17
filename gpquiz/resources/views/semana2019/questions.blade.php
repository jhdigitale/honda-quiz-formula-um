@extends('layouts.semana2019.layout')

@section('content')
<div class="col-md-12 corpo carro">
    <div class="container">

        <div class="col-md-12 logo text-center logo text-center">
            <img src="/assets/sustentabilidade/logo.png" width="513">
        </div>

            <div class="col-md-12 no-padding text-left opcoes">
                <span class="questao">{{$question->question}}</span>

                @if($question->image)
                    {{--<img src="{{ url("/storage/question/{$question->image}") }}" class="img-responsive" alt="">--}}
                    <img src="/assets/questions/{{$question->image}}" class="img-responsive" alt="">

                @endif

                @foreach($question->answers as $answer)
                <button class="button resposta" id="q{{ $answer->order }}" data-resposta="{{ $answer->order }}">{{ $answer->answer }}</button>
                @endforeach
            </div>

            <form id="enviar-questao" method="POST" action="/semana2019/perguntas/{{$question->id}}/salvar">

                {{ csrf_field() }}

                <input type="hidden" name="answer" id="answer" value="0"/>

            </form>

            <div class="col-md-12 text-center">
                <button type="button" class="button" id="proxima">CONFIRMAR</button>
            </div>

            <br><br><br>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/countdown/2.6.0/countdown.js"></script>

    <script>

    </script>
@endsection

@section ('script')

    $(function(){
        $('#proxima').click(function(e){
            var resposta = $(".opcoes .button.active").data('resposta');

            if(resposta != undefined){
                $("#answer").val(resposta);
                $("#enviar-questao").submit();
            } else {
                alert('Favor selecionar uma resposta');
            }

        });

        $(".resposta").click(function() {
            $("#proxima").show();
            $(".resposta").removeClass("active");
            $(this).addClass("active");
        });



        {{--var seconds = 30;--}}
        {{--var el = $('#zero');--}}

        {{--function incrementSeconds() {--}}

            {{--seconds -= 1;--}}
            {{--if(seconds < 10){--}}
                {{--el.text("0" + seconds.toString());--}}
            {{--} else {--}}
                {{--el.text(seconds.toString());--}}
            {{--}--}}


            {{--if(seconds <= 0){--}}
                {{--$('#enviar-questao').submit();--}}
                {{--clearInterval(cancel);--}}

            {{--}--}}

        {{--}--}}

        {{--var cancel = setInterval(incrementSeconds, 1000);--}}


    });



@endsection