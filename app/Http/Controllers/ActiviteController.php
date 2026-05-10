<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use Illuminate\Http\Request;

class ActiviteController extends Controller
{
    public function index(Request $request)
    {
        $query = Activite::query();
        if ($request->filled('search')) {
            $query->where('titre', 'like', '%' . $request->search . '%');
        }
        $activites = $query->paginate(5);
        return view('activites.index', compact('activites'));
    }

    public function show($id)
    {
        $activite = Activite::with('seances.etudiant')->findOrFail($id);
        return view('activites.show', compact('activite'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre'       => 'required|string|max:255',
            'categorie'   => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);
        Activite::create($request->only('titre', 'categorie', 'description'));
        return redirect()->route('activites.index')
                         ->with('success', 'Activité ajoutée !');
    }

    public function edit($id)
    {
        $activite = Activite::findOrFail($id);
        return view('activites.edit', compact('activite'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titre'     => 'required|string|max:255',
            'categorie' => 'required|string|max:100',
        ]);
        Activite::findOrFail($id)->update($request->only('titre', 'categorie', 'description'));
        return redirect()->route('activites.index')
                         ->with('success', 'Activité modifiée !');
    }

    public function destroy($id)
    {
        Activite::findOrFail($id)->delete();
        return redirect()->route('activites.index')
                         ->with('success', 'Activité supprimée !');
    }
}