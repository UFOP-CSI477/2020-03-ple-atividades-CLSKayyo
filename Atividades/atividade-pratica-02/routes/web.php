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

use App\Models\Equipamento;
use App\Models\Registro;
use App\Models\User;

use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\RegistroController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/suporte/equipamentos', function (){

    $equipamentos = Equipamento::orderBy('nome')->get();
    return view('suporte.equipamentos', ['equipamentos'=>$equipamentos]);
});

Route::get('/suporte/manutencoes', function (){

    $registros = Registro::orderBy('datalimite', 'asc')->get();
    return view('suporte.registros', ['registros'=>$registros]);
});

Route::get('/admin', function (){

    $usuarios = User::orderBy('name')->get();
    return view('admin.users', ['usuarios'=>$usuarios]);

})->middleware('auth');

// Route::get('/admin/equipamentos', function (){

//     $equipamentos = Equipamento::all();
//     return view('admin.equipamentos', ['equipamentos'=>$equipamentos]);

// })->middleware('auth');

Route::resource('/admin/equipamentos', EquipamentoController::class)->middleware('auth');

// Route::get('/admin/manutencoes', function (){

//     $registros = Registro::orderBy('datalimite', 'asc')->get();
//     return view('admin.registros', ['registros'=>$registros]);

// })->middleware('auth');

Route::resource('/admin/registros', RegistroController::class)->middleware('auth');

Route::get('/admin/relatorio', function (){

    $equipamentos = Equipamento::all();
    return view('admin.relatorio', ['equipamentos'=>$equipamentos]);

})->middleware('auth');


Auth::routes();

Route::get('/home', function(){
    return view('welcome');
})->name('home');
