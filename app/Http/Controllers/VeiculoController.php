<?php

namespace App\Http\Controllers;

use App\Http\Requests\VeiculoRequest;
use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\RequiredIf;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        //
        $search = $request->input('search');

        $veiculos = Veiculo::when($search, function ($query, $search) 
        {
                return $query->where('modelo', 'like', "%{$search}%")
                            ->orWhere('placa', 'like', "%{$search}%")
                            ->orWhere('renavam', 'like', "%{$search}%")
                            ->orWhere('ano', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(2)
            ->withQueryString();

        return view('veiculos.index', compact('veiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('veiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VeiculoRequest $request)
    {   
        // Sucesso na criação do veículo
        Veiculo::create($request->validated());
        return redirect()->route('veiculos.index')->with('success', 'Veículo cadastrado com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $veiculo = Veiculo::findOrFail($id);
        
        return view('veiculos.edit', ['veiculo' => $veiculo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VeiculoRequest $request, string $id)
    {
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->update($request->validated());
        return redirect()->route('veiculos.index')->with('success', 'Veículo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->delete();

        return redirect()->route('veiculos.index')->with('success', 'Veículo deletado com sucesso!');
    }
}
