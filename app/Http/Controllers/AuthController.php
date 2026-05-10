<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Afficher formulaire login
    public function loginForm()
    {
        return view('auth.login');
    }

    // Traiter le login
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('accueil')
                             ->with('success', 'Bienvenue ' . Auth::user()->name . ' !');
        }

        return back()->withErrors(['email' => 'Email ou mot de passe incorrect.']);
    }

    // Afficher formulaire inscription
    public function registerForm()
    {
        return view('auth.register');
    }

    // Traiter l'inscription
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        return redirect()->route('accueil')
                         ->with('success', 'Compte créé avec succès ! Bienvenue !');
    }

    // Déconnexion
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')
                         ->with('success', 'Vous êtes déconnecté.');
    }
}