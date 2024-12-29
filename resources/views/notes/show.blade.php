@php use App\Models\Eleve; @endphp
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Note de l'élève {{Eleve::find($evalEleve->idEleve)->nom}} {{Eleve::find($evalEleve->idEleve)->prenom}}</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $evalEleve->note }}/20</h5>
            </div>
        </div>
    </div>
@endsection

