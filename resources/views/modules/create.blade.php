@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ajouter un module</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('modules.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="code">Code</label>
                <input type="text" name="code" id="code" class="form-control" value="{{ old('code') }}" required>
            </div>

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
            </div>

            <div class="form-group">
                <label for="coefficient">Coefficient</label>
                <input type="number" name="coefficient" id="coefficient" class="form-control" value="{{ old('coefficient') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('modules.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
