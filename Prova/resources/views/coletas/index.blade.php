@extends('layouts.app')

@section('title')

<title>DOE.Sys - Locais de Coleta</title>

@endsection

@section('content')

    <h1>Locais de Coleta</h1>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">ID</th>
                <th scope="col">Cidade</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($coletas as $coleta)
                <tr>
                    <th scope="row">{{$coleta->nome}}</th>
                    <td>{{$coleta->id}}</td>
                    <td>{{$coleta->cidade}}</td>
                </tr>
            @endforeach
            
        </tbody>

    </table>

    <div class="create-new">
        <button class="btn btn-outline-light" data-toggle="modal" data-target="#create-modal">Adicionar Local</button>
    </div>

    <div class="modal fade" id="create-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form class="modal-content" method="post" action="{{route('coletas.store')}}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Adicionar Local</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nome">Nome do Local</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Hemocentro">
                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="São Paulo">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Adicionar Local</button>
                </div>
            </form>
        </div>
    </div>

@endsection