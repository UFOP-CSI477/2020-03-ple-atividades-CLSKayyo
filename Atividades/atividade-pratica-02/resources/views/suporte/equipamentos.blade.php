@extends('suporte.navbar')

@section('content')

    <h1>Equipamentos</h1>

    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Nome</th>
                <th>ID</th>
                <th>Data de Criação</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($equipamentos as $equipamento)
                <tr>
                    <th scope="row">{{$equipamento->nome}}</th>
                    <td>{{$equipamento->id}}</td>
                    <td>{{date('G:i:s d/m/Y',strtotime($equipamento->created_at))}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection