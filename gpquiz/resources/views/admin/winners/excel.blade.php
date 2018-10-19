


        <div class="card-body">
          <div class="">
            <table class="table table-bordered" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                    <th>CPF</th>
                    <th>Matrícula</th>
                     <th>Planta</th>

                     <th>Acertos</th>
                  
                </tr>
              </thead>

              <tbody>

                @foreach ($registers as $register)
                <tr>
                      <th>{{ $register->id }}</th>
                      <th>{{ $register->name }}</th>
                        <th>{{ $register->cpf }}</th>
                        <th>{{ $register->register }}</th>
                        <th>{{ $register->local }}</th>

                  <th>{{ $register->correct }}</th>

                     
                        
                </tr>
                @endforeach
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    </div>
    