@extends('layouts.app')

@section('content')

    <h1>Usuários</h1>

    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Nome</th>
                <th>ID</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($usuarios as $usuario)
                <tr>
                    <th scope="row">{{$usuario->name}}
                    @if ($usuario->id == Auth::user()->id)
                        <sub> você</sub>
                    @endif
                    </th>
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->email}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection