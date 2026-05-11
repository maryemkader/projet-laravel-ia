@extends('layouts.parent')
@section('title', 'Connexion')

@section('content')
    <div style="max-width: 400px; margin: 50px auto; padding: 30px; border: 1px solid #ddd; border-radius: 10px;">
        <h1 style="text-align: center;">🔐 Connexion</h1>

        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        @if($errors->any())
            <ul class="error">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <label>Email :</label>
            <input type="email" name="email" placeholder="Votre email" required>
            <br>
            <label>Mot de passe :</label>
            <input type="password" name="password" placeholder="Votre mot de passe" required>
            <br><br>
            <button type="submit" style="width: 100%;">🔐 Se connecter</button>
        </form>

        <br>
        <p style="text-align: center;">
            Pas encore de compte ? 
            <a href="{{ route('register') }}">Créer un compte</a>
        </p>
    </div>
@endsection