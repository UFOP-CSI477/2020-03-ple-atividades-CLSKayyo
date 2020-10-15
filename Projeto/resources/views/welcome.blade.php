@extends('layouts.app')

@section('title')
    <title>HistorYou</title>
@endsection

@section('content')
<link rel="stylesheet" href="{{asset('css/welcome.css')}}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>HistorYou - Crie sua história!</h1>
            <a href="{{route('login')}}"><button class="btn btn-outline-light">Entrar</button></a>
            <a href="{{route('register')}}"><button class="btn btn-outline-light">Cadastre-se</button></a>
            
        </div>
    </div>
</div>
@endsection