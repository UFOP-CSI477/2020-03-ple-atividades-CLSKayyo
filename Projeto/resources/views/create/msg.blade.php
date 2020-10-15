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
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{route('messages.store')}}" method="POST">
                    @csrf
                    @if ($message->response1 == null)
                        <input type="hidden" name="multiple" id="multiple" value="0">
                        <div class="card-body">
                            <label>Continuação da mensagem: "{{$message->message}}"</label>
                            <div class="form-group">
                                <label for="message">Mensagem</label>
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
                        </div>
                    
                    @else
                        <input type="hidden" name="multiple" id="multiple" value="1">
                        <div class="card-body">
                            <label>Continuação para a resposta: "{{$message->response1}}"</label>
                            <div class="form-group">
                                <label for="message_1">Mensagem</label>
                                <textarea class="form-control" name="message_1" id="message_1" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="response1_1">Resposta 1</label>
                                <textarea class="form-control" name="response1_1" id="response1_1" rows="3" placeholder="Deixar em branco caso não necessite de resposta"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="response2_1">Resposta 2</label>
                                <textarea class="form-control" name="response2_1" id="response2_1" rows="3" placeholder="Deixar em branco caso não necessite de resposta"></textarea>
                            </div>
                        </div>
                        <div class="card-body">
                            <label>Continuação para a resposta: "{{$message->response2}}"</label>
                            <div class="form-group">
                                <label for="message_2">Mensagem</label>
                                <textarea class="form-control" name="message_2" id="message_2" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="response1_2">Resposta 1</label>
                                <textarea class="form-control" name="response1_2" id="response1_2" rows="3" placeholder="Deixar em branco caso não necessite de resposta"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="response2_2">Resposta 2</label>
                                <textarea class="form-control" name="response2_2" id="response2_2" rows="3" placeholder="Deixar em branco caso não necessite de resposta"></textarea>
                            </div>
                        </div>
                        <div class="card-body">
                            <button type="submit" class="btn btn-outline-light">Continuar</button>
                        </div>
                    @endif
                    
                </form>
            </div>
            <a href="{{url('/adventures')}}"><button class="btn btn-outline-dark">Cancelar</button></a>
        </div>
    </div>
</div>
@endsection