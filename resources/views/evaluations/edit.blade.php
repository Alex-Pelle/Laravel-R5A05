@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Modifier l'évaluation  : {{ $eval->titreEval }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('evaluations.update', ['evaluation' => $eval->id]) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="DateEvaluation">Date de l'évaluations</label>
                <input type="date" name="dateEval" id="dateEval" class="form-control" value="{{ old('dateEval', $eval->dateEval) }}" required>
            </div>

            <div class="form-group">
                <label for="TitreEvaluation">Titre</label>
                <input type="text" name="titreEval" id="titreEval" class="form-control" value="{{ old('titreEval', $eval->titreEval) }}" required>
            </div>

            <div class="form-group">
                <label for="CoefEvaluation">Coefficient</label>
                <input type="number" name="coefEval" id="coefEval" class="form-control" value="{{ old('coefEval', $eval->coefEval) }}" required>
            </div>

            <div class="form-group">
                <label for="RelEvaluation">Module de l'évaluation</label>
                <select name="moduleEval" id="moduleEval" class="form-select" required>
                    <option value=""></option>
                    @foreach($modules as $module)
                        <option value="{{ $module->id }}" {{ $eval->moduleEval == $module->id ? 'selected' : '' }}>{{$module->code}} -- {{ $module->nom }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('evaluations.index') }}" class="btn btn-secondary">Annuler</a>
        </form>


    </div>
@endsection




