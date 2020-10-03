@extends('layouts.app')

@section('content')

    <h1>Dados do Registro de Manutenção</h1>

    <p><b>ID:</b> {{$registro->id}}</p>
    <p><b>Equipamento:</b> <a href="{{route('equipamentos.show', $registro->equipamento->id)}}">{{$registro->equipamento->nome}}</a></p>
    <p><b>Criador do registro:</b> {{$registro->user->name}}</p>
    <p><b>Data Limite para realização da Manutenção:</b> {{$registro->datalimite}}</p>
    <p><b>Descrição da Manutenção:</b> {{$registro->descricao}}</p>

@endsection