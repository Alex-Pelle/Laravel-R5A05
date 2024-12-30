@php use App\Models\Eleve; @endphp
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Consultation des notes</h1>
        <a href="{{ route("evaluations.index") }}" class="btn btn-secondary mb-3">Retour</a>
        @if(Gate::allows('is-professeur'))
            <a href="{{ route('notes.create', ['evaluation'=>$evaluation]) }}" class="btn btn-primary mb-3">Ajouter une
                note</a>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="form-group">
            <label for="Numero Etudiant">Toutes les notes</label>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Eleve</th>
                <th>Note</th>

            </tr>
            </thead>
            <tbody>
            @if(Gate::allows('is-professeur'))
                @foreach ($evalEleve as $evaluation)

                    <tr>

                        <td>{{ Eleve::find($evaluation->idEleve)->nom }} {{ Eleve::find($evaluation->idEleve)->prenom }}</td>
                        <td>{{ $evaluation->note }}</td>

                        <td>
                            <a href="{{ route('notes.edit', ['evaluation' => $evaluation->idEval , 'note' => $evaluation->id]) }}"
                               class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('notes.destroy', ['evaluation' => $evaluation->idEval , 'note' => $evaluation->id]) }}"
                                  method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette note ?')">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if($evalEleve->filter(function($eval) { return $eval->note < 10; })->isNotEmpty())

            <div class="form-group">
                <label for="Numero Etudiant">Notes sous la moyenne</label>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Eleve</th>
                    <th>Note</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($evalEleve->filter(function($eval) { return $eval->note < 9; }) as $evaluation)

                    <tr>

                        <td>{{ Eleve::find($evaluation->idEleve)->nom }} {{ Eleve::find($evaluation->idEleve)->prenom }}</td>
                        <td>{{ $evaluation->note }}</td>


                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
            @endif
    </div>
@endsection
