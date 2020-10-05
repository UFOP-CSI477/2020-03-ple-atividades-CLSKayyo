@extends('layouts.app')

@section('title')

<title>DOE.Sys - Pessoas</title>

@endsection

@section('content')

    <h1>Pessoas</h1>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">ID</th>
                <th scope="col">Tipo Sanguíneo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pessoas as $pessoa)
                <tr>
                    <th scope="row">{{$pessoa->nome}}</th>
                    <td>{{$pessoa->id}}</td>
                    <td>{{$pessoa->tipo}}</td>
                </tr>
            @endforeach
            
        </tbody>

    </table>

    <div class="create-new">
        <button class="btn btn-outline-light" data-toggle="modal" data-target="#create-modal">Adicionar Pessoa</button>
    </div>

    <div class="modal fade" id="create-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form class="modal-content" method="post" action="{{route('pessoas.store')}}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Adicionar Pessoa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nome">Nome da Pessoa</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="John Doe">
                    </div>
                    <div class="form-group">
                        <label for="tipo">Tipo sanguíneo</label>
                        <select class="form-control" id="tipo" name="tipo">
                            <option value="A-">A-</option>
                            <option value="A+">A+</option>
                            <option value="B-">B-</option>
                            <option value="B+">B+</option>
                            <option value="AB-">AB-</option>
                            <option value="AB+">AB+</option>
                            <option value="O-">O-</option>
                            <option value="O+">O+</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Adicionar Pessoa</button>
                </div>
            </form>
        </div>
    </div>

@endsection