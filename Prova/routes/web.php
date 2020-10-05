<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\Agendamento;
use App\Models\Pessoa;

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ColetaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/geral', function () {
    $agendamentos = Agendamento::orderByDesc('data')->orderBy(Pessoa::select('nome')
    ->whereColumn('id', 'agendamentos.pessoa_id')->orderBy('nome', 'asc'), 'asc')->get();
    return view('geral', ['agendamentos'=> $agendamentos]);
})->name('geral');

Route::resource('/agendamentos', AgendamentoController::class)->middleware('auth');
Route::resource('/pessoas', PessoaController::class)->middleware('auth');
Route::resource('/coletas', ColetaController::class)->middleware('auth');

Auth::routes();

Route::get('/home', function () {
    return view('welcome');
})->name('home');
