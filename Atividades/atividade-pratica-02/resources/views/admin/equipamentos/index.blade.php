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
        <div class="col"><h1 class="title">Equipamentos</h1></div>
        <div class="col">
            <a href="{{route('equipamentos.create')}}"><button class="btn-adicionar btn btn-outline-success ml-auto">Criar Equipamento</button></a>
        </div>
    </div>
    

    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de Criação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($equipamentos as $equipamento)
                <tr>
                    <th scope="row">{{$equipamento->id}}</th>
                    <td>{{$equipamento->nome}}</td>
                    <td>{{date('G:i:s d/m/Y',strtotime($equipamento->created_at))}}</td>
                    <td>
                        <a href="{{route('equipamentos.show', $equipamento->id)}}"><button class="btn btn-sm btn-outline-primary">Exibir</button></a>
                        <a href="{{route('equipamentos.edit', $equipamento->id)}}"><button class="btn btn-sm btn-outline-warning">Editar</button></a>
                        <form action="{{route('equipamentos.destroy', $equipamento->id)}}" method="post" class="excluir" onsubmit="return confirm('Tem certeza que deseja excluir {{$equipamento->nome}}?')">
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