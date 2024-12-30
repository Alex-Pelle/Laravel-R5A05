<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEvaluationRequest;
use App\Http\Requests\UpdateEvaluationRequest;
use App\Models\Eleve;
use App\Models\Evaluation;
use App\Models\Modules;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Factory|Application
    {
        $eval = Evaluation::all();
        return view('evaluations.index', compact('eval'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->basicBehavior();
        $modules = Modules::all();

        return view('evaluations.create',compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEvaluationRequest $request)
    {
        $this->basicBehavior();
        // Validation automatique grâce à StoreModulesRequest
        $validatedData = $request->validated();

        // Création du module
        Evaluation::create([
            'titreEval' => $validatedData['titreEval'],
            'dateEval' => $validatedData['dateEval'],
            'coefEval' => $validatedData['coefEval'],
            'moduleEval' => $validatedData['moduleEval'],
        ]);

        // Redirection avec un message de succès
        return redirect()->route('evaluations.index')->with('success', 'Evaluation créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show( $evaluation)
    {
        $eval = Evaluation::find($evaluation);

        return view('evaluations.show', compact('eval'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($evaluation)
    {
        $this->basicBehavior();
        $modules = Modules::all();
        $eval= Evaluation::find($evaluation);

        return view('evaluations.edit', compact('eval','modules'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEvaluationRequest $request,  $evaluation)
    {
        $this->basicBehavior();
        $eval = Evaluation::find($evaluation);
        $validatedData = $request->validated();

        // Création du module
        $eval->update([
            'titreEval' => $validatedData['titreEval'],
            'dateEval' => $validatedData['dateEval'],
            'coefEval' => $validatedData['coefEval'],
            'moduleEval' => $validatedData['moduleEval'],
        ]);

        // Redirection avec un message de succès
        return redirect()->route('evaluations.index')->with('success', 'Evaluation modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $evaluation)
    {
        $this->basicBehavior();
        $eval = Evaluation::find($evaluation);
        $eval->delete();

        // Redirection avec un message de succès
        return redirect()->route('evaluations.index')->with('success', 'Evaluation supprimée avec succès');
    }
}
