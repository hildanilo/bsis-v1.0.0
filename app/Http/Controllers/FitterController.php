<?php

namespace App\Http\Controllers;

use App\Models\Fitter;
use Illuminate\Http\Request;

class FitterController extends Controller
{
    public function index()
    {
        $montadores = Fitter::orderBy('nome')->paginate(15);

        return view('fitters.index', compact('montadores'));
    }

    public function create()
    {
        return view('fitters.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:20',
            'cpf' => 'nullable|string|max:20',
            'percentual_comissao' => 'required|numeric|min:0|max:100',
            'status' => 'boolean',
        ]);

        $validated['status'] = $request->has('status');

        Fitter::create($validated);

        return redirect()->route('montadores.index')
            ->with('success', 'Montador cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $montador = Fitter::findOrFail($id);

        return view('fitters.edit', compact('montador'));
    }

    public function update(Request $request, $id)
    {
        $montador = Fitter::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:20',
            'cpf' => 'nullable|string|max:20',
            'percentual_comissao' => 'required|numeric|min:0|max:100',
        ]);

        $validated['status'] = $request->has('status');

        $montador->update($validated);

        return redirect()->route('montadores.index')
            ->with('success', 'Montador atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $montador = Fitter::findOrFail($id);
        $montador->delete();

        return redirect()->route('montadores.index')
            ->with('success', 'Montador excluído com sucesso!');
    }
}
