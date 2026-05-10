@extends('layouts.parent')
@section('title', 'Détail activité')

@section('content')
    <h1>🏃 Détail de l'activité</h1>

    <p><strong>Titre :</strong> {{ $activite->titre }}</p>
    <p><strong>Catégorie :</strong> {{ $activite->categorie }}</p>
    <p><strong>Description :</strong> {{ $activite->description ?? '-' }}</p>

    <h3>👨‍🎓 Étudiants ayant pratiqué cette activité</h3>
    @if($activite->seances->isEmpty())
        <p>Aucune séance enregistrée.</p>
    @else
        <table>
            <tr>
                <th>Étudiant</th>
                <th>Date</th>
                <th>Durée (min)</th>
            </tr>
            @foreach($activite->seances as $seance)
            <tr>
                <td>{{ $seance->etudiant->nom }}</td>
                <td>{{ $seance->date }}</td>
                <td>{{ $seance->duree }}</td>
            </tr>
            @endforeach
        </table>
    @endif

    <br>
    <a href="{{ route('activites.index') }}">← Retour à la liste</a>
@endsection