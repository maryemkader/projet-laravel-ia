@extends('layouts.parent')
@section('title', 'Étudiants')

@section('content')
    <h1>👨‍🎓 Gestion des étudiants</h1>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    {{-- Recherche --}}
    <form method="GET" action="{{ route('etudiants.index') }}">
        <input type="text" name="search" placeholder="Rechercher un étudiant..."
               value="{{ request('search') }}" style="width: 300px;">
        <button type="submit">🔍 Rechercher</button>
    </form>

    <br>

    {{-- Formulaire d'ajout --}}
    <h3>Ajouter un étudiant</h3>
    @if($errors->any())
        <ul class="error">
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif
    <form method="POST" action="{{ route('etudiants.store') }}">
        @csrf
        <input type="text" name="nom" placeholder="Nom complet" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="number" name="age" placeholder="Âge" required>
        <button type="submit">➕ Ajouter</button>
    </form>

    <br>

    {{-- Tableau --}}
    <table>
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Âge</th>
            <th>Voir</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        @forelse($etudiants as $e)
        <tr>
            <td>{{ $e->nom }}</td>
            <td>{{ $e->email }}</td>
            <td>{{ $e->age }}</td>
            <td><a href="{{ route('etudiants.show', $e->id) }}">👁 Voir</a></td>
            <td><a href="{{ route('etudiants.edit', $e->id) }}">✏️ Modifier</a></td>
            <td>
                <form method="POST" action="{{ route('etudiants.destroy', $e->id) }}">
                    @csrf
                    <button type="submit" onclick="return confirm('Supprimer ?')">🗑 Supprimer</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6">Aucun étudiant trouvé</td>
        </tr>
        @endforelse
    </table>

    <br>
    {{ $etudiants->appends(request()->query())->links() }}

@endsection