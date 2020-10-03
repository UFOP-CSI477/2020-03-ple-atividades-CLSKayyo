@extends('layouts.app')

@section('content')

    @if (session('mensagem'))
        <div class="alert alert-success">
            {{session('mensagem')}}
        </div>
    @endif
    @if (session('erro'))
        <div class="alert alert-danger">
            {{session('erro')}}
        </div>
    @endif

    <div class="row">
        <div class="col"><h1 class="title">Registros de Manutenção</h1></div>
        <div class="col">
            <a href="{{route('registros.create')}}"><button class="btn-adicionar btn btn-outline-success ml-auto">Criar Registro</button></a>
        </div>
    </div>

    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Data Limite</th>
                <th>ID</th>
                <th>Equipamento</th>
                <th>Usuário</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($registros as $registro)
                <tr>
                    <th scope="row">{{date('d/m/Y', strtotime($registro->datalimite))}}</th>
                    <td>{{$registro->id}}</td>
                    <td>{{$registro->equipamento->nome}}</td>
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
@endsection