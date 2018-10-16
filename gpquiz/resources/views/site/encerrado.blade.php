@extends('layouts.layout')

@section ('content')
    <div class="col-md-12 corpo">
        <div class="logo-honda"></div>
        <div class="col-md-12 logo text-center logo">
            <img src="/assets/logo.png">
        </div>
        <div class="col-md-6 col-md-offset-3 featured">
            <div class="text-center">
                <div class="box-colored encerramento">

                    <p class="text-left">O GP Quiz 2018 chegou ao fim. Foi uma competição com centenas de pilotos habilidosos colocando seus conhecimentos à prova nos 3 circuitos: de Competições, de Filosofia e de Fórmula 1. <b>Agradecemos a todos que participaram!</b>
                    <br><br>
                    Agora chegou a hora de descobrir quais são os ganhadores do GP Quiz 2018, <b>que irão curtir o GP do Brasil em Interlagos com tudo pago. E confira também, os pilotos sortudos que ganharam nosso kit especial:</b></p>


                   
                    
                    <div class="clearfix"></div>

                </div>
                <br>

                <style type="text/css">
                    .box-colored{
                        width: 100%;
                        max-width: 100%;
                        text-align: justify;
                    }
                    .tabela-ganhador{
                        margin-bottom: 20px;
                        display: block;
                        width: 100%;
                        float: left;
                    }

                    .titulo-tabela{
                        line-height: 34px;
                        color:white;
                        font-size: 14px;
                        /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#ff8e3f+0,ff3e3b+100 */
                        background: #ff8e3f; /* Old browsers */
                        background: -moz-linear-gradient(left, #ff8e3f 0%, #ff3e3b 100%); /* FF3.6-15 */
                        background: -webkit-linear-gradient(left, #ff8e3f 0%,#ff3e3b 100%); /* Chrome10-25,Safari5.1-6 */
                        background: linear-gradient(to right, #ff8e3f 0%,#ff3e3b 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
                        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff8e3f', endColorstr='#ff3e3b',GradientType=1 ); /* IE6-9 */
                    }

                    .header-tabela{
                        line-height: 34px;
                        color:white;
                        font-size: 14px;
                        display: block;
                        width: 100%;
                        float: left;
                        /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#ff3e3b+-1,ff3e3b+0,ff8e3f+95 */
                        background: #ff3e3b; /* Old browsers */
                        background: -moz-linear-gradient(left, #ff3e3b -1%, #ff3e3b 0%, #ff8e3f 95%); /* FF3.6-15 */
                        background: -webkit-linear-gradient(left, #ff3e3b -1%,#ff3e3b 0%,#ff8e3f 95%); /* Chrome10-25,Safari5.1-6 */
                        background: linear-gradient(to right, #ff3e3b -1%,#ff3e3b 0%,#ff8e3f 95%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
                        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff3e3b', endColorstr='#ff8e3f',GradientType=1 ); /* IE6-9 */
                    }

                    @media(max-width: 990px){
                        .header-tabela{
                            display: none;
                        }

                        .corpo-tabela .linha div{
                            text-align: center !important;
                        }

                    }

                    .header-tabela div{
                        border-right:1px solid #ff8e3f;
                    }

                    .corpo-tabela .linha{
                        background-color: #ffe0cb;
                        float: left;
                        width: 100%;
                        line-height: 24px;
                    }
                    .corpo-tabela .linha:nth-child(even)
                    {
                        background-color: #fff9eb;
                        color:black;
                    }
                </style>    

                <div class="tabela-ganhador">

                     <div class="titulo-tabela">
                        PÓDIO GP QUIZ – Colaboradores que irão ao GP do Brasil
                     </div>   

                     <div class="header-tabela">
                        <div class="col-md-8 text-left">
                            NOME
                         </div>
                         <div class="col-md-2">
                            MATRICULA
                         </div>
                         <div class="col-md-2">
                            UNIDADE
                         </div>   
                     </div>

                     <div class="corpo-tabela">
                       
                       @foreach($winners["gahadores"] as $ganhador)
                        
                        <div class="linha">
                            <div class="col-md-8 text-left">
                                {{ $ganhador->name }}
                             </div>
                             <div class="col-md-2">
                                {{ $ganhador->register }}
                             </div>
                             <div class="col-md-2">
                                {{ $ganhador->local }}
                             </div>   
                        </div>
                        @endforeach

                     </div>  
                        
                </div> 


                <div class="tabela-ganhador">

                     <div class="titulo-tabela">
                        GANHADORES DO KIT ESPECIAL
                     </div>   

                     <div class="header-tabela">
                        <div class="col-md-8 text-left">
                            NOME
                         </div>
                         <div class="col-md-2">
                            MATRICULA
                         </div>
                         <div class="col-md-2">
                            UNIDADE
                         </div>   
                     </div>

                     <div class="corpo-tabela">

                        @foreach($winners["kit"] as $ganhador)
                        
                        <div class="linha">
                            <div class="col-md-8 text-left">
                                {{ $ganhador->name }}
                             </div>
                             <div class="col-md-2">
                                {{ $ganhador->register }}
                             </div>
                             <div class="col-md-2">
                                {{ $ganhador->local }}
                             </div>   
                        </div>
                        @endforeach

                     </div>  
                        
                </div>     
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