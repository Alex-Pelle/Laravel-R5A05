@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier l'élève' : {{ $eleves->nom }}{{ $eleves->prenom }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('eleves.update', ['elefe' => $eleves->id]) }}" method="POST">

        @csrf
            @method('PUT')

            <div class="form-group">
                <label for="Nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $eleves->nom) }}" required>
            </div>

            <div class="form-group">
                <label for="Prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="{{ old('prenom', $eleves->prenom) }}" required>
            </div>

            <div class="form-group">
                <label for="Date de Naissance">Date de Naissance</label>
                <input type="date" name="dateNaissance" id="dateNaissance" class="form-control" value="{{ old('dateNaissance', $eleves->dateNaissance) }}" required>
            </div>

            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $eleves->email) }}" required>
            </div>

            <div class="form-group">
                <label for="Numero Etudiant">Numéro Etudiant</label>
                <input type="number" name="numeroEtudiant" id="numeroEtudiant" class="form-control" value="{{ old('numeroEtudiant') }}" required>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control" value="{{ old('image', $eleves->image) }}">
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('eleves.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection

