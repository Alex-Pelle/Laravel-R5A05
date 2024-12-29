@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ajouter un élève</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('eleves.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="Nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
            </div>

            <div class="form-group">
                <label for="Prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="{{ old('prenom') }}" required>
            </div>

            <div class="form-group">
                <label for="Date de Naissance">Date de Naissance</label>
                <input type="date" name="dateNaissance" id="dateNaissance" class="form-control" value="{{ old('dateNaissance') }}" required>
            </div>

            <div class="form-group">
                <label for="Numero Etudiant">Numéro Etudiant</label>
                <input type="number" name="numeroEtudiant" id="numeroEtudiant" class="form-control" value="{{ old('numeroEtudiant') }}" required>
            </div>

            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf <input type="file" name="image">
                    <button type="submit">Télécharger</button>
                </form>


            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('eleves.index') }}" class="btn btn-secondary">Annuler</a>

            </div>

        </form>
    </div>
@endsection
