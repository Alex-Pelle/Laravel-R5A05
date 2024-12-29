@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ajouter un evaluation</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('evaluations.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="DateEvaluation">Date de l'évaluations</label>
                <input type="date" name="dateEval" id="dateEval" class="form-control" value="{{ old('dateEval') }}" required>
            </div>

            <div class="form-group">
                <label for="TitreEvaluation">Titre</label>
                <input type="text" name="titreEval" id="titreEval" class="form-control" value="{{ old('titreEval') }}" required>
            </div>

            <div class="form-group">
                <label for="CoefEvaluation">Coefficient</label>
                <input type="number" name="coefEval" id="coefEval" class="form-control" value="{{ old('coefEval') }}" required>
            </div>

            <div class="form-group">
                <label for="RelEvaluation">Module de l'évaluation</label>
                <select name="moduleEval" id="moduleEval" class="form-select" required>
                    <option value=""></option>
                    @foreach($modules as $module)
                        <option value="{{ $module->id }}">{{$module->code}} -- {{ $module->nom }}</option>
                    @endforeach
                </select>
            </div>



            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('evaluations.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
