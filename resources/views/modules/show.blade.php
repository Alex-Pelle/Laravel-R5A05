@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails du module : {{ $module->nom }}</h1>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $module->nom }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">Code : {{ $module->code }}</p>
                <p class="card-text">Coefficient : {{ $module->coefficient }}</p>
                <a href="{{ route('modules.index') }}" class="btn btn-secondary">Retour</a>
            </div>
        </div>
    </div>
@endsection

