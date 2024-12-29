@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails de l'élève : {{ $eleves->prenom }} {{ $eleves->nom }}</h1>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $eleves->prenom }} {{ $eleves->nom }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">Date de naissance : {{ $eleves->dateNaissance }}</p>
                <p class="card-text">Numero Etudiant : {{ $eleves->numeroEtudiant }}</p>
                <p class="card-text">Email : {{ $eleves->email }}</p>
                <img src="{{ asset('storage/' . $eleves->image) }}" alt="Image">
            </div>
        </div>

        @if(sizeof($notes)>0)
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Notes</h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Moyenne de l'élève : {{$eleves->moyenne($notes)}}/20</h5>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Module</th>
                            <th>Contrôle</th>
                            <th>Note</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($notes as $note)
                            <tr>
                                <td>{{$note->getLinkedEvaluation()->getLinkedModule()->code}}</td>
                                <td>{{$note->getLinkedEvaluation()->titreEval}}</td>
                                <td>{{ $note->note }}/20</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        @endif

        <a href="{{ route('eleves.index') }}" class="btn btn-secondary">Retour</a>
    </div>
@endsection

