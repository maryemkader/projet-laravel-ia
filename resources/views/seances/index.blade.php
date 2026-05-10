@extends('layouts.parent')
@section('title', 'Séances')

@section('content')
    <h1>📅 Gestion des séances</h1>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <a href="{{ route('seances.create') }}">
        <button>➕ Ajouter une séance</button>
    </a>

    <br><br>

    <table>
        <tr>
            <th>Étudiant</th>
            <th>Activité</th>
            <th>Date</th>
            <th>Durée (min)</th>
            <th>Notes</th>
            <th>Supprimer</th>
        </tr>
        @forelse($seances as $s)
        <tr>
            <td>{{ $s->etudiant->nom }}</td>
            <td>{{ $s->activite->titre }}</td>
            <td>{{ $s->date }}</td>
            <td>{{ $s->duree }}</td>
            <td>{{ $s->notes ?? '-' }}</td>
            <td>
                <form method="POST" action="{{ route('seances.destroy', $s->id) }}">
                    @csrf
                    <button type="submit" onclick="return confirm('Supprimer ?')">🗑 Supprimer</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6">Aucune séance enregistrée</td>
        </tr>
        @endforelse
    </table>

    <br>
    {{ $seances->links() }}

@endsection