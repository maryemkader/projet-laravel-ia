@extends('layouts.parent')
@section('title', 'Contact')

@section('content')
    <h1>📩 Contactez-nous</h1>

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

    <form method="POST" action="{{ route('contact.store') }}">
        @csrf
        <label>Nom :</label>
        <input type="text" name="nom" placeholder="Votre nom" required>
        <br>
        <label>Email :</label>
        <input type="email" name="email" placeholder="Votre email" required>
        <br>
        <label>Message :</label>
        <textarea name="message" placeholder="Votre message..." rows="5" required></textarea>
        <br><br>
        <button type="submit">📤 Envoyer</button>
    </form>

    <br>
    <a href="{{ route('accueil') }}">← Retour à l'accueil</a>
@endsection