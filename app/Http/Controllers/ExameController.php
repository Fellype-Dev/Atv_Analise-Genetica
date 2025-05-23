<?php

namespace App\Http\Controllers;

use App\Models\Exame;
use App\Http\Requests\ExameRequest;

class ExameController extends Controller
{
    public function index()
    {
        $exames = Exame::all();
        return view('exames.index', compact('exames'));
    }

    public function create()
    {
        return view('exames.create');
    }

    public function store(ExameRequest $request)
    {
        Exame::create($request->validated());

        return redirect()
            ->route('exames.index')
            ->with('success', 'Exame cadastrado com sucesso!');
    }

    public function show(Exame $exame)
    {
        return view('exames.show', compact('exame'));
    }

    public function edit(Exame $exame)
    {
        return view('exames.edit', compact('exame'));
    }

    public function update(ExameRequest $request, Exame $exame)
    {
        $exame->update($request->validated());

        return redirect()
            ->route('exames.index')
            ->with('success', 'Exame atualizado com sucesso!');
    }

    public function destroy(Exame $exame)
    {
        $exame->delete();

        return redirect()
            ->route('exames.index')
            ->with('success', 'Exame removido com sucesso!');
    }
}
