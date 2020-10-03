@extends('layouts.app')

@section('content')

    <div class="criar">
        <h1>Editar Equipamento de ID {{$equipamento->id}}</h1>

        <form action="{{route('equipamentos.update', $equipamento)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Equipamento" value="{{$equipamento->nome}}">
            </div>
            <button type="submit" class="btn btn-primary">Editar Equipamento</button>
        </form>
    </div>
    

@endsection