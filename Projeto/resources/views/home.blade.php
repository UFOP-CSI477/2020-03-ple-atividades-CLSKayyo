@extends('layouts.app')

@section('title')
    <title>HistorYou - Dashboard</title>
@endsection

@section('content')
<link rel="stylesheet" href="{{asset('css/home.css')}}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Suas Aventuras</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="list-group list-group-flush">
                        @foreach ($adventures as $adventure)
                            <li class="list-group-item">
                                <a href="{{url('/chat/'.$adventure->id)}}">
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
            <a href="{{url('/adventures')}}"><button class="btn btn-outline-light">Começar nova Aventura</button></a>
        </div>
    </div>
</div>
@endsection
