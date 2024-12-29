@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier le module : {{ $modules->nom }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('modules.update', ['module' => $modules->id]) }}" method="POST">

        @csrf
            @method('PUT')


            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $modules->nom) }}" required>
            </div>

            <div class="form-group">
                <label for="coefficient">Coefficient</label>
                <input type="number" name="coefficient" id="coefficient" class="form-control" value="{{ old('coefficient', $modules->coefficient) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('modules.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection

