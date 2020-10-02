@extends('principal')

@section('conteudo')

<form action="{{route('produtos.update', $produto)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nome">Nome do Produto</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{$produto->nome}}">
    </div>
    <div class="form-group">
        <label for="um">Unidade de Medida</label>
        <input type="text" class="form-control" id="um" name="um" value="{{$produto->um}}">
        <small id="emailHelp" class="form-text text-muted">Sigla, no máximo 3 dígitos.</small>
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>

@endsection