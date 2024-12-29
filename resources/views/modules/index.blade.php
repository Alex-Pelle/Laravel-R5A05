@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des modules</h1>
        <a href="{{ url('/') }}" class="btn btn-secondary">Retour</a>
        <a href="{{ route('modules.create') }}" class="btn btn-primary mb-3">Ajouter un module</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Code</th>
                <th>Nom</th>
                <th>Coefficient</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($modules as $module)
                <tr>
                    <td>{{ $module->code }}</td>
                    <td>{{ $module->nom }}</td>
                    <td>{{ $module->coefficient }}</td>
                    <td>
                        <a href="{{ route('modules.edit', $module) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="{{ route('modules.show', $module) }}" class="btn btn-info btn-sm">Voir</a>
                        <form action="{{ route('modules.destroy', $module) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce module ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
