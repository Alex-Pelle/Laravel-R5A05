@php use App\Models\Evaluation;use App\Models\Modules; @endphp
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des evaluations</h1>
        <a href="{{ route("home") }}" class="btn btn-secondary">Retour</a>
        @if(Gate::allows('is-professeur'))
            <a href="{{ route('evaluations.create') }}" class="btn btn-primary mb-3">Ajouter un evaluations</a>
        @endif
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Titre</th>
                <th>Date de l'évaluations</th>
                <th>Coefficient</th>
                <th>Module</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($eval as $evaluation)

                <tr>

                    <td>{{ $evaluation->titreEval }}</td>
                    <td>{{ $evaluation->dateEval }}</td>
                    <td>{{ $evaluation->coefEval }}</td>
                    <td>{{ Modules::find($evaluation->moduleEval)->code }}</td>

                    <td>
                        <a href="{{ route('evaluations.show', ['evaluation' => $evaluation->id]) }}"
                           class="btn btn-info btn-sm">Voir</a>

                        @if(Gate::allows('is-professeur'))
                            <a href="{{ route('evaluations.edit', ['evaluation' => $evaluation->id]) }}"
                               class="btn btn-warning btn-sm">Modifier</a>

                            <form action="{{ route('evaluations.destroy', ['evaluation' => $evaluation->id]) }}"
                                  method="POST" style="display: inline-block;">
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette evaluation ?')">
                                    Supprimer
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
