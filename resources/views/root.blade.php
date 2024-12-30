@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>Bienvenue sur le panneau de gestion de notes</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="d-flex flex-column align-items-center mt-4">
            <a href="{{ route('login') }}" class="btn btn-secondary mb-3">Se connecter</a>
            <a href="{{ route('register') }}" class="btn btn-secondary">S'inscrire</a>
        </div>
    </div>
@endsection


