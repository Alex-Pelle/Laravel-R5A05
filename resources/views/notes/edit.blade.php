@php use App\Models\Eleve; @endphp
@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Modifier la note de l'élève : {{ Eleve::find($evalEleve->idEleve)->nom}} {{ Eleve::find($evalEleve->idEleve)->prenom}}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('notes.update',["evaluation"=>$evaluation,"note"=>$evalEleve->id]) }}" method="POST">
            @csrf
            @method('PATCH')

            <input type="hidden" name="idEval" id="idEval" class="form-control" value="{{ $evalEleve->idEval }}" required>
            <input type="hidden" name="idEleve" id="eleve" class="form-control" value="{{ $evalEleve->idEleve }}" required>

            <div class="form-group">
                <label for="note">Note</label>
                <input type="number" name="note" id="note" class="form-control" min="0" max="20" step="0.01" value="{{ old("note",$evalEleve->note) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('notes.index',["evaluation"=>$evaluation]) }}" class="btn btn-secondary">Annuler</a>
        </form>


    </div>
@endsection




