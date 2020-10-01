@extends('principal')

@section('conteudo')

<table class="table table-hover table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Unidade de Medida</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($produtos as $produto)
        <tr>
            <th scope="row">{{$produto->id}}</th>
            <td>{{$produto->nome}}</td>
            <td>{{$produto->um}}</td>
        </tr>
    @endforeach
    
  </tbody>
</table>

@endsection