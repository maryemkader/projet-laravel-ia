@extends('layouts.parent')
@section('title', 'Ajouter une séance')

@section('content')
    <h1>➕ Ajouter une séance</h1>

    @if($errors->any())
        <ul class="error">
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('seances.store') }}">
        @csrf
        <label>Étudiant :</label>
        <select name="etudiant_id" required>
            <option value="">-- Choisir un étudiant --</option>
            @foreach($etudiants as $e)
                <option value="{{ $e->id }}">{{ $e->nom }}</option>
            @endforeach
        </select>
        <br>
        <label>Activité :</label>
        <select name="activite_id" required>
            <option value="">-- Choisir une activité --</option>
            @foreach($activites as $a)
                <option value="{{ $a->id }}">{{ $a->titre }}</option>
            @endforeach
        </select>
        <br>
        <label>Date :</label>
        <input type="date" name="date" required>
        <br>
        <label>Durée (minutes) :</label>
        <input type="number" name="duree" placeholder="Ex: 30" required>
        <br>
        <label>Notes :</label>
        <textarea name="notes" placeholder="Notes optionnelles..."></textarea>
        <br><br>
        <button type="submit">💾 Enregistrer</button>
    </form>

    <br>
    <a href="{{ route('seances.index') }}">← Retour à la liste</a>
@endsection