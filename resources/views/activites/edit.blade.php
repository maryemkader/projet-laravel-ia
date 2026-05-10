@extends('layouts.parent')
@section('title', 'Modifier activité')

@section('content')
    <h1>✏️ Modifier l'activité</h1>

    @if($errors->any())
        <ul class="error">
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('activites.update', $activite->id) }}">
        @csrf
        <label>Titre :</label>
        <input type="text" name="titre" value="{{ $activite->titre }}" required>
        <br>
        <label>Catégorie :</label>
        <select name="categorie" required>
            <option value="sport" {{ $activite->categorie == 'sport' ? 'selected' : '' }}>Sport</option>
            <option value="meditation" {{ $activite->categorie == 'meditation' ? 'selected' : '' }}>Méditation</option>
            <option value="nutrition" {{ $activite->categorie == 'nutrition' ? 'selected' : '' }}>Nutrition</option>
            <option value="sommeil" {{ $activite->categorie == 'sommeil' ? 'selected' : '' }}>Sommeil</option>
        </select>
        <br>
        <label>Description :</label>
        <textarea name="description">{{ $activite->description }}</textarea>
        <br><br>
        <button type="submit">💾 Sauvegarder</button>
    </form>

    <br>
    <a href="{{ route('activites.index') }}">← Retour à la liste</a>
@endsection