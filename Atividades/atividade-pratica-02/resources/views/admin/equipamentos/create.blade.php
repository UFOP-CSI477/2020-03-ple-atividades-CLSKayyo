@extends('layouts.app')

@section('content')

    <div class="criar">
        <h1>Criar Novo Equipamento</h1>

        <form action="{{route('equipamentos.store')}}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Equipamento">
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Equipamento</button>
        </form>
    </div>
    

@endsection