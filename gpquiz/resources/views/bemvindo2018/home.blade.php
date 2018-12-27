@extends('layout_2019')

@section ('content')

    <style>
        @import url('https://fonts.googleapis.com/css?family=PT+Sans');

        .corpo{
            background-image: url('/assets/honda_bg_2019.jpg');
            padding-top: 80px;

        }

        @media(max-width:990px){
            .corpo {
                background-size: cover;
            }
        }

        .corpo h3{
            margin-bottom: 60px;
            font-size:40px;
            font-family: 'PT Sans', sans-serif;
        }

        .corpo img{
            margin-bottom: 30px;
        }
        .corpo p{
            font-size:30px;
            font-family: 'PT Sans', sans-serif;
            margin-top:20px;
            margin-bottom: 40px;
        }

        .logo-honda{
            position: absolute;
            right: 10%;
            margin-right: 0px;
        }

        .footer{
            background-color: #e44658;
            border-top: 0px;
            height: 40px;
        }
    </style>

    <div class="col-md-12 corpo">

        <div class="logo-honda">
            <img src="/assets/logo_honda.png" class="img-responsive" alt="" />
        </div>

        <div class="col-md-8 col-md-offset-2 text-center">

            <h3>Sejam bem-vindos a</h3>

            <img src="/assets/honda_2019.png" class="img-responsive" alt="Feliz 2019"/>

            <p>Assista a mensagem do presidente da Honda South America no vídeo abaixo:</p>

            <video width="100%" class="img-responsive" controls autoplay>
                <source src="/assets/Honda_Issao_legendada_menor_PT_181220.m4v" type="video/mp4">
                <source src="/assets/Honda_Issao_legendada_menor_PT_181220.webm" type="video/webm">
                Your browser does not support the video tag.
            </video>

        </div>

    </div>
@endsection