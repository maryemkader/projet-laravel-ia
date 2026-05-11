@extends('layouts.parent')
@section('title', 'Inscription')

@section('content')
    <div style="max-width: 400px; margin: 50px auto; padding: 30px; border: 1px solid #ddd; border-radius: 10px;">
        <h1 style="text-align: center;">📝 Créer un compte</h1>

        @if($errors->any())
            <ul class="error">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('register.post') }}">
            @csrf
            <label>Nom complet :</label>
            <input type="text" name="name" placeholder="Votre nom" required>
            <br>
            <label>Email :</label>
            <input type="email" name="email" placeholder="Votre email" required>
            <br>
            <label>Mot de passe :</label>
            <input type="password" name="password" placeholder="Minimum 6 caractères" required>
            <br>
            <label>Confirmer le mot de passe :</label>
            <input type="password" name="password_confirmation" placeholder="Répétez le mot de passe" required>
            <br><br>
            <button type="submit" style="width: 100%;">📝 S'inscrire</button>
        </form>

        <br>
        <p style="text-align: center;">
            Déjà un compte ?
            <a href="{{ route('login') }}">Se connecter</a>
        </p>
    </div>
@endsection
