<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreElevesRequest;

use App\Http\Requests\UpdateElevesRequest;
use App\Models\Eleve;
use App\Models\EvaluationEleve;
use Illuminate\Support\Facades\Storage;


class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eleves = Eleve::all();
        return view('eleves.index', compact('eleves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eleves.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreElevesRequest $request)
    {

        $validatedData = $request->validated();


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath; // Ajout du chemin de l'image dans les données validées
        }

        // Création de l'élève
        Eleve::create([
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'dateNaissance' => $validatedData['dateNaissance'],
            'numeroEtudiant' => $validatedData['numeroEtudiant'],
            'email' => $validatedData['email'],
            'image' => $validatedData['image'] ?? null, // Assurez-vous que l'image peut être null si non fournie
        ]);

        // Redirection avec un message de succès
        return redirect()->route('eleves.index')->with('success', 'Élève créé avec succès');
    }



    /**
     * Display the specified resource.
     */
    public function show( $eleve)
    {
        $eleves = Eleve::find($eleve);
        $notes =  EvaluationEleve::where('idEleve', $eleve)->get();


        return view('eleves.show', compact('eleves','notes'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($eleve)
    {
        $eleves = Eleve::find($eleve);
        return view('eleves.edit', compact('eleves'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateElevesRequest $request, $eleve)
    {
        $eleves = Eleve::find($eleve);

        // Validation automatique grâce à UpdateElevesRequest
        $validatedData = $request->validated();

        // Gestion de l'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($eleves->image) {
                Storage::disk('public')->delete($eleves->image);
            }

            // Enregistrer la nouvelle image
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath; // Ajouter le chemin de la nouvelle image
        } else {
            // Conserver l'ancienne image si aucune nouvelle n'est envoyée
            $validatedData['image'] = $eleves->image;
        }

        // Mise à jour de l'élève
        $eleves->update([
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'dateNaissance' => $validatedData['dateNaissance'],
            'email' => $validatedData['email'],
            'image' => $validatedData['image'],
        ]);

        // Redirection avec un message de succès
        return redirect()->route('eleves.index')->with('success', 'Élève mis à jour avec succès');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $eleve)
    {
        $eleves = Eleve::find($eleve);
        $eleves->delete();

        // Redirection avec un message de succès
        return redirect()->route('eleves.index')->with('success', 'Eleve supprimé avec succès');
    }
}
