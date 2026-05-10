@extends('layouts.parent')
@section('title', 'Accueil')

@section('content')
    <h1>🌿 Bienvenue sur l'application Bien-être Étudiant</h1>
    <p>Cette application vous aide à suivre vos activités de bien-être.</p>

    <div style="display: flex; gap: 20px; margin-top: 30px;">
        <div style="background-color: #f0f8f0; padding: 20px; border-radius: 8px; width: 200px; text-align: center;">
            <h2>👨‍🎓</h2>
            <h3>Étudiants</h3>
            <a href="{{ route('etudiants.index') }}">Gérer les étudiants</a>
        </div>
        <div style="background-color: #f0f8f0; padding: 20px; border-radius: 8px; width: 200px; text-align: center;">
            <h2>🏃</h2>
            <h3>Activités</h3>
            <a href="{{ route('activites.index') }}">Gérer les activités</a>
        </div>
        <div style="background-color: #f0f8f0; padding: 20px; border-radius: 8px; width: 200px; text-align: center;">
            <h2>📅</h2>
            <h3>Séances</h3>
            <a href="{{ route('seances.index') }}">Gérer les séances</a>
        </div>
    </div>
@endsection