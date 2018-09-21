<table width="100%" text-align="center">
    <tr width="100%" text-align="center">
        <td text-align="center"><img src="assets/logo.png"></td>
    </tr>
    <tr>
        <td><br><br><b>Nome</b>: {{ $data['user']->name }}</td>
    </tr>
    <tr>
        <td><b>Email</b>: {{ $data['user']->email }}</td>
    </tr>
    <tr>
        <td><b>Matrícula</b>:{{ $data['user']->register }}</td>
    </tr>
    <tr>
        <td><b>CPF</b>: {{ $data['user']->cpf }}</td>
    </tr>
    <tr>
        <td><b>Planta</b>: {{ $data['user']->local }}</td>
    </tr>
</table>

@foreach($data['questions'] as $question)


    <table>
        <tr>
            <td><h4>
                    {{$question->order}}.{{$question->question}}
                </h4>
            </td>
        </tr>

        @foreach($question->answers as $answer)

            <tr>
                <td>
                    @if($answer->order == $question->reposta)
                        <b>{{ $answer->answer }}</b>
                    @else
                        {{ $answer->answer }}
                    @endif

                </td>
            </tr>

        @endforeach

    </table>

@endforeach
