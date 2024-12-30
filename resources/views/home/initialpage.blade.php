@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Panel de gestion</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Module</h5>
                <a href="{{ route('modules.index') }}" class="btn btn-secondary">Aller à -></a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Eleves</h5>
                <a href="{{ route('eleves.index') }}" class="btn btn-secondary">Aller à -></a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Evaluations</h5>
                <a href="{{ route('evaluations.index') }}" class="btn btn-secondary">Aller à -></a>
            </div>
        </div>
    </div>
@endsection

