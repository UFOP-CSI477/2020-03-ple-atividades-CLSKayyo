@extends('principal')

@section('conteudo')

<h1>Dados do Produto de ID {{$produto->id}}</h1>

<p>O produto de nome {{$produto->nome}} tem a unidade de medida {{$produto->um}}</p>

<a href="{{route('produtos.edit', $produto->id)}}">Editar</a>
<a href="{{route('produtos.index')}}">Voltar</a>

<form name="delete" action="{{route('produtos.destroy', $produto->id)}}" method="post" onsubmit="return confirm('Tem certeza que quer excluir {{$produto->nome}}?')">

    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger">Excluir</button>

</form>

@endsection