@extends('layouts.app')

@section('content')

    <div class="criar">
        <h1>Criar Novo Registro de Manutenção</h1>

        <form action="{{route('registros.store')}}" method="post">
            @csrf
            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
            <div class="form-group">
                <select class="form-control" id="equipamento_id" name="equipamento_id" placeholder="Equipamento">
                    @foreach ($equipamentos as $equipamento)
                        <option value="{{$equipamento->id}}">{{$equipamento->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" id="tipo" name="tipo" placeholder="Tipo de Manutenção">
                    <option value="1">Preventiva</option>
                    <option value="2">Corretiva</option>
                    <option value="3">Urgente</option>
                </select>
            </div>
            <div class="form-group">
                <input type="date" class="form-control" id="datalimite" name="datalimite" placeholder="Nome do Equipamento">
            </div>
            <div class="form-group">
                <textarea class="form-control" id="descricao" name="descricao" placeholder="Descrição da Manutenção"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Registro</button>
        </form>
    </div>
    

@endsection