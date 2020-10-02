@extends('principal')

@section('conteudo')

<form action="{{route('produtos.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="nome">Nome do Produto</label>
        <input type="text" class="form-control" id="nome" name="nome">
    </div>
    <div class="form-group">
        <label for="um">Unidade de Medida</label>
        <input type="text" class="form-control" id="um" name="um">
        <small id="emailHelp" class="form-text text-muted">Sigla, no máximo 3 dígitos.</small>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

@endsection