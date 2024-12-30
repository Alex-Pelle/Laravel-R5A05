@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des eleves</h1>
        <a href="{{ route("home") }}" class="btn btn-secondary">Retour</a>
        <a href="{{ route('eleves.create') }}" class="btn btn-primary mb-3">Ajouter un eleve</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Date de naissance</th>
                <th>Numéro Etudiant</th>
                <th>Email</th>
                <th>Image</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($eleves as $eleve)
                <tr>
                    <td>{{ $eleve->nom }}</td>
                    <td>{{ $eleve->prenom }}</td>
                    <td>{{ $eleve->dateNaissance }}</td>
                    <td>{{ $eleve->numeroEtudiant }}</td>
                    <td>{{ $eleve->email }}</td>
                    <td><img src="{{ asset('storage/' . $eleve->image) }}" alt="Image"></td>
                    <td>
                        <a href="{{ route('eleves.edit', ['elefe' => $eleve->id]) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="{{ route('eleves.show', ['elefe' => $eleve->id]) }}" class="btn btn-info btn-sm">Voir</a>
                        <form action="{{ route('eleves.destroy', ['elefe' => $eleve->id]) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet eleve ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
