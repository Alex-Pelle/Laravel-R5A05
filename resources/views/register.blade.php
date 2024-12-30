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
            <div class="form-group">
                <label for="RelEvaluation">Je suis</label>
                <select name="role" id="role" class="form-control" onchange="toggleFields()" required>
                    <option value="Eleve">Eleve</option>
                    <option value="Professeur">Professeur</option>
                </select>
            </div>
            <script>
                function toggleFields() {
                    const role = document.getElementById("role").value;
                    if(role === "Eleve") {
                        document.getElementById("numeroEtudiant").setAttribute("required", "required");
                        document.getElementById("dateNaissance").setAttribute("required", "required");
                        document.getElementById("eleveField").style.display = "block"
                    } else {
                        document.getElementById("numeroEtudiant").removeAttribute("required")
                        document.getElementById("dateNaissance").removeAttribute("required")
                        document.getElementById("eleveField").style.display = "none"
                    }
                }

                // Appel initial pour gérer l'affichage au chargement de la page
                toggleFields();
            </script>

            <div class="form-group">
                <label for="Nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
            </div>

            <div class="form-group">
                <label for="Prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="{{ old('prenom') }}" required>
            </div>

            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password"  class="form-control" name="password" id="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe :</label>
                <input type="password"  class="form-control" name="password_confirmation" id="password_confirmation" required>
            </div>

            <div class="form-group" id="eleveField">

                <div class="form-group">
                    <label for="Date de Naissance">Date de Naissance</label>
                    <input type="date" name="dateNaissance" id="dateNaissance" class="form-control" value="{{ old('dateNaissance') }}" required>
                </div>

                <div class="form-group">
                    <label for="Numero Etudiant">Numéro Etudiant</label>
                    <input type="number" name="numeroEtudiant" id="numeroEtudiant" class="form-control" value="{{ old('numeroEtudiant') }}" required>
                </div>

            </div>



            <button type="submit">S'inscrire</button>

        </form>

        <p>Déjà un compte ? <a href="{{ route('login') }}">Connectez-vous ici</a>.</p>

    </div>
@endsection
