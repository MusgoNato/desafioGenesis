<?php

namespace App\Http\Controllers;

use App\Http\Requests\MotoristaRequest;
use App\Models\Motorista;
use Illuminate\Http\Request;

class MotoristaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $motoristas = Motorista::latest()->get();
        return view('motoristas.index', ['motoristas' => $motoristas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('motoristas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MotoristaRequest $request)
    {
        //
        Motorista::create($request->validated());
        return redirect()->route('motoristas.index')->with('success', 'Motorista adicionado com sucesso');
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
        $motorista = Motorista::findOrFail($id);
        
        return view('motoristas.edit', ['motorista' => $motorista]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MotoristaRequest $request, string $id)
    {
        //
        $motorista = Motorista::findOrFail($id);

        $motorista->update($request->validated());

        return redirect()->route('motoristas.index')->with('success', 'Motorista atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $motorista = Motorista::findOrFail($id);
        $motorista->delete();

        return redirect()->route('motoristas.index');
    }
}
