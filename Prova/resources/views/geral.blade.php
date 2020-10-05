<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        {{-- CSS --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/geral.css')}}">

        <title>Geral - DOE.Sys</title>
    </head>
    <body>

        <h1>Agendamentos marcados</h1>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                <th scope="col">Data</th>
                <th scope="col">Pessoa</th>
                <th scope="col">Local de Coleta</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agendamentos as $agendamento)
                    <tr>
                        <th scope="row">{{date('d/m/Y', strtotime($agendamento->data))}}</th>
                        <td>{{$agendamento->pessoa->nome}}</td>
                        <td>{{$agendamento->coleta->nome}}</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal{{$agendamento->id}}">
                            Exibir
                        </button></td>
                    </tr>

                    <div class="modal fade" id="modal{{$agendamento->id}}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Dados sobre Agendamento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><b>Data Agendada da Coleta:</b> {{date('d/m/Y', strtotime($agendamento->data))}}</p>
                                <p><b>ID da Pessoa:</b> {{$agendamento->pessoa->id}}</p>
                                <p><b>Nome da Pessoa:</b> {{$agendamento->pessoa->nome}}</p>
                                <p><b>Tipo sanguíneo:</b> {{$agendamento->pessoa->tipo}}</p>
                                <p><b>Nome do Local:</b> {{$agendamento->coleta->nome}}</p>
                                <p><b>Cidade:</b> {{$agendamento->coleta->cidade}}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach 
            </tbody>
        </table>

        <a href="{{url('/')}}"><button class="btn btn-warning">Voltar</button></a>
        
        {{-- Scripts --}}
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>