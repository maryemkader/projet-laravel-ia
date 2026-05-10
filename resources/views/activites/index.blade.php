@extends('layouts.parent')
@section('title', 'Activités')

@section('content')
    <h1>🏃 Gestion des activités</h1>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    {{-- Recherche --}}
    <form method="GET" action="{{ route('activites.index') }}">
        <input type="text" name="search" placeholder="Rechercher une activité..."
               value="{{ request('search') }}" style="width: 300px;">
        <button type="submit">🔍 Rechercher</button>
    </form>

    <br>

    {{-- Formulaire d'ajout --}}
    <h3>Ajouter une activité</h3>
    @if($errors->any())
        <ul class="error">
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif
    <form method="POST" action="{{ route('activites.store') }}">
        @csrf
        <input type="text" name="titre" placeholder="Titre" required>
        <select name="categorie" required>
            <option value="">-- Catégorie --</option>
            <option value="sport">Sport</option>
            <option value="meditation">Méditation</option>
            <option value="nutrition">Nutrition</option>
            <option value="sommeil">Sommeil</option>
        </select>
        <textarea name="description" placeholder="Description (optionnel)"></textarea>
        <button type="submit">➕ Ajouter</button>
    </form>

    <br>

    {{-- Tableau --}}
    <table>
        <tr>
            <th>Titre</th>
            <th>Catégorie</th>
            <th>Description</th>
            <th>Voir</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        @forelse($activites as $a)
        <tr>
            <td>{{ $a->titre }}</td>
            <td>{{ $a->categorie }}</td>
            <td>{{ $a->description ?? '-' }}</td>
            <td><a href="{{ route('activites.show', $a->id) }}">👁 Voir</a></td>
            <td><a href="{{ route('activites.edit', $a->id) }}">✏️ Modifier</a></td>
            <td>
                <form method="POST" action="{{ route('activites.destroy', $a->id) }}">
                    @csrf
                    <button type="submit" onclick="return confirm('Supprimer ?')">🗑 Supprimer</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6">Aucune activité trouvée</td>
        </tr>
        @endforelse
    </table>

    <br>
    {{ $activites->appends(request()->query())->links() }}

@endsection