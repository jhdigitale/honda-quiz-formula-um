@exteds('layout')

@section('content')

    <div class="col-md-12 corpo">


        <div class="col-md-12 logo text-center logo">
            <img src="assets/logo.png">
        </div>


        <div class="col-md-8 col-md-offset-2 featured">

            <div class="col-md-8 col-md-offset-2 text-center texto-ligue">
                <div class="col-md-12">
                    <p>Quer saber as respostas do quiz? Preencha o campo abaixo com seu CPF e descubra como foi sua performance.</p>

                </div>
            </div>

            <form action="acesso.php" method="post">
                <div class="col-md-8 col-md-offset-2 text-center">

                    <div class="col-md-4 col-md-offset-4 esp-margem cpf">
                        <label>CPF</label>
                        <input class="form-control" placeholder="CPF" data-format="cpf" name="cpf" required="required"></div>


                    <div class="col-md-6 col-md-offset-3 esp-margem planta">
                        <button type="submit" class="button" href="perguntas.html">ACESSAR</button>
                    </div>

                </div>
            </form>

        </div>

    </div>

@endsection