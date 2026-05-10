@extends('layouts.parent')
@section('title', 'Détail étudiant')

@section('content')
    <h1>👨‍🎓 Détail de l'étudiant</h1>

    <p><strong>Nom :</strong> {{ $etudiant->nom }}</p>
    <p><strong>Email :</strong> {{ $etudiant->email }}</p>
    <p><strong>Âge :</strong> {{ $etudiant->age }} ans</p>

    <h3>📅 Séances de bien-être</h3>
    @if($etudiant->seances->isEmpty())
        <p>Aucune séance enregistrée.</p>
    @else
        <table>
            <tr>
                <th>Activité</th>
                <th>Date</th>
                <th>Durée (min)</th>
                <th>Notes</th>
            </tr>
            @foreach($etudiant->seances as $seance)
            <tr>
                <td>{{ $seance->activite->titre }}</td>
                <td>{{ $seance->date }}</td>
                <td>{{ $seance->duree }}</td>
                <td>{{ $seance->notes ?? '-' }}</td>
            </tr>
            @endforeach
        </table>
    @endif

    <br>
    <a href="{{ route('etudiants.index') }}">← Retour à la liste</a>
@endsection