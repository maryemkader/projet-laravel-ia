<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index(Request $request)
    {
        $query = Etudiant::query();
        if ($request->filled('search')) {
            $query->where('nom', 'like', '%' . $request->search . '%');
        }
        $etudiants = $query->paginate(5);
        return view('etudiants.index', compact('etudiants'));
    }

    public function show($id)
    {
        $etudiant = Etudiant::with('seances.activite')->findOrFail($id);
        return view('etudiants.show', compact('etudiant'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom'   => 'required|string|max:255',
            'email' => 'required|email|unique:etudiants',
            'age'   => 'required|integer|min:16|max:99',
        ]);
        Etudiant::create($request->only('nom', 'email', 'age'));
        return redirect()->route('etudiants.index')
                         ->with('success', 'Étudiant ajouté avec succès !');
    }

    public function edit($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return view('etudiants.edit', compact('etudiant'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom'   => 'required|string|max:255',
            'email' => 'required|email|unique:etudiants,email,' . $id,
            'age'   => 'required|integer|min:16|max:99',
        ]);
        Etudiant::findOrFail($id)->update($request->only('nom', 'email', 'age'));
        return redirect()->route('etudiants.index')
                         ->with('success', 'Étudiant modifié avec succès !');
    }

    public function destroy($id)
    {
        Etudiant::findOrFail($id)->delete();
        return redirect()->route('etudiants.index')
                         ->with('success', 'Étudiant supprimé avec succès !');
    }
}