@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Connexion</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="form-group">
                <button type="submit" >Se connecter</button>
                <p>Vous n'avez pas de compte ? <a href="{{ route('register') }}">Inscrivez-vous ici</a>.</p>
            </div>

        </form>

    </div>
@endsection
