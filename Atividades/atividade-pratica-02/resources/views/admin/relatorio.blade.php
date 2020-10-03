@extends('layouts.app')

@section('content')

    <h1>Relatório de Manutenções por Equipamento</h1>

    <div class="accordion" id="conjuntos-equipamentos">
        @foreach ($equipamentos as $equipamento)

            <div class="card">
                <div class="card-header" id="equipamento-{{$equipamento->id}}">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-{{$equipamento->id}}" aria-expanded="true" aria-controls="collapse-{{$equipamento->id}}">
                        {{$equipamento->nome}}
                        </button>
                    </h2>
                    </div>

                    <div id="collapse-{{$equipamento->id}}" class="collapse" aria-labelledby="equipamento-{{$equipamento->id}}" data-parent="#conjuntos-equipamentos">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Data Limite</th>
                                    <th>ID</th>
                                    <th>Usuário</th>
                                    <th>Tipo</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($equipamento->registros as $registro)
                                    <tr>
                                        <th scope="row">{{date('d/m/Y', strtotime($registro->datalimite))}}</th>
                                        <th>{{$registro->id}}</th>
                                        <td>{{$registro->user->name}}</td>
                                        <td>@if ($registro->tipo == 1)
                                            Preventiva
                                        @endif
                                        @if ($registro->tipo == 2)
                                            Corretiva
                                        @endif
                                        @if ($registro->tipo == 3)
                                            Urgente
                                        @endif</td>
                                        <td>
                                            <a href="{{route('registros.show', $registro->id)}}"><button class="btn btn-sm btn-outline-primary">Exibir</button></a>
                                            <a href="{{route('registros.edit', $registro->id)}}"><button class="btn btn-sm btn-outline-warning">Editar</button></a>
                                            <form action="{{route('registros.destroy', $registro->id)}}" method="post" class="excluir" onsubmit="return confirm('Tem certeza que deseja excluir este registro?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        @endforeach
    </div>

@endsection