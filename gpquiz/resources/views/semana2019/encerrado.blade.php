@extends('layouts.semana2019.layout')

@section ('content')
    <div class="col-md-12 corpo">
        <div class="logo-honda"></div>
        <div class="col-md-12 logo text-center logo">
            <img src="/assets/sustentabilidade/logo.png" width="513">
        </div>
        <div class="col-md-6 col-md-offset-3 featured">
            <div class="text-center">
                <div class="block-home encerramento">

                    <p class="text-center">Chegou a hora de descobrir quem foram os ganhadores do Quiz da Semana de Sustentabilidade que concorreram a kits especiais da Honda.
                    <br><br>
                    Agradecemos a participação de todos!
                    <br><br>
                    <b>HDA (unidade Manaus) / HAB Sumaré / HAB Itirapina</b>: a partir do dia 18/02 entrar em contato com o departamento de Comunicação de sua unidade para retirada dos prêmios. <b>Demais unidades</b>: aguarde o contato da área ESG para retirada do seu prêmio.


                    
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
                        background-color: #f38d00;
                        border-radius: 10px 10px 0px 0px
                    }

                    .header-tabela{
                        line-height: 34px;
                        color:white;
                        font-size: 14px;
                        display: block;
                        width: 100%;
                        float: left;
                        /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#ff3e3b+-1,ff3e3b+0,ff8e3f+95 */
                        background: #0075c1; /* Old browsers */
                        color: white;
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
                        border-right:1px solid #0075c1;
                    }

                    .corpo-tabela .linha{
                        background-color: #daf0ff;
                        float: left;
                        width: 100%;
                        line-height: 24px;
                        text-transform: uppercase;
                    }
                    .corpo-tabela .linha:nth-child(even)
                    {
                        background-color: #daf0ff;
                        color:black;
                    }
                </style>    

                <div class="tabela-ganhador">

                     <div class="titulo-tabela">
                        1º lugar • Kit: 1 Mochila de Couro Honda + 1 Capacete Honda
                     </div>   

                     <div class="header-tabela">
                        <div class="col-md-7 text-left">
                            NOME
                         </div>
                         <div class="col-md-2">
                            MATRICULA
                         </div>
          
                     </div>

                     <div class="corpo-tabela">
                       
                       @foreach($winners["semana_1"] as $ganhador)
                        
                        <div class="linha">
                            <div class="col-md-7 text-left">
                                {{ $ganhador->name }}
                             </div>
                             <div class="col-md-2">
                                {{ $ganhador->register }}
                            </div>
                        </div>
                        @endforeach

                     </div>  
                        
                </div> 

                <div class="tabela-ganhador">

                     <div class="titulo-tabela">
                        2º lugar • Kit: 1 Carteira de Couro Honda + 1 Chaveiro Couro Honda + 1 Necessaire 
                     </div>   

                     <div class="header-tabela">
                        <div class="col-md-7 text-left">
                            NOME
                         </div>
                         <div class="col-md-2">
                            MATRICULA
                         </div>
          
                     </div>

                     <div class="corpo-tabela">
                       
                       @foreach($winners["semana_2"] as $ganhador)
                        
                        <div class="linha">
                            <div class="col-md-7 text-left">
                                {{ $ganhador->name }}
                             </div>
                             <div class="col-md-2">
                                {{ $ganhador->register }}
                            </div>
                        </div>
                        @endforeach

                     </div>  
                        
                </div> 

                <div class="tabela-ganhador">

                     <div class="titulo-tabela">
                        3º lugar • Kit: 1 Porta-Cartão Couro Honda + 1 Estojo de Couro Honda
                     </div>   

                     <div class="header-tabela">
                        <div class="col-md-7 text-left">
                            NOME
                         </div>
                         <div class="col-md-2">
                            MATRICULA
                         </div>
          
                     </div>

                     <div class="corpo-tabela">
                       
                       @foreach($winners["semana_3"] as $ganhador)
                        
                        <div class="linha">
                            <div class="col-md-7 text-left">
                                {{ $ganhador->name }}
                             </div>
                             <div class="col-md-2">
                                {{ $ganhador->register }}
                            </div>
                        </div>
                        @endforeach

                     </div>  
                        
                </div> 

                <div class="tabela-ganhador">

                     <div class="titulo-tabela">
                        4º lugar • Kit: 1 Boné Honda + 1 Sacochila + 1 Chaveiro Honda (borracha)
                     </div>   

                     <div class="header-tabela">
                        <div class="col-md-7 text-left">
                            NOME
                         </div>
                         <div class="col-md-2">
                            MATRICULA
                         </div>
          
                     </div>

                     <div class="corpo-tabela">
                       
                       @foreach($winners["semana_4"] as $ganhador)
                        
                        <div class="linha">
                            <div class="col-md-7 text-left">
                                {{ $ganhador->name }}
                             </div>
                             <div class="col-md-2">
                                {{ $ganhador->register }}
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