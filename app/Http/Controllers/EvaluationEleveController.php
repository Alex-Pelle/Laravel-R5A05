<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEvaluationEleveRequest;
use App\Http\Requests\UpdateElevesEvaluationRequest;
use App\Models\Eleve;
use App\Models\Evaluation;
use App\Models\EvaluationEleve;
use Illuminate\Http\Request;

class EvaluationEleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($evaluation)
    {
        $this->basicBehavior();
        $evalEleve = EvaluationEleve::where('idEval', $evaluation)->get();
        return view('notes.index', compact('evalEleve', 'evaluation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($evaluation)
    {
        $this->basicBehavior();
        $elevesAvecNotes = EvaluationEleve::where('idEval', $evaluation)->pluck('idEleve');

        $eleves = Eleve::whereNotIn('id', $elevesAvecNotes)->get();
        return view('notes.create', compact('eleves','evaluation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEvaluationEleveRequest $request, $evaluation)
    {
        $this->basicBehavior();
        $validatedData = $request->validated();
        EvaluationEleve::create([
            'idEval' => $evaluation,
            'idEleve' => $validatedData['idEleve'],
            'note' => $validatedData['note'],
        ]);

        return redirect()->route('notes.index', ['evaluation' =>$evaluation])->with('success', 'Note ajoutée à l\'évaluation');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($evaluationEleve,$evaluation)
    {
        $this->basicBehavior();
        $evalEleve = EvaluationEleve::find($evaluationEleve);
        return view('notes.edit', compact('evalEleve','evaluation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateElevesEvaluationRequest $request, $evaluationEleve, $evaluation)
    {
        $this->basicBehavior();
        $eval = EvaluationEleve::find($evaluationEleve);

        if (!$eval) {
            return redirect()->route('notes.index', ['evaluation' => $evaluation])
                ->with('error', 'La note n\'a pas été trouvée.');
        }

        $validatedData = $request->validated();
        $eval->update([
            'note' => $validatedData['note'],
        ]);

        return redirect()->route('notes.index', ['evaluation' => $eval])
            ->with('success', 'Note modifiée avec succès');
    }

    public function show($evaluationEleve)
    {
        $this->basicBehavior();
        $evalEleve = EvaluationEleve::find($evaluationEleve);
        return redirect()->route('notes.index',["evaluation"=>$evalEleve->idEval]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($evaluation, $evaluationEleve)
    {
        $this->basicBehavior();
        $evaluationEleve = EvaluationEleve::find($evaluationEleve);

        // Vérifiez si la note existe
        if ($evaluationEleve) {
            $evaluationEleve->delete();

            // Redirigez explicitement vers notes.index en passant l'évaluation
            return redirect()->route('notes.index', ['evaluation' => $evaluation])
                ->with('success', 'La note a été supprimée avec succès.');
        }

        // Si la note n'existe pas, redirigez également vers notes.index avec un message d'erreur
        return redirect()->route('notes.index', ['evaluation' => $evaluation])
            ->with('error', 'La note n\'a pas été trouvée.');
    }


}
