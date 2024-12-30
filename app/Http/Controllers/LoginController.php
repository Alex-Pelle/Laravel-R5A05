<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Evaluation;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(): View|Factory|Application
    {
        if(Auth::check()){
            return view('home.initialpage');
        } else {
            return view('login');
        }
    }
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'active' => [1]
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email||max:255|unique:users,email',
            'prenom' => 'required|string|max:255',
            'password' => 'required|confirmed|min:6',
            'role' => 'required',
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'prenom' => $request->prenom,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);


        if ($request->role === 'Eleve') {
            $request->validate([
                'dateNaissance' => 'required|date|min:0.1|before_or_equal:today',
                'numeroEtudiant' => 'required|string|max:255|unique:eleves,numeroEtudiant',
                'email' => 'required|string|max:255|unique:eleves,email',
                'role' => 'required',
            ]);
            Eleve::create([
                'nom' => $request->nom,
                'email' => $request->email,
                'prenom' => $request->prenom,
                'dateNaissance' => $request->dateNaissance,
                'numeroEtudiant' => $request->numeroEtudiant,
            ]);
        }

        Auth::login($user);

        return redirect()->intended('home')->with('success', 'Inscription réussie, bienvenue ' . $user->name . ' !');
    }
}
