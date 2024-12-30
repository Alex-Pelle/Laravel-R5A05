@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bienvenue sur le panneau de gestion de note</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{ route('login') }}" class="btn btn-secondary">Se connecter</a>
        <a href="{{ route('register') }}" class="btn btn-secondary">S'inscrire'</a>
    </div>
@endsection

