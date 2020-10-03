@extends('suporte.navbar')

@section('content')

    <h1>Manutenções</h1>

    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Data Limite</th>
                <th>ID</th>
                <th>Equipamento</th>
                <th>Usuário</th>
                <th>Tipo</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection