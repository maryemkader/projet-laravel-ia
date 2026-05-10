<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use App\Models\Etudiant;
use App\Models\Activite;
use Illuminate\Http\Request;

class SeanceController extends Controller
{
    public function index()
    {
        $seances = Seance::with('etudiant', 'activite')->paginate(5);
        return view('seances.index', compact('seances'));
    }

    public function create()
    {
        $etudiants = Etudiant::all();
        $activites = Activite::all();
        return view('seances.create', compact('etudiants', 'activites'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'activite_id' => 'required|exists:activites,id',
            'date'        => 'required|date',
            'duree'       => 'required|integer|min:5',
        ]);
        Seance::create($request->only('etudiant_id', 'activite_id', 'date', 'duree', 'notes'));
        return redirect()->route('seances.index')
                         ->with('success', 'Séance enregistrée !');
    }

    public function destroy($id)
    {
        Seance::findOrFail($id)->delete();
        return redirect()->route('seances.index')
                         ->with('success', 'Séance supprimée !');
    }
}