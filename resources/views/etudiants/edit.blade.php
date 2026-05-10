@extends('layouts.parent')
@section('title', 'Modifier étudiant')

@section('content')
    <h1>✏️ Modifier l'étudiant</h1>

    @if($errors->any())
        <ul class="error">
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('etudiants.update', $etudiant->id) }}">
        @csrf
        <label>Nom :</label>
        <input type="text" name="nom" value="{{ $etudiant->nom }}" required>
        <br>
        <label>Email :</label>
        <input type="email" name="email" value="{{ $etudiant->email }}" required>
        <br>
        <label>Âge :</label>
        <input type="number" name="age" value="{{ $etudiant->age }}" required>
        <br><br>
        <button type="submit">💾 Sauvegarder</button>
    </form>

    <br>
    <a href="{{ route('etudiants.index') }}">← Retour à la liste</a>
@endsection