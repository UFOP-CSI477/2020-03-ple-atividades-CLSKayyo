@extends('layouts.app')

@section('title')

<title>DOE.Sys - Agendamentos</title>

@endsection

@section('content')

    <h1>Relatório de Agendamentos</h1>

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
                    </button>
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal" data-toggle="modal" data-target="#edit{{$agendamento->id}}">Editar</button>
                    </td>
                </tr>

                {{-- Modal com a descrição dos Agendamentos  --}}

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
                            <form action="{{route('agendamentos.destroy', $agendamento->id)}}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este agendamento?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                        </div>
                    </div>
                </div>

                {{-- Modal de edição de Agendamentos  --}}

                <div class="modal fade" id="edit{{$agendamento->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form method="post" action="{{route('agendamentos.update', $agendamento)}}">
                                @csrf
                                @method('put')
                                <div class="modal-header">
                                    <h5 class="modal-title">Editar Agendamento</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="pessoa_id">Pessoa</label>
                                        <select class="form-control" id="pessoa_id" name="pessoa_id">
                                            @foreach ($pessoas as $pessoa)
                                                <option value="{{$pessoa->id}}"
                                                    @if ($pessoa->id == $agendamento->pessoa->id)
                                                        selected
                                                    @endif
                                                >{{$pessoa->nome}} - {{$pessoa->tipo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="coleta_id">Local</label>
                                        <select class="form-control" id="coleta_id" name="coleta_id">
                                            @foreach ($coletas as $coleta)
                                                <option value="{{$coleta->id}}"
                                                    @if ($coleta->id == $agendamento->coleta->id)
                                                        selected
                                                    @endif
                                                >{{$coleta->nome}} - {{$coleta->cidade}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="data">Data</label>
                                        <input type="date" class="form-control" id="data" name="data" value="{{$agendamento->data}}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Editar Agendamento</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                        
            @endforeach 
        </tbody>
    </table>

    <div class="create-new">
        <button class="btn btn-outline-light" data-toggle="modal" data-target="#create-modal">Criar Novo Agendamento</button>
    </div>

    {{-- Modal de Criação de Agendamentos  --}}

    <div class="modal fade" id="create-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form class="modal-content" method="post" action="{{route('agendamentos.store')}}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Criar Agendamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="pessoa_id">Pessoa</label>
                        <select class="form-control" id="pessoa_id" name="pessoa_id">
                            @foreach ($pessoas as $pessoa)
                                <option value="{{$pessoa->id}}">{{$pessoa->nome}} - {{$pessoa->tipo}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="coleta_id">Local</label>
                        <select class="form-control" id="coleta_id" name="coleta_id">
                            @foreach ($coletas as $coleta)
                                <option value="{{$coleta->id}}">{{$coleta->nome}} - {{$coleta->cidade}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="data">Data</label>
                        <input type="date" class="form-control" id="data" name="data">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Adicionar Agendamento</button>
                </div>
            </form>
        </div>
    </div>

@endsection