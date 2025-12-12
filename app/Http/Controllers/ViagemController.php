<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreViagemRequest;
use App\Http\Requests\UpdateViagemRequest;
use App\Http\Requests\ViagemRequest;
use App\Models\Motorista;
use App\Models\Veiculo;
use App\Models\Viagem;
use Illuminate\Http\Request;

class ViagemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $viagens = Viagem::latest()->get();
        return view('viagens.index',['viagens' => $viagens]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $motoristas = Motorista::all();
        $veiculos = Veiculo::all();

        return view('viagens.create', ['motoristas' => $motoristas, 'veiculos' => $veiculos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreViagemRequest $request)
    {
        $viagem = Viagem::create($request->validated()); 

        // Relacionamento das viagens com os motoristas
        $viagem->motoristas()->sync($request->input('motoristas', []));
        
        return redirect()->route('viagens.index')->with('success', 'Viagem adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $viagem = Viagem::with('motoristas')->findOrFail($id);
        
        return view('viagens.show', ['viagem' => $viagem]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $viagem = Viagem::with('motoristas')->findOrFail($id);
        $motoristas = Motorista::all();
        $veiculos = Veiculo::all();

        return view('viagens.edit', ['viagem' => $viagem, 'motoristas' => $motoristas, 'veiculos' => $veiculos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateViagemRequest $request, string $id)
    {
        //
        $viagem = Viagem::findOrFail($id);
        $viagem->update($request->validated());

        $viagem->motoristas()->sync($request->input('motoristas', []));

        return redirect()->route('viagens.index')->with('success', 'Viagem atualizada com sucesso');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $viagem = Viagem::findOrFail($id);
        $viagem->delete();

        return redirect()->route('viagens.index')->with('success', 'Viagem deletada com sucesso');
    }
}
