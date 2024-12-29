@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ajouter une note</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('notes.store',["evaluation"=>$evaluation]) }}" method="POST">
            @csrf

            <input type="hidden" name="idEval" id="idEval" class="form-control" value="{{ $evaluation }}" required>

            <div class="form-group">
                <label for="eleve">Eleve</label>
                <select name="idEleve" id="eleve" class="form-select" required>
                    <option value=""></option>
                    @foreach($eleves as $eleve)
                        <option value="{{ $eleve->id }}">{{$eleve->nom}} {{$eleve->prenom}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="note">Note</label>
                <input type="number" name="note" id="note" class="form-control" min="0" max="20" step="0.01" value="{{ old('note') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('notes.index',["evaluation"=>$evaluation]) }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
