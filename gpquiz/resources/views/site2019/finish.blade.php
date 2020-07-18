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

                    <!-- <p>OBRIGADO PELA PARTICIPAÇÃO!</p> -->

                    <p>AGRADECEMOS A SUA PARTICIPAÇÃO!</p>

                    <h3>Você acertou</h3>
                    <h1 style="color: #ff3d3b; font-size: 35px;">{{ $register->correct }} de 20</h1>

                    <p>Confira todas as respostas corretas em nosso gabarito:</p>
                </div>
                <br>
                <a href="/assets/gabarito_gpquiz2019.pdf" target="_blank" class="button" id="parabens">GABARITO</a>
            </div>
        </div>
    </div>


@endsection

@section('script')

    {{--$("#parabens").click(function(e){--}}

    {{--e.preventDefault();--}}
    {{--var url = $(this).attr("href");--}}

    {{--var win = window.open(url, '_blank');--}}
    {{--win.focus();--}}

    {{--window.location.href = "/gp2018/parabens";--}}
    {{--});--}}

@endsection