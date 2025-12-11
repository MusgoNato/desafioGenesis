<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\RequiredIf;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $veiculos = Veiculo::latest()->get();
        return view('veiculos.index', ['veiculos' => $veiculos]);
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
    public function store(Request $request)
    {
        // 
        $validacao = $request->validate([
            'modelo' => 'required|string|max:255',
            'ano' => 'required|integer|digits:4|min:1900|max:2099',
            'data_aquisicao' => 'required|date',
            'kms_rodados' => 'required|integer|min:0',
            'renavam' => 'required|digits:11',
            'placa' => [
                'required',
                
                // Validações para as placas antigas e atuais do mercosul
                'regex:/^([A-Z]{3}-?[0-9]{4}|[A-Z]{3}[0-9][A-Z][0-9]{2})$/i'
            ],
        ]);

        
        // Sucesso na criação do veículo
        Veiculo::create($validacao);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
