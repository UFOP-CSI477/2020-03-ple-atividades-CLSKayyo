@extends('layouts.app')

@section('content')

    <h1>Dados do Equipamento</h1>

    <p><b>ID:</b> {{$equipamento->id}}</p>
    <p><b>Nome:</b> {{$equipamento->nome}}</p>
    <p><b>Criado em:</b> {{$equipamento->created_at}}</p>

@endsection