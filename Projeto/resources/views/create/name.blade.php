@extends('layouts.app')

@section('title')
    <title>Criar Nova Aventura</title>
@endsection

@section('content')
<link rel="stylesheet" href="{{asset('css/messages.css')}}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Criar Aventura</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="{{route('messages.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="advname">Nome da Aventura</label>
                            <input type="text" class="form-control" id="advname" name="advname" required>
                        </div>
                        <div class="form-group">
                            <label for="sendername">Nome do Sender</label>
                            <input type="text" class="form-control" id="sendername" name="sendername" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Mensagem Inicial</label>
                            <textarea class="form-control" name="message" id="message" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="response1">Resposta 1</label>
                            <textarea class="form-control" name="response1" id="response1" rows="3" placeholder="Deixar em branco caso não necessite de resposta"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="response2">Resposta 2</label>
                            <textarea class="form-control" name="response2" id="response2" rows="3" placeholder="Deixar em branco caso não necessite de resposta"></textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-light">Continuar</button>
                    </form>

                </div>
            </div>
            <a href="{{url('/adventures')}}"><button class="btn btn-outline-dark">Cancelar</button></a>
        </div>
    </div>
</div>
@endsection