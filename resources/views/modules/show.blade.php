@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails du module : {{ $modules->nom }}</h1>

        <div class="card">
            <div class="card-header">
                {{ $modules->code }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $modules->nom }}</h5>
                <p class="card-text">Coefficient : {{ $modules->coefficient }}</p>
                <a href="{{ route('modules.index') }}" class="btn btn-secondary">Retour</a>
            </div>
        </div>
    </div>
@endsection

