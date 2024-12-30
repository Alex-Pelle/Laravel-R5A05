@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Inscription</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" required>
            <br>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required>
            <br>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" required>
            <br>
            <label for="password_confirmation">Confirmer le mot de passe :</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
            <br>
            <button type="submit">S'inscrire</button>
        </form>
        <p>Déjà un compte ? <a href="{{ route('login') }}">Connectez-vous ici</a>.</p>

    </div>
@endsection
