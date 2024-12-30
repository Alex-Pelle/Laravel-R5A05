@php use App\Models\EvaluationEleve; @endphp
@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Détails de l'évaluations : {{ $eval->titreEval }}</h1>

        <div class="card">
            <div class="card-header">
                {{ $eval->titreEval }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $eval->titreEval }}</h5>
                <p class="card-text">Date de l'éval : {{ $eval->dateEval }}</p>
                <p class="card-text">Coefficient : {{ $eval->coefEval }}</p>
                <p class="card-text">Module : {{ $eval->moduleEval }}</p>
                @if(!Gate::allows('is-professeur'))
                    <p class="card-text">Note : {{ EvaluationEleve::getNoteForEvaluation($eval->id) }}/20</p>
                @endif
                @if(Gate::allows('is-professeur'))
                    <a href="{{ route('notes.index', ['evaluation' => $eval->id]) }}" class="btn btn-primary">Consulter les notes</a>
                @endif
                <a href="{{ route('evaluations.index') }}" class="btn btn-secondary">Retour</a>
            </div>
        </div>
    </div>
@endsection

