<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;

use App\Models\Pessoa;
use App\Models\Coleta;

class AgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendamentos = Agendamento::orderByDesc('data')->orderBy(Pessoa::select('nome')
        ->whereColumn('id', 'agendamentos.pessoa_id')->orderBy('nome', 'asc'), 'asc')->get();

        $pessoas = Pessoa::orderBy('nome', 'asc')->get();
        $coletas = Coleta::orderBy('nome', 'asc')->get();

        return view('agendamentos.index', ['agendamentos'=>$agendamentos, 'pessoas'=>$pessoas, 'coletas'=>$coletas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Agendamento::create($request->all());

        session()->flash('mensagem', 'Doação agendada com sucesso!');

        return redirect()->route('agendamentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function show(Agendamento $agendamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Agendamento $agendamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agendamento $agendamento)
    {
        $agendamento->fill($request->all());
        $agendamento->save();

        session()->flash('mensagem', 'Agendamento atualizado com sucesso!');

        return redirect()->route('agendamentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agendamento $agendamento)
    {
        $agendamento->delete();

        session()->flash('mensagem', 'Agendamento excluido com sucesso!');

        return redirect()->route('agendamentos.index');
    }
}
