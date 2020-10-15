@extends('layouts.app')

@section('title')
    <title>HistorYou - Aventuras</title>
@endsection

@section('content')
<link rel="stylesheet" href="{{asset('css/home.css')}}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todas as aventuras</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="list-group list-group-flush">
                        @foreach ($adventures as $adventure)
                            <li class="list-group-item">
                                <a href="{{url('/new/'.$adventure->id)}}">
                                    <img src="https://via.placeholder.com/60" alt="Perfil">
                                    <div class="adv-content">
                                        <span>{{$adventure->advname}}</span><br>
                                        <span>{{$adventure->sendername}}</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <a href="{{url('/create')}}"><button class="btn btn-outline-light">Criar Aventura</button></a>
            <a href="{{url('/home')}}"><button class="btn btn-outline-dark">Voltar</button></a>
        </div>
    </div>
</div>
@endsection