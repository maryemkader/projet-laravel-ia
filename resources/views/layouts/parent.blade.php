<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Bien-être Étudiant')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        nav { background-color: #4CAF50; padding: 10px; }
        nav a { color: white; margin-right: 15px; text-decoration: none; font-weight: bold; }
        nav a:hover { text-decoration: underline; }
        main { padding: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        .success { color: green; font-weight: bold; }
        .error { color: red; }
        input, textarea, select { padding: 8px; margin: 5px 0; width: 100%; max-width: 400px; }
        button { padding: 8px 16px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #45a049; }
        a { color: #4CAF50; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('accueil') }}">🏠 Accueil</a>
        <a href="{{ route('etudiants.index') }}">👨‍🎓 Étudiants</a>
        <a href="{{ route('activites.index') }}">🏃 Activités</a>
        <a href="{{ route('seances.index') }}">📅 Séances</a>
        <a href="{{ route('contact') }}">📩 Contact</a>
        <a href="{{ route('agent') }}">🤖 Assistant IA</a>
    </nav>
    <main>
        @yield('content')
    </main>
</body>
</html>