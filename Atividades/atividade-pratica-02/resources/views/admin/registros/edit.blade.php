@extends('layouts.app')

@section('content')

    <div class="criar">
        <h1>Atualizar Registro de Manutenção</h1>

        <form action="{{route('registros.update', $registro)}}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
            <div class="form-group">
                <select class="form-control" id="equipamento_id" name="equipamento_id" placeholder="Equipamento" value="{{$registro->equipamento->id}}">
                    @foreach ($equipamentos as $equipamento)
                    @if ($equipamento->id == $registro->equipamento->id)
                        <option value="{{$equipamento->id}}" selected>{{$equipamento->nome}}</option>
                    @else
                        <option value="{{$equipamento->id}}">{{$equipamento->nome}}</option>
                    @endif
                        
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" id="tipo" name="tipo" placeholder="Tipo de Manutenção" selected="{{$registro->tipo}}">
                    
                    <option value="1"
                    @if ($registro->tipo == 1)
                        selected
                    @endif
                    >Preventiva</option>
                    <option value="2"
                    @if ($registro->tipo == 2)
                        selected
                    @endif
                    >Corretiva</option>
                    <option value="3"
                    @if ($registro->tipo == 3)
                        selected
                    @endif
                    >Urgente</option>
                </select>
            </div>
            <div class="form-group">
                <input type="date" class="form-control" id="datalimite" name="datalimite" value="{{$registro->datalimite}}">
            </div>
            <div class="form-group">
                <textarea class="form-control" id="descricao" name="descricao" placeholder="Descrição da Manutenção">{{$registro->descricao}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Registro</button>
        </form>
    </div>
    

@endsection